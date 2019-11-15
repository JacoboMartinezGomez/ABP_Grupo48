<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Partidos Controller
 *
 * @property \App\Model\Table\PartidosTable $Partidos
 *
 * @method \App\Model\Entity\Partido[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PartidosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
//        $this->paginate = [
//            'contain' => ['Usuarios']
//        ];
//        $partidos = $this->paginate($this->Partidos);

        $query = $this->Partidos->find()
                                ->where(['OR' =>
                                    ['usuario_id' => $this->Auth->user('dni')],
                                    ['usuario_id2' => $this->Auth->user('dni')],
                                    ['usuario_id3' => $this->Auth->user('dni')],
                                    ['usuario_id4' => $this->Auth->user('dni')]
                                ]);

        $this->set('partidos', $query);
    }

    /**
     * View method
     *
     * @param string|null $id Partido id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $partido = $this->Partidos->get($id, [
            'contain' => ['Usuarios']
        ]);

        $this->set('partido', $partido);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $partido = $this->Partidos->newEntity();
        if ($this->request->is('post')) {
            $partido = $this->Partidos->patchEntity($partido, $this->request->getData());
            if ($this->Partidos->save($partido)) {
                $this->Flash->success(__('The partido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The partido could not be saved. Please, try again.'));
        }
        $usuarios = $this->Partidos->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('partido', 'usuarios'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Partido id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $partido = $this->Partidos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $partido = $this->Partidos->patchEntity($partido, $this->request->getData());
            if ($this->Partidos->save($partido)) {
                $this->Flash->success(__('The partido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The partido could not be saved. Please, try again.'));
        }
        $usuarios = $this->Partidos->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('partido', 'usuarios'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Partido id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $partido = $this->Partidos->get($id);
        if ($this->Partidos->delete($partido)) {
            $this->Flash->success(__('The partido has been deleted.'));
        } else {
            $this->Flash->error(__('The partido could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function inscribe($id_partido){
        $query = $this->Partidos->find()
            ->where(['id_partido' => $id_partido,
                'OR' =>
                ['usuario_id' => $this->Auth->user('dni')],
                ['usuario_id2' => $this->Auth->user('dni')],
                ['usuario_id3' => $this->Auth->user('dni')],
                ['usuario_id4' => $this->Auth->user('dni')]
            ]);
    }

    public function isAuthorized($user)
    {
        if (in_array($this->request->getParam('action'), ['add', 'edit', 'delete'])) {
            return false;
        }
    }
}
