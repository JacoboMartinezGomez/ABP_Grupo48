<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Parejasdisputanenfrentamiento Controller
 *
 * @property \App\Model\Table\ParejasdisputanenfrentamientoTable $Parejasdisputanenfrentamiento
 *
 * @method \App\Model\Entity\Parejasdisputanenfrentamiento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ParejasdisputanenfrentamientoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Enfrentamientos']
        ];
        $parejasdisputanenfrentamiento = $this->paginate($this->Parejasdisputanenfrentamiento);

        $this->set(compact('parejasdisputanenfrentamiento'));
    }

    /**
     * View method
     *
     * @param string|null $id Parejasdisputanenfrentamiento id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $parejasdisputanenfrentamiento = $this->Parejasdisputanenfrentamiento->get($id, [
            'contain' => ['Enfrentamientos']
        ]);

        $this->set('parejasdisputanenfrentamiento', $parejasdisputanenfrentamiento);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $parejasdisputanenfrentamiento = $this->Parejasdisputanenfrentamiento->newEntity();
        if ($this->request->is('post')) {
            $parejasdisputanenfrentamiento = $this->Parejasdisputanenfrentamiento->patchEntity($parejasdisputanenfrentamiento, $this->request->getData());
            if ($this->Parejasdisputanenfrentamiento->save($parejasdisputanenfrentamiento)) {
                $this->Flash->success(__('The parejasdisputanenfrentamiento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The parejasdisputanenfrentamiento could not be saved. Please, try again.'));
        }
        $enfrentamientos = $this->Parejasdisputanenfrentamiento->Enfrentamientos->find('list', ['limit' => 200]);
        $this->set(compact('parejasdisputanenfrentamiento', 'enfrentamientos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Parejasdisputanenfrentamiento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $parejasdisputanenfrentamiento = $this->Parejasdisputanenfrentamiento->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $parejasdisputanenfrentamiento = $this->Parejasdisputanenfrentamiento->patchEntity($parejasdisputanenfrentamiento, $this->request->getData());
            if ($this->Parejasdisputanenfrentamiento->save($parejasdisputanenfrentamiento)) {
                $this->Flash->success(__('The parejasdisputanenfrentamiento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The parejasdisputanenfrentamiento could not be saved. Please, try again.'));
        }
        $enfrentamientos = $this->Parejasdisputanenfrentamiento->Enfrentamientos->find('list', ['limit' => 200]);
        $this->set(compact('parejasdisputanenfrentamiento', 'enfrentamientos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Parejasdisputanenfrentamiento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $parejasdisputanenfrentamiento = $this->Parejasdisputanenfrentamiento->get($id);
        if ($this->Parejasdisputanenfrentamiento->delete($parejasdisputanenfrentamiento)) {
            $this->Flash->success(__('The parejasdisputanenfrentamiento has been deleted.'));
        } else {
            $this->Flash->error(__('The parejasdisputanenfrentamiento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
