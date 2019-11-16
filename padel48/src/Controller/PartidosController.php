<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Partidos Controller
 *
 * @property \App\Model\Table\PartidosTable $Partidos
 *
 * @method \App\Model\Entity\Partido[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PartidosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {

        $query = $this->Partidos->find()
                                ->where(['OR' =>
                                    ['usuario_id' => $this->Auth->user('dni')],
                                    ['usuario_id2' => $this->Auth->user('dni')],
                                    ['usuario_id3' => $this->Auth->user('dni')],
                                    ['usuario_id4' => $this->Auth->user('dni')]
                                ]);

        $this->set('partidos', $this->paginate($query));
    }

    /**
     * View method
     *
     * @param string|null $id Partido id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $partido = $this->Partidos->get($id, [
            'contain' => ['Usuarios']
        ]);

        $this->set('partido', $partido);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $partido = $this->Partidos->newEntity();
        if ($this->request->is('post')) {
            $partido = $this->Partidos->patchEntity($partido, $this->request->getData());
            if ($this->Partidos->save($partido)) {
                $this->Flash->success(__('El partido ha sido guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El partido no se ha podido guardar. Por favor intentelo de nuevo.'));

        }
        $usuarios = $this->Partidos->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('partido', 'usuarios'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Partido id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
//    public function edit($id = null)
//    {
//        $partido = $this->Partidos->get($id, [
//            'contain' => []
//        ]);
//        if ($this->request->is(['patch', 'post', 'put'])) {
//            $partido = $this->Partidos->patchEntity($partido, $this->request->getData());
//            if ($this->Partidos->save($partido)) {
//                $this->Flash->success(__('El partido ha sido guardado.'));
//
//                return $this->redirect(['action' => 'index']);
//            }
//            $this->Flash->error(__('El partido no se ha podido guardar. Por favor intentelo de nuevo.'));
//        }
//        $usuarios = $this->Partidos->Usuarios->find('list', ['limit' => 200]);
//        $this->set(compact('partido', 'usuarios'));
//    }

    /**
     * Delete method
     *
     * @param string|null $id Partido id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $partido = $this->Partidos->get($id);
        if ($this->Partidos->delete($partido)) {
            $this->Flash->success(__('El partido ha sido borrado'));
        } else {
            $this->Flash->error(__('El partido no se ha podido borrar. Intentelo de nuevo'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function inscribirse($id_partido){
        if (!$this->estaInscrito($id_partido)){

            if($this->Partidos->addDeportista($id_partido, $this->Auth->user('dni'))){

                $this->Flash->success(__('Se ha inscrito en el partido correctamente.'));
                return $this->redirect(['action' => 'view', $id_partido]);
            }else{
                $this->Flash->error(__('No se ha podido inscribir en el partido. El partido esta completo.'));
            }
        }else{
            $this->Flash->error(__('No se ha podido inscribir en el partido. Usted ya esta inscrito.'));
        }

        return $this->redirect(['action' => 'index', $id_partido]);
    }

    public function desinscribirse($id_partido){
        if($this->estaInscrito($id_partido)){
            $partido = $this->Partidos->get($id_partido);
            if($partido->usuario_id != null){
                $partido->usuario_id = null;
                $this->save($partido);
            }else if($partido->usuario_id2 != null){
                $partido->usuario_id2 = null;
                $this->save($partido);
            }else if($partido->usuario_id3 != null){
                $partido->usuario_id3 = null;
                $this->save($partido);
            }else if($partido->usuario_id4 != null){
                $partido->usuario_id4 = null;
                $this->save($partido);
            }

            $this->Flash->success(__('Se ha desinscrito en el partido correctamente.'));
            return $this->redirect(['action' => 'view', $id_partido]);

        }else{
            $this->Flash->success(__('No se ha podido desinscribir en el partido. Usted no esta inscrito.'));
            return $this->redirect(['action' => 'view', $id_partido]);
        }
    }

    public function estaInscrito($id_partido){
        $query = $this->Partidos->find()
            ->where(['id_partido' => $id_partido,
                'OR' =>
                    ['usuario_id' => $this->Auth->user('dni')],
                ['usuario_id2' => $this->Auth->user('dni')],
                ['usuario_id3' => $this->Auth->user('dni')],
                ['usuario_id4' => $this->Auth->user('dni')]
            ]);

        return is_null($query);
    }

    public function isAuthorized($user)
    {
        if (in_array($this->request->getParam('action'), ['add', 'edit', 'delete'])) {
            return false;
        }

        return parent::isAuthorized($user);
    }
}
