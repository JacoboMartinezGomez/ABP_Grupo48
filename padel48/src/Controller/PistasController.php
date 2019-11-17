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
        if(!$this->isAuthorized($this->Auth->user())){
            $this->Flash->error(__('No tiene permisos. Contacte con un administrador.'));
            return $this->redirect(['action' => 'index']);
        }
        $pista = $this->Pistas->newEntity();
        if ($this->request->is('post')) {
            $pista = $this->Pistas->patchEntity($pista, $this->request->getData());

            if($pista->tipo == 'PIEDRA' | $pista->tipo == 'MOQUETA'){
                if($pista->lugar == 'EXTERIOR' | $pista->lugar == 'INTERIOR') {
                    if ($this->Pistas->save($pista)) {
                        $this->loadModel('Horarios');

                        $horarios = $this->Horarios->find('all')->select(['hora_inicio'])->distinct()->toArray();

                        foreach ($horarios as $hora){
                            $horario = $this->Horarios->newEntity();
                            $horario->pista_id = $pista->num_pista;
                            $horario->hora_inicio = date($hora['hora_inicio']->format('H:i:s'));
                            $this->Horarios->save($horario);
                        }
                        $this->Flash->success(__('La pista ha sido guardada.'));

                        return $this->redirect(['action' => 'index']);
                    }
                }
            }


            $this->Flash->error(__('No se ha podido guardar la pista. Intentelo de nuevo'));
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
        if(!$this->isAuthorized($this->Auth->user())){
            $this->Flash->error(__('No tiene permisos. Contacte con un administrador.'));
            return $this->redirect(['action' => 'index']);
        }

        $pista = $this->Pistas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pista = $this->Pistas->patchEntity($pista, $this->request->getData());
            if ($pista->tipo == 'PIEDRA' | $pista->tipo == 'MOQUETA') {
                if ($pista->lugar == 'EXTERIOR' | $pista->lugar == 'INTERIOR') {
                    if ($this->Pistas->save($pista)) {
                        $this->Flash->success(__('La pista ha sido guardada.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('No se ha podido guardar la pista. Intentelo de nuevo.'));
                }
            }
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
        if(!$this->isAuthorized($this->Auth->user())){
            $this->Flash->error(__('No tiene permisos. Contacte con un administrador.'));
            return $this->redirect(['action' => 'index']);
        }

        $this->request->allowMethod(['post', 'delete']);
        $pista = $this->Pistas->get($id);
        if ($this->Pistas->delete($pista)) {
            $this->Flash->success(__('La pista ha sido borrada.'));
        } else {
            $this->Flash->error(__('No se ha podido borrar la pista. Intentelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
