<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

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

        $query = $this->Partidos->find('all');

        $this->set('partidos', $this->paginate($query));
        $this->set('user', $this->Auth->user());
    }

    /**
     * View method
     *
     * @param string|null $id Partido id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if(!$this->isAuthorized($this->Auth->user())){
            //debug($this->Auth->user());
            die;
            $this->Flash->error(__('No tiene permisos. Contacte con un administrador.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->set('hora_inicio', $this->getHorasPista());
        $partido = $this->Partidos->newEntity();
        if ($this->request->is('post')) {
            $partido = $this->Partidos->patchEntity($partido, $this->request->getData());
            $fecha = $partido->fecha;

            $fechaLimite = Time::now()->modify('+7 days');

            if ($fecha <= $fechaLimite && $fecha >= Time::now()) {
                if ($this->Partidos->save($partido)) {
                    $this->Flash->success(__('El partido ha sido guardado.'));

                    return $this->redirect(['action' => 'index']);
                }else{
                    $this->Flash->error(__('El partido no se ha podido guardar. Por favor intentelo de nuevo.'));
                }
            }else{
                $this->Flash->error(__('La fecha es incorrecta.'));
            }

        }
        $usuarios = $this->Partidos->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('partido', 'usuarios'));
        $this->set('user', $this->Auth->user());
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
        $this->set('user', $this->Auth->user());

        return $this->redirect(['action' => 'index']);
    }

    public function inscribirse($id_partido){
        if (!$this->estaInscrito($id_partido)){
            $this->set('user', $this->Auth->user());
            $_SESSION['id_partido'] = $id_partido;
            return $this->redirect(['controller' => 'Pasarela','action' => 'partidoPromocionado']);
        }
        else{
            $this->Flash->error(__('No se ha podido inscribir en el partido. Usted ya esta inscrito.'));
        }

        return $this->redirect(['action' => 'index', $id_partido]);
    }

    public function desinscribirse($id_partido){
        if($this->estaInscrito($id_partido)){
            $partido = $this->Partidos->get($id_partido);
            if($partido->usuario_id == $this->Auth->user('dni')){
                $partido->usuario_id = null;
            }else if($partido->usuario_id2 == $this->Auth->user('dni')){
                $partido->usuario_id2 = null;
            }else if($partido->usuario_id3 == $this->Auth->user('dni')){
                $partido->usuario_id3 = null;
            }else if($partido->usuario_id4 == $this->Auth->user('dni')){
                $partido->usuario_id4 = null;
            }
            $this->Partidos->save($partido);

            $this->Flash->success(__('Se ha desinscrito en el partido correctamente.'));
            return $this->redirect(['action' => 'index', $id_partido]);

        }else{
            $this->Flash->success(__('No se ha podido desinscribir en el partido. Usted no esta inscrito.'));
            return $this->redirect(['action' => 'index', $id_partido]);
        }
    }

    public function estaInscrito($id_partido){
        $partido = $this->Partidos->get($id_partido);
        return ($partido->usuario_id == $this->Auth->user('dni')
                || $partido->usuario_id2 == $this->Auth->user('dni')
                || $partido->usuario_id3 == $this->Auth->user('dni')
                || $partido->usuario_id4 == $this->Auth->user('dni'));
        /*$query = $this->Partidos->find()
            ->where(['id_partido' => $id_partido,
                'OR' =>
                    ['usuario_id' => $this->Auth->user('dni')],
                ['usuario_id2' => $this->Auth->user('dni')],
                ['usuario_id3' => $this->Auth->user('dni')],
                ['usuario_id4' => $this->Auth->user('dni')]
            ]);

        return is_null($query);*/
    }


}
