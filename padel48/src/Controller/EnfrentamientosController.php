<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Enfrentamientos Controller
 *
 * @property \App\Model\Table\EnfrentamientosTable $Enfrentamientos
 *
 * @method \App\Model\Entity\Enfrentamiento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EnfrentamientosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
//        $enfrentamientos = $this->paginate($this->Enfrentamientos);
//
//        $this->set(compact('enfrentamientos'));

        $query = $this->Enfrentamientos->find()
                                            ->join([
                                                'd' =>[
                                                    'table' => 'parejas_disputan_enfrentamiento',
                                                    'type' => 'LEFT',
                                                    'conditions' => 'enfrentamientos.id_enfrentamiento = d.enfrentamiento_id'
                                                    ],
                                                'p' =>[
                                                    'table' => 'parejas',
                                                    'type' => 'INNER',
                                                    'conditions' => [
                                                        ['OR' => [['d.id_pareja1 = p.id'], ['d.id_pareja2 = p.id']]],
                                                        ['OR' => [['p.id_capitan' => $this->Auth->user('dni')],
                                                            ['p.id_pareja' => $this->Auth->user('dni')]] ]
                                                        ]
                                                ]]);

//        ['OR' => [['p.id_capitan1' => $this->Auth->user('dni')],
//            ['p.id_capitan2' => $this->Auth->user('dni')]] ]

        $this->set('enfrentamientos', $this->paginate($query));
    }

    /**
     * View method
     *
     * @param string|null $id Enfrentamiento id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $enfrentamiento = $this->Enfrentamientos->get($id, [
            'contain' => []
        ]);

        $this->set('enfrentamiento', $enfrentamiento);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $enfrentamiento = $this->Enfrentamientos->newEntity();
        if ($this->request->is('post')) {
            $enfrentamiento = $this->Enfrentamientos->patchEntity($enfrentamiento, $this->request->getData());
            if ($this->Enfrentamientos->save($enfrentamiento)) {
                $this->Flash->success(__('The enfrentamiento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enfrentamiento could not be saved. Please, try again.'));
        }
        $this->set(compact('enfrentamiento'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Enfrentamiento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $enfrentamiento = $this->Enfrentamientos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $enfrentamiento = $this->Enfrentamientos->patchEntity($enfrentamiento, $this->request->getData());
            if ($this->Enfrentamientos->save($enfrentamiento)) {
                $this->Flash->success(__('The enfrentamiento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enfrentamiento could not be saved. Please, try again.'));
        }
        $this->set(compact('enfrentamiento'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Enfrentamiento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $enfrentamiento = $this->Enfrentamientos->get($id);
        if ($this->Enfrentamientos->delete($enfrentamiento)) {
            $this->Flash->success(__('The enfrentamiento has been deleted.'));
        } else {
            $this->Flash->error(__('The enfrentamiento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
