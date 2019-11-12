<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Noticias Controller
 *
 * @property \App\Model\Table\NoticiasTable $Noticias
 *
 * @method \App\Model\Entity\Noticia[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NoticiasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Usuarios']
        ];

        $noticias = $this->paginate($this->Noticias);
        $this->set(compact('noticias'));
    }

    /**
     * View method
     *
     * @param string|null $id Noticia id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $noticia = $this->Noticias->get($id, [
            'contain' => ['Usuarios']
        ]);

        $this->set('noticia', $noticia);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //Obtener el usuario actual
        $currentUser = null;
        $this->set('userId', $currentUser->usuario_id);
        $noticia = $this->Noticias->newEntity();
        if ($this->request->is('post')) {
            $noticia = $this->Noticias->patchEntity($noticia, $this->request->getData());
            if ($this->Noticias->save($noticia)) {
                $this->Flash->success(__('La noticia ha sido publicada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La noticia no ha podido ser publicada. Intentelo de nuevo.'));
        }
        $usuarios = $this->Noticias->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('noticia', 'usuarios'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Noticia id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
//    public function edit($id = null)
//    {
//        $noticia = $this->Noticias->get($id, [
//            'contain' => []
//        ]);
//        if ($this->request->is(['patch', 'post', 'put'])) {
//            $noticia = $this->Noticias->patchEntity($noticia, $this->request->getData());
//            if ($this->Noticias->save($noticia)) {
//                $this->Flash->success(__('The noticia has been saved.'));
//
//                return $this->redirect(['action' => 'index']);
//            }
//            $this->Flash->error(__('The noticia could not be saved. Please, try again.'));
//        }
//        $usuarios = $this->Noticias->Usuarios->find('list', ['limit' => 200]);
//        $this->set(compact('noticia', 'usuarios'));
//    }

    /**
     * Delete method
     *
     * @param string|null $id Noticia id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $noticia = $this->Noticias->get($id);
        if ($this->Noticias->delete($noticia)) {
            $this->Flash->success(__('La noticia ha sido eliminada.'));
        } else {
            $this->Flash->error(__('No se ha podido eliminar la noticia. Intentelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}