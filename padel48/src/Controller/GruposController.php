<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Grupos Controller
 *
 * @property \App\Model\Table\GruposTable $Grupos
 *
 * @method \App\Model\Entity\Grupo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GruposController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index($campeonato_id)
    {
        $query = $this->Grupos->find()
                        ->join(['table' => 'parejas',
                                'type' => 'INNER',
                                'alias' => 'p',
                                'conditions' => [
                                                'Grupos.campeonato_id' => $campeonato_id,
                                                'id_grupo = p.grupo_id',
                                                'OR' => [
                                                    ['p.id_capitan' => $this->Auth->user('dni')],
                                                    ['p.id_pareja' =>$this->Auth->user('dni')]
                                                ]]
                            ]);

        $this->set('grupos', $this->paginate($query));
    }

    /**
     * View method
     *
     * @param string|null $id Grupo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
//        $grupo = $this->Grupos->get($id, [
//            'contain' => ['Campeonatos']
//        ]);

        $this->loadModel('Parejas');
        $parejas = $this->Parejas->find('all')
                                ->where(['grupo_id' => $id])
                                ->order(['puntuacion' => 'ASC']);

        $this->set('parejas', $parejas);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id_grupo, $campeonato_id, $tipo, $nivel)
    {
        $grupo = $this->Grupos->newEntity();
        $grupo->id_grupo = $id_grupo;
        $grupo->campeonato_id = $campeonato_id;
        $grupo->tipo = $tipo;
        $grupo->nivel = $nivel;

        if ($this->Grupos->save($grupo)) {
            $this->Flash->success(__('The grupo has been saved.'));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The grupo could not be saved. Please, try again.'));

        //$campeonatos = $this->Grupos->Campeonatos->find('list', ['limit' => 200]);
        //$this->set(compact('grupo', 'campeonatos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Grupo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $grupo = $this->Grupos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $grupo = $this->Grupos->patchEntity($grupo, $this->request->getData());
            if ($this->Grupos->save($grupo)) {
                $this->Flash->success(__('The grupo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The grupo could not be saved. Please, try again.'));
        }
        $campeonatos = $this->Grupos->Campeonatos->find('list', ['limit' => 200]);
        $this->set(compact('grupo', 'campeonatos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Grupo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $grupo = $this->Grupos->get($id);
        if ($this->Grupos->delete($grupo)) {
            $this->Flash->success(__('The grupo has been deleted.'));
        } else {
            $this->Flash->error(__('The grupo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
