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
        $enfrentamientos = $this->paginate($this->Enfrentamientos);
//
        $this->set(compact('enfrentamientos'));

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

    public function introducirResultado($id = null){
        $this->loadModel('ParejasDisputanEnfrentamiento');
        $this->loadModel('Parejas');
        $enfrentamiento = $this->ParejasDisputanEnfrentamiento->newEntity();
        if ($this->request->is('post')) {

            $enfrentamiento = $this->ParejasDisputanEnfrentamiento->patchEntity($enfrentamiento, $this->ParejasDisputanEnfrentamiento->find('all')->where(['enfrentamiento_id =' => $id])->first()->toArray());
            $enfrentamiento->resultado = $this->request->getData()['resultado'];

            debug($enfrentamiento);
            //debug($this->Parejas->find('all')->where(['id =' => $enfrentamiento['id_pareja1']])->all()->toArray());

            //$this->ParejasDisputanEnfrentamiento->save($enfrentamiento);

            $pareja1 = $this->Parejas->newEntity();
            $pareja1 = $this->Parejas->patchEntity($pareja1, $this->Parejas->find('all')->where(['id =' => $enfrentamiento['id_pareja1']])->first()->toArray());
            //debug($pareja1);
            $pareja2 = $this->Parejas->newEntity();
            $pareja2 = $this->Parejas->patchEntity($pareja2, $this->Parejas->find('all')->where(['id =' => $enfrentamiento['id_pareja2']])->first()->toArray());

            if ($enfrentamiento['resultado'] == $enfrentamiento['id_pareja1']) {
                $pareja1->puntuacion += 3;
                $pareja2->puntuacion += 1;
            } else {
                $pareja1->puntuacion += 1;
                $pareja2->puntuacion += 3;
            }
            //debug($pareja1);
            //debug($pareja2);
            $this->ParejasDisputanEnfrentamiento->save($enfrentamiento);
            $this->Parejas->save($pareja1);
            $this->Parejas->save($pareja2);

            return $this->redirect(['controller' => 'enfrentamientos', 'action' => 'index']);
        }
    }
}
