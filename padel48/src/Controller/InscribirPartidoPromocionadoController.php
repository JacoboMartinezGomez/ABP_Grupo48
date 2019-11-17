<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InscribirPartidoPromocionado Controller
 *
 *
 * @method \App\Model\Entity\InscribirPartidoPromocionado[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InscribirPartidoPromocionadoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $inscribirPartidoPromocionado = $this->paginate($this->InscribirPartidoPromocionado);

        $this->set(compact('inscribirPartidoPromocionado'));
    }

    /**
     * View method
     *
     * @param string|null $id Inscribir Partido Promocionado id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inscribirPartidoPromocionado = $this->InscribirPartidoPromocionado->get($id, [
            'contain' => []
        ]);

        $this->set('inscribirPartidoPromocionado', $inscribirPartidoPromocionado);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inscribirPartidoPromocionado = $this->InscribirPartidoPromocionado->newEntity();
        if ($this->request->is('post')) {
            $inscribirPartidoPromocionado = $this->InscribirPartidoPromocionado->patchEntity($inscribirPartidoPromocionado, $this->request->getData());
            if ($this->InscribirPartidoPromocionado->save($inscribirPartidoPromocionado)) {
                $this->Flash->success(__('The inscribir partido promocionado has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inscribir partido promocionado could not be saved. Please, try again.'));
        }
        $this->set(compact('inscribirPartidoPromocionado'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Inscribir Partido Promocionado id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inscribirPartidoPromocionado = $this->InscribirPartidoPromocionado->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inscribirPartidoPromocionado = $this->InscribirPartidoPromocionado->patchEntity($inscribirPartidoPromocionado, $this->request->getData());
            if ($this->InscribirPartidoPromocionado->save($inscribirPartidoPromocionado)) {
                $this->Flash->success(__('The inscribir partido promocionado has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inscribir partido promocionado could not be saved. Please, try again.'));
        }
        $this->set(compact('inscribirPartidoPromocionado'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Inscribir Partido Promocionado id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inscribirPartidoPromocionado = $this->InscribirPartidoPromocionado->get($id);
        if ($this->InscribirPartidoPromocionado->delete($inscribirPartidoPromocionado)) {
            $this->Flash->success(__('The inscribir partido promocionado has been deleted.'));
        } else {
            $this->Flash->error(__('The inscribir partido promocionado could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
