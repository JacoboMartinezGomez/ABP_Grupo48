<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Parejas Controller
 *
 * @property \App\Model\Table\ParejasTable $Parejas
 *
 * @method \App\Model\Entity\Pareja[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ParejasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Campeonatos']
        ];
        $parejas = $this->paginate($this->Parejas);

        $this->set(compact('parejas'));
    }

    /**
     * View method
     *
     * @param string|null $id Pareja id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pareja = $this->Parejas->get($id, [
            'contain' => ['Campeonatos']
        ]);

        $this->set('pareja', $pareja);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pareja = $this->Parejas->newEntity();
        if ($this->request->is('post')) {
            $pareja = $this->Parejas->patchEntity($pareja, $this->request->getData());
            if ($this->Parejas->save($pareja)) {
                $this->Flash->success(__('The pareja has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pareja could not be saved. Please, try again.'));
        }
        $campeonatos = $this->Parejas->Campeonatos->find('list', ['limit' => 200]);
        $this->set(compact('pareja', 'campeonatos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pareja id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pareja = $this->Parejas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pareja = $this->Parejas->patchEntity($pareja, $this->request->getData());
            if ($this->Parejas->save($pareja)) {
                $this->Flash->success(__('The pareja has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pareja could not be saved. Please, try again.'));
        }
        $campeonatos = $this->Parejas->Campeonatos->find('list', ['limit' => 200]);
        $this->set(compact('pareja', 'campeonatos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pareja id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pareja = $this->Parejas->get($id);
        if ($this->Parejas->delete($pareja)) {
            $this->Flash->success(__('The pareja has been deleted.'));
        } else {
            $this->Flash->error(__('The pareja could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
