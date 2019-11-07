<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ParejasDisputanEnfrentamiento Controller
 *
 * @property \App\Model\Table\ParejasDisputanEnfrentamientoTable $ParejasDisputanEnfrentamiento
 *
 * @method \App\Model\Entity\ParejasDisputanEnfrentamiento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ParejasDisputanEnfrentamientoController extends AppController
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
        $parejasDisputanEnfrentamiento = $this->paginate($this->ParejasDisputanEnfrentamiento);

        $this->set(compact('parejasDisputanEnfrentamiento'));
    }

    /**
     * View method
     *
     * @param string|null $id Parejas Disputan Enfrentamiento id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $parejasDisputanEnfrentamiento = $this->ParejasDisputanEnfrentamiento->get($id, [
            'contain' => ['Campeonatos']
        ]);

        $this->set('parejasDisputanEnfrentamiento', $parejasDisputanEnfrentamiento);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $parejasDisputanEnfrentamiento = $this->ParejasDisputanEnfrentamiento->newEntity();
        if ($this->request->is('post')) {
            $parejasDisputanEnfrentamiento = $this->ParejasDisputanEnfrentamiento->patchEntity($parejasDisputanEnfrentamiento, $this->request->getData());
            if ($this->ParejasDisputanEnfrentamiento->save($parejasDisputanEnfrentamiento)) {
                $this->Flash->success(__('The parejas disputan enfrentamiento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The parejas disputan enfrentamiento could not be saved. Please, try again.'));
        }
        $campeonatos = $this->ParejasDisputanEnfrentamiento->Campeonatos->find('list', ['limit' => 200]);
        $this->set(compact('parejasDisputanEnfrentamiento', 'campeonatos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Parejas Disputan Enfrentamiento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $parejasDisputanEnfrentamiento = $this->ParejasDisputanEnfrentamiento->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $parejasDisputanEnfrentamiento = $this->ParejasDisputanEnfrentamiento->patchEntity($parejasDisputanEnfrentamiento, $this->request->getData());
            if ($this->ParejasDisputanEnfrentamiento->save($parejasDisputanEnfrentamiento)) {
                $this->Flash->success(__('The parejas disputan enfrentamiento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The parejas disputan enfrentamiento could not be saved. Please, try again.'));
        }
        $campeonatos = $this->ParejasDisputanEnfrentamiento->Campeonatos->find('list', ['limit' => 200]);
        $this->set(compact('parejasDisputanEnfrentamiento', 'campeonatos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Parejas Disputan Enfrentamiento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $parejasDisputanEnfrentamiento = $this->ParejasDisputanEnfrentamiento->get($id);
        if ($this->ParejasDisputanEnfrentamiento->delete($parejasDisputanEnfrentamiento)) {
            $this->Flash->success(__('The parejas disputan enfrentamiento has been deleted.'));
        } else {
            $this->Flash->error(__('The parejas disputan enfrentamiento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
