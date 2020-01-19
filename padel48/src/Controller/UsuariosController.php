<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 *
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsuariosController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->setConfig('authenticate', [
            'Basic' => ['userModel' => 'Usuarios'],
            'Form' => ['userModel' => 'Usuarios']
        ]);
        $this->Auth->allow(['logout', 'add']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $usuario = $this->Auth->identify();
            if ($usuario) {
                $this->Auth->setUser($usuario);
                //return $this->redirect($this->Auth->redirectUrl());
                return $this->redirect(array("controller" => "Reservas",
                      "action" => "index",));
            }
            $this->Flash->error('El dni o la contraseña son incorrectos');
        }
    }

    public function logout()
    {
        $this->Flash->success('Has cerrado sesión.');
        //return $this->redirect($this->Auth->logout());
        return $this->redirect(array("controller" => "Pages",
        "action" => "display",));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        if(!$this->isAuthorized($this->Auth->user())){
            $this->Flash->error(__('No tiene permisos. Contacte con un administrador.'));
            return $this->redirect(['action' => 'index']);
        }

        $usuarios = $this->paginate($this->Usuarios);

        $this->set(compact('usuarios'));
        $this->set('user', $this->Auth->user());
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => ['Noticias', 'Partidos']
        ]);

        $this->set('usuario', $usuario);
        $this->set('user', $this->Auth->user());
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuario = $this->Usuarios->newEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            $usuario->rol = 'DEPORTISTA';
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('El usuario ha sido añadido correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se ha podido añadir el usuario. Pruebe más adelante.'));
        }
        $this->set(compact('usuario'));
        $this->set('user', $this->Auth->user());
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if(!$this->isAuthorized($this->Auth->user())){
            $this->Flash->error(__('No tiene permisos. Contacte con un administrador.'));
            return $this->redirect(['action' => 'index']);
        }
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData());
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('Se ha modificado el usuario.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se ha podido modificar el usuario.'));
        }
        $this->set(compact('usuario'));
        $this->set('user', $this->Auth->user());
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
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
        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__('Se ha eliminado el usuario.'));
        } else {
            $this->Flash->error(__('No se ha podido eliminar el usuario.'));
        }

        $this->set('user', $this->Auth->user());
        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        // Admin can access every action
        if (isset($user['rol']) && $user['rol'] === 'ADMIN') {
            return true;
        }

        // By default deny access.
        return false;
    }
    public function viewPerfil($id = null)
    {
        $id = $_SESSION['user'];
        $usuario = $this->Usuarios->get($id['dni'], [
            'contain' => ['Partidos']
        ]);

        $this->set('usuario', $usuario);
        $this->set('user', $this->Auth->user());
    }

}
