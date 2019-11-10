<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * FechasPropuestas Controller
 *
 * @property \App\Model\Table\FechasPropuestasTable $FechasPropuestas
 *
 * @method \App\Model\Entity\FechasPropuesta[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FechasPropuestasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index($id)
    {
        /*$this->paginate = [
            'contain' => ['Enfrentamientos']
        ];
        $fechasPropuestas = $this->paginate($this->FechasPropuestas);

        $this->set(compact('fechasPropuestas'));*/

        $query = $this->FechasPropuestas->find('all')->where(['enfrentamiento_id' => $id]);
        $this->set('fechasPropuestas', $this->paginate($query));
        $this->set('enfrentamiento_id', $id);
    }

    /**
     * View method
     *
     * @param string|null $id Fechas Propuesta id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fechasPropuesta = $this->FechasPropuestas->get($id, [
            'contain' => ['Enfrentamientos']
        ]);

        $this->set('fechasPropuesta', $fechasPropuesta);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($enfrentamientoID)
    {
        //Enviar tambien el usuario en session para meterlo en un input hidden para la consulta en la BD
        $this->loadModel('Horarios');
        $this->set('hora_inicio', $this->Horarios->find('list', [ 'keyField' => function ($horarios) {
                                                                        return date('H:i:s' ,strtotime($horarios->get('hora_inicio')));
                                                                    },
                                                                'valueField' => function ($horarios) {
                                                                    return date('H:i' ,strtotime($horarios->get('hora_inicio')));
                                                                }
                                                                ]));

        $fechasPropuesta = $this->FechasPropuestas->newEntity();
        if ($this->request->is('post')) {
            $fechasPropuesta = $this->FechasPropuestas->patchEntity($fechasPropuesta, $this->request->getData());
            $fechasPropuesta->enfrentamiento_id = $enfrentamientoID;

            if ($this->FechasPropuestas->save($fechasPropuesta)) {
                $this->Flash->success(__('The fechas propuesta has been saved.'));

                return $this->redirect(['action' => 'index', $enfrentamientoID]);
            }
            $this->Flash->error(__('The fechas propuesta could not be saved. Please, try again.'));
        }
        $enfrentamientos = $this->FechasPropuestas->Enfrentamientos->find('list', ['limit' => 200]);
        $this->set(compact('fechasPropuesta', 'enfrentamientos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fechas Propuesta id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fechasPropuesta = $this->FechasPropuestas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fechasPropuesta = $this->FechasPropuestas->patchEntity($fechasPropuesta, $this->request->getData());
            if ($this->FechasPropuestas->save($fechasPropuesta)) {
                $this->Flash->success(__('The fechas propuesta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fechas propuesta could not be saved. Please, try again.'));
        }
        $enfrentamientos = $this->FechasPropuestas->Enfrentamientos->find('list', ['limit' => 200]);
        $this->set(compact('fechasPropuesta', 'enfrentamientos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fechas Propuesta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fechasPropuesta = $this->FechasPropuestas->get($id);
        if ($this->FechasPropuestas->delete($fechasPropuesta)) {
            $this->Flash->success(__('The fechas propuesta has been deleted.'));
        } else {
            $this->Flash->error(__('The fechas propuesta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function aceptar($id){
        $fechaPropuesta = $this->FechasPropuestas->get($id);
        $enfrentamiento_id = $fechaPropuesta->enfrentamiento_id;

        $hora = date('H:i:s',strtotime($fechaPropuesta->hora));
        $fecha = $fechaPropuesta->fecha;

        $time = new Time($fecha.' '.$hora);
        $now = Time::now();

        //Comprobamos que la fecha y hora son futuras
        if($time <= $now){
            $this->FechasPropuestas->delete($fechaPropuesta);
            $this->Flash->error('Fecha pasada. Seleccione otra.');

            return $this->redirect(['action' => 'index', $enfrentamiento_id]);
        };


        // FALTA AQUI COMPROBAR QUE HAY PISTA DISPONIBLE EN ESA FECHA Y HORA
        if(true){
            $this->loadModel('Enfrentamientos');
            $enfrentamiento = $this->Enfrentamientos->get($enfrentamiento_id);

            //Actualizamos el enfrentamiento con la hora y fecha propuesta
            $enfrentamiento->hora = $hora;
            $enfrentamiento->fecha = $fecha;
            $this->Enfrentamientos->save($enfrentamiento);

            //Eliminamos todas las fechas propuestas
            $this->FechasPropuestas->deleteAll(['enfrentamiento_id =' => $enfrentamiento_id]);

            $this->Flash->success('Fecha aceptada. Se ha reservado una pista correctamente . Todas la fechas propuestas han sido borradas');

            return $this->redirect(['controller' => 'Entrentamientos','action' => 'index', $enfrentamiento_id]);
        }else{
            $this->FechasPropuestas->delete($fechaPropuesta);
            $this->Flash->error('No hay pista disponible para esa hora y dia. Por favor, seleccione otra fecha u hora.');

            return $this->redirect(['action' => 'index']);
        }

    }
}
