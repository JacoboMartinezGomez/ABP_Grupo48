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

        if($this->Auth->user('rol') == 'ADMIN'){
            $query = $this->Enfrentamientos->find('all')
                ->join([
                    'd' =>[
                        'table' => 'parejas_disputan_enfrentamiento',
                        'type' => 'INNER',
                        'conditions' => 'enfrentamientos.id_enfrentamiento = d.enfrentamiento_id'
                    ],
                    'p' =>[
                        'table' => 'parejas',
                        'type' => 'INNER',
                        'conditions' => [
                            ['OR' => [['d.id_pareja1 = p.id'], ['d.id_pareja2 = p.id']]]
                        ]
                    ]])
                ->select(['enfrentamientos.id_enfrentamiento',
                    'enfrentamientos.grupo_id',
                    'enfrentamientos.hora',
                    'enfrentamientos.fecha',
                    'enfrentamientos.fase',
                    'd.resultado',
                    'd.id_pareja1',
                    'd.id_pareja2'])
                ->distinct();

            $query = $this->getGanador($query->toArray());
        }else{
            $query = $this->Enfrentamientos->find('all')
                ->join([
                    'd' =>[
                        'table' => 'parejas_disputan_enfrentamiento',
                        'type' => 'INNER',
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
                    ]])
                ->select(['enfrentamientos.id_enfrentamiento',
                    'enfrentamientos.grupo_id',
                    'enfrentamientos.hora',
                    'enfrentamientos.fecha',
                    'enfrentamientos.fase',
                    'd.resultado',
                    'd.id_pareja1',
                    'd.id_pareja2']);

            $query = $this->getRival($query->toArray());

        }

//        ['OR' => [['p.id_capitan1' => $this->Auth->user('dni')],
//            ['p.id_capitan2' => $this->Auth->user('dni')]] ]


        $this->set('enfrentamientos', $query);
        $this->set('user', $this->Auth->user());
    }

    private function getRival($enfrentamientos){
        $this->loadModel('Parejas');

        foreach($enfrentamientos as $enfrentamiento){
            $pareja1 = $this->Parejas->get($enfrentamiento->d['id_pareja1']);
            //La pareja 1 no es la pareja del usuario logueado
            if($pareja1->id_capitan != $this->Auth->user('dni') && $pareja1->id_pareja != $this->Auth->user('dni')){
                $enfrentamiento['rival'] = $pareja1->id_capitan;
            }else{
                $pareja2 = $this->Parejas->get($enfrentamiento->d['id_pareja2']);
                $enfrentamiento['rival'] = $pareja2->id_capitan;
            }
        }

        return $enfrentamientos;
    }

    private function getGanador($enfrentamientos){
        $this->loadModel('Parejas');

        foreach($enfrentamientos as $enfrentamiento){
            if($enfrentamiento->d['resultado']){
                $ganador = $this->Parejas->get($enfrentamiento->d['resultado']);
                $enfrentamiento->d['resultado'] = $ganador->id_capitan;
            }
        }

        return $enfrentamientos;
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
        $this->set('user', $this->Auth->user());
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
        $this->set('user', $this->Auth->user());
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
        $this->set('user', $this->Auth->user());
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
        $this->set('user', $this->Auth->user());

        return $this->redirect(['action' => 'index']);
    }

    public function introducirResultado($id = null){
        $this->set('user', $this->Auth->user());
        $this->loadModel('ParejasDisputanEnfrentamiento');
        $this->loadModel('Parejas');

        /*$niveles = $this->ParejasDisputanEnfrentamiento->find('list', [ 'keyField' => ,
                                                        'valueField' => function ($categorias) {
                                                            return $categorias->get('nivel');
                                                        }
                                                    ]);*/

        $pareja = $this->ParejasDisputanEnfrentamiento->find('all')->where(['enfrentamiento_id' => $id])->first()->toArray();
        $participantes1Query = $this->Parejas->find('all')->select(['id_capitan','id_pareja'])->where(['id =' => $pareja['id_pareja1']])->toArray();
        $participantes1 = $participantes1Query[0]['id_capitan'] . ', ' . $participantes1Query[0]['id_pareja'];
        $participantes2Query = $this->Parejas->find('all')->select(['id_capitan','id_pareja'])->where(['id =' => $pareja['id_pareja2']])->toArray();
        $participantes2 = $participantes2Query[0]['id_capitan'] . ', ' . $participantes2Query[0]['id_pareja'];

        $parejas = [$pareja['id_pareja1'] => $participantes1, $pareja['id_pareja2'] => $participantes2];
        $this->set('parejas',$parejas);

        $enfrentamiento = $this->ParejasDisputanEnfrentamiento->newEntity();
        if ($this->request->is('post')) {

            $enfrentamiento = $this->ParejasDisputanEnfrentamiento->patchEntity($enfrentamiento, $this->ParejasDisputanEnfrentamiento->find('all')->where(['enfrentamiento_id =' => $id])->first()->toArray());
            $enfrentamiento->resultado = $this->request->getData()['ganador'];

            //debug($enfrentamiento);
            //debug($this->Parejas->find('all')->where(['id =' => $enfrentamiento['id_pareja1']])->all()->toArray());

            //$this->ParejasDisputanEnfrentamiento->save($enfrentamiento);

            $pareja1 = $this->Parejas->newEntity();
            $pareja1 = $this->Parejas->patchEntity($pareja1, $this->Parejas->find('all')->where(['id =' => $enfrentamiento['id_pareja1']])->first()->toArray());
            //debug($pareja1);
            $pareja2 = $this->Parejas->newEntity();
            $pareja2 = $this->Parejas->patchEntity($pareja2, $this->Parejas->find('all')->where(['id =' => $enfrentamiento['id_pareja2']])->first()->toArray());

            if ($enfrentamiento['ganador'] == $enfrentamiento['id_pareja1']) {
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
