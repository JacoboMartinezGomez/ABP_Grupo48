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
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $this->loadModel('Usuarios');

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

//                Crear una reserva
//                $clasesGrupale->fecha_reserva = ;
//                $clasesGrupale->pista_reserva = ;
//                $clasesGrupale->hora_reserva = ;

                if ($this->ClasesGrupales->save($clasesGrupale)) {
                    $this->Flash->success(__('The clases grupale has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The clases grupale could not be saved. Please, try again.'));
            }
        }


        $usuarios = $this->ClasesGrupales->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('clasesGrupale', 'usuarios'));
        $this->set('user', $this->Auth->user());
    }

    /**
     * Edit method
     *
     * @param string|null $id Clases Grupale id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clasesGrupale = $this->ClasesGrupales->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clasesGrupale = $this->ClasesGrupales->patchEntity($clasesGrupale, $this->request->getData());
            if ($this->ClasesGrupales->save($clasesGrupale)) {
                $this->Flash->success(__('The clases grupale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clases grupale could not be saved. Please, try again.'));
        }
        $usuarios = $this->ClasesGrupales->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('clasesGrupale', 'usuarios'));
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
