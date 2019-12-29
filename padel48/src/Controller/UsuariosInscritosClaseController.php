<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsuariosInscritosClase Controller
 *
 * @property \App\Model\Table\UsuariosInscritosClaseTable $UsuariosInscritosClase
 *
 * @method \App\Model\Entity\UsuariosInscritosClase[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsuariosInscritosClaseController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clasesgrupales', 'Usuarios']
        ];
        $usuariosInscritosClase = $this->paginate($this->UsuariosInscritosClase);

        $this->set(compact('usuariosInscritosClase'));
    }

    /**
     * View method
     *
     * @param string|null $id Usuarios Inscritos Clase id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuariosInscritosClase = $this->UsuariosInscritosClase->get($id, [
            'contain' => ['Clasesgrupales', 'Usuarios']
        ]);

        $this->set('usuariosInscritosClase', $usuariosInscritosClase);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuariosInscritosClase = $this->UsuariosInscritosClase->newEntity();
        if ($this->request->is('post')) {
            $usuariosInscritosClase = $this->UsuariosInscritosClase->patchEntity($usuariosInscritosClase, $this->request->getData());
            if ($this->UsuariosInscritosClase->save($usuariosInscritosClase)) {
                $this->Flash->success(__('The usuarios inscritos clase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuarios inscritos clase could not be saved. Please, try again.'));
        }
        $clasesgrupales = $this->UsuariosInscritosClase->Clasesgrupales->find('list', ['limit' => 200]);
        $usuarios = $this->UsuariosInscritosClase->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('usuariosInscritosClase', 'clasesgrupales', 'usuarios'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuarios Inscritos Clase id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuariosInscritosClase = $this->UsuariosInscritosClase->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuariosInscritosClase = $this->UsuariosInscritosClase->patchEntity($usuariosInscritosClase, $this->request->getData());
            if ($this->UsuariosInscritosClase->save($usuariosInscritosClase)) {
                $this->Flash->success(__('The usuarios inscritos clase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The usuarios inscritos clase could not be saved. Please, try again.'));
        }
        $clasesgrupales = $this->UsuariosInscritosClase->Clasesgrupales->find('list', ['limit' => 200]);
        $usuarios = $this->UsuariosInscritosClase->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('usuariosInscritosClase', 'clasesgrupales', 'usuarios'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuarios Inscritos Clase id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuariosInscritosClase = $this->UsuariosInscritosClase->get($id);
        if ($this->UsuariosInscritosClase->delete($usuariosInscritosClase)) {
            $this->Flash->success(__('The usuarios inscritos clase has been deleted.'));
        } else {
            $this->Flash->error(__('The usuarios inscritos clase could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
