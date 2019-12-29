<?php
namespace App\Controller;

use App\Controller\AppController;

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
        $clasesGrupales = $this->paginate($this->ClasesGrupales);

        $this->set(compact('clasesGrupales'));
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
        $clasesGrupale = $this->ClasesGrupales->newEntity();
        if ($this->request->is('post')) {
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
