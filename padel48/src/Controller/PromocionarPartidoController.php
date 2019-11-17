<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PromocionarPartido Controller
 *
 *
 * @method \App\Model\Entity\PromocionarPartido[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PromocionarPartidoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $promocionarPartido = $this->paginate($this->PromocionarPartido);

        $this->set(compact('promocionarPartido'));
        $this->set('user', $this->Auth->user());
    }

    /**
     * View method
     *
     * @param string|null $id Promocionar Partido id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $promocionarPartido = $this->PromocionarPartido->get($id, [
            'contain' => ['Usuarios']
        ]);

        $this->set('promocionarPartido', $promocionarPartido);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $promocionarPartido = $this->PromocionarPartido->newEntity();
        if ($this->request->is('post')) {
            $promocionarPartido = $this->PromocionarPartido->patchEntity($promocionarPartido, $this->request->getData());
            if ($this->PromocionarPartido->save($promocionarPartido)) {
                $this->Flash->success(__('The promocionar partido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promocionar partido could not be saved. Please, try again.'));
        }
        $this->set(compact('promocionarPartido'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Promocionar Partido id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $promocionarPartido = $this->PromocionarPartido->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $promocionarPartido = $this->PromocionarPartido->patchEntity($promocionarPartido, $this->request->getData());
            if ($this->PromocionarPartido->save($promocionarPartido)) {
                $this->Flash->success(__('The promocionar partido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promocionar partido could not be saved. Please, try again.'));
        }
        $this->set(compact('promocionarPartido'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Promocionar Partido id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $promocionarPartido = $this->PromocionarPartido->get($id);
        if ($this->PromocionarPartido->delete($promocionarPartido)) {
            $this->Flash->success(__('The promocionar partido has been deleted.'));
        } else {
            $this->Flash->error(__('The promocionar partido could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
