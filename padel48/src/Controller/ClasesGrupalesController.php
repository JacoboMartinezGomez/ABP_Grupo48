<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * ClasesGrupales Controller
 *
 * @property \App\Model\Table\ClasesGrupalesTable $ClasesGrupales
 *
 * @method \App\Model\Entity\ClasesGrupale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClasesGrupalesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Usuarios']
        ];

        //Filtra las clases, mostrando solo en las que el usuario esta inscrito o imparte
//        $query = $this->ClasesGrupales->find('all')
//                                        ->join([
//                                            'u' => [
//                                                'table' => 'usuarios_inscritos_clase',
//                                                'type' => 'INNER',
//                                                'conditions' =>[
//                                                    ['id_claseGrupal = u.claseGrupal_id'],
//                                                    ['OR' =>
//                                                        ['ClasesGrupales.usuario_id' => $this->Auth->user('dni')],
//                                                        ['u.usuario_id' => $this->Auth->user('dni')]
//                                                    ]
//                                            ]]
//                                        ]);

        $query = $this->ClasesGrupales->find('all');

        $this->set('horas', $this->getHorasPistaEntero());
        $this->set('clasesGrupales',$this->paginate($query));
        $this->set('user', $this->Auth->user());
    }

    /**
     * View method
     *
     * @param string|null $id Clases Grupale id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clasesGrupale = $this->ClasesGrupales->get($id, [
            'contain' => ['Usuarios']
        ]);

        $this->set('clasesGrupale', $clasesGrupale);
        $this->set('user', $this->Auth->user());
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Usuarios');
        $this->loadModel('Reservas');

        $this->set('hora', $this->getHorasPista());

        $query = $this->Usuarios->find('list',
                                            ['keyField' => 'dni',
                                            'valueField' => function($row){
                                                return $row['apellido'].', '.$row['nombre'].' ('.$row['dni'].')';
                                            }]
                                        )
                                ->where(['rol LIKE' => 'PROFESOR'])
                                ->order(['apellido']);

        $profesores = $query;

        $this->set( 'profesores', $profesores);

        $clasesGrupale = $this->ClasesGrupales->newEntity();
        if ($this->request->is('post')) {
            $clasesGrupale = $this->ClasesGrupales->patchEntity($clasesGrupale, $this->request->getData());

            if($clasesGrupale->fecha_inicio >= Time::now()){
                if($clasesGrupale->num_max_apuntados > 1){
                    if($clasesGrupale->precio >= 0){

                        $idsHoras = $this->getHorasPistaEntero();
                        for($i = 1; $i <= sizeof($idsHoras); $i++){
                            if(date('H:i', strtotime($idsHoras[$i])) == $clasesGrupale->hora){
                                $idHora = $i;
                                break;
                            }
                        }

                        //Se crea una reserva
                        $reservasContr = new ReservasController();
                        $reserva = $reservasContr->reservarPista($clasesGrupale->usuario_id,
                                                                $idHora,
                                                                $clasesGrupale->fecha_inicio);

                        if($reserva != null){
                            $clasesGrupale->fecha_reserva = $reserva->fecha;
                            $clasesGrupale->pista_reserva = $reserva->pista_id;
                            $clasesGrupale->hora_reserva = $reserva->hora;
                            $clasesGrupale->num_actual_apuntados = 0;

                            if ($this->ClasesGrupales->save($clasesGrupale)) {
                                $this->Flash->success(__('The clases grupale has been saved.'));

                                return $this->redirect(['action' => 'index']);
                            }
                            $this->Flash->error(__('The clases grupale could not be saved. Please, try again.'));
                        }
                    }else{
                        $this->Flash->error(__('El precio no puede ser negativo'));
                    }
                }else{
                    $this->Flash->error(__('El numero maximo de apuntados es erroneo'));
                }
            }else{
                $this->Flash->error(__('La fecha es erronea'));
            }
        }

        $usuarios = $this->ClasesGrupales->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('clasesGrupale', 'usuarios'));
        $this->set('user', $this->Auth->user());
    }


    /**
     * @param integer|null $id
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     * */
    public function aplazar($id = null){
        $this->loadModel('Reservas');

        $this->set('hora_reserva', $this->getHorasPistaEntero());
        $this->set('hora_elegida', $this->ClasesGrupales->get($id)->hora_reserva);

        $clasesGrupale = $this->ClasesGrupales->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $clasesGrupale = $this->ClasesGrupales->patchEntity($clasesGrupale, $this->request->getData());

            $reservasContr = new ReservasController();
            $reserva = $reservasContr->reservarPista($clasesGrupale->usuario_id,
                                                    $clasesGrupale->hora_reserva,
                                                    $clasesGrupale->fecha_reserva);

            if ($reserva != null) {
                $clasesGrupale->fecha_reserva = $reserva->fecha;
                $clasesGrupale->hora_reserva = $reserva->hora;
                $clasesGrupale->pista_reserva = $reserva->pista_id;

                if ($this->ClasesGrupales->save($clasesGrupale)) {
                    $this->Flash->success(__('La clase grupal ha sido aplazada con exito.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Ha ocurrido un error al intentar aplazar la clase'));
            }
            $this->Flash->error(__('No se ha podido reservar pista para esa fecha y hora'));
        }

        $this->set(compact('clasesGrupale'));
        $this->set('user', $this->Auth->user());
    }

    /**
     * Delete method
     *
     * @param string|null $id Clases Grupale id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clasesGrupale = $this->ClasesGrupales->get($id);
        if ($this->ClasesGrupales->delete($clasesGrupale)) {
            $this->Flash->success(__('The clases grupale has been deleted.'));
        } else {
            $this->Flash->error(__('The clases grupale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
