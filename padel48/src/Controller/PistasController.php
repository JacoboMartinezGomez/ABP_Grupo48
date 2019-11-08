<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pistas Controller
 *
 * @property \App\Model\Table\PistasTable $Pistas
 *
 * @method \App\Model\Entity\Pista[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PistasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $pistas = $this->paginate($this->Pistas);

        $this->set(compact('pistas'));
    }

    /**
     * View method
     *
     * @param string|null $id Pista id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pista = $this->Pistas->get($id, [
            'contain' => ['Horarios']
        ]);

        $this->set('pista', $pista);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pista = $this->Pistas->newEntity();
        if ($this->request->is('post')) {
            $pista = $this->Pistas->patchEntity($pista, $this->request->getData());

            if($pista->tipo == 'PIEDRA' | $pista->tipo == 'MOQUETA'){
                if($pista->lugar == 'EXTERIOR' | $pista->tipo == 'INTERIOR') {
                    if ($this->Pistas->save($pista)) {
                        $this->Flash->success(__('The pista has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                }
            }


            $this->Flash->error(__('The pista could not be saved. Please, try again.'));
        }
        $this->set(compact('pista'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pista id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pista = $this->Pistas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pista = $this->Pistas->patchEntity($pista, $this->request->getData());
            if ($this->Pistas->save($pista)) {
                $this->Flash->success(__('The pista has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pista could not be saved. Please, try again.'));
        }
        $this->set(compact('pista'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pista id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pista = $this->Pistas->get($id);
        if ($this->Pistas->delete($pista)) {
            $this->Flash->success(__('The pista has been deleted.'));
        } else {
            $this->Flash->error(__('The pista could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
