<?php


namespace App\Controller;


class UsuariosController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
        $usuarios = $this->Paginator->paginate($this->Usuarios->find());
        $this->set(compact('usuarios'));
    }

    public function view($dni = null)
    {
        $usuario = $this->Usuarios->findByDni($dni)->firstOrFail();
        $this->set(compact('usuario'));
    }

}
