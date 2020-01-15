<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pasarela Controller
 *
 * @property \App\Model\Table\PasarelaTable $Pasarela
 *
 * @method \App\Model\Entity\Horario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PasarelaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function reserva()
    {
        $reserva = $_SESSION['reserva'];
        $this->set('horas', $this->getHorasPistaEntero());
        $this->set('reserva', $reserva);
        $this->set('user', $this->Auth->user());
    }

    public function addReserva()
    {
        $this->loadModel('Usuarios');
        $this->loadModel('Reservas');
        $reserva = $_SESSION['reserva'];
        $usuario = $_SESSION['usuario'];
        $numReservas = $_SESSION['numReservas'];
        if($this->Reservas->save($reserva)){
            $usuario->numero_pistas = $usuario->numero_pistas+1;
            $this->Usuarios->save($usuario);
            $this->Flash->success(__('Reserva guardada correctamente para la pista '. ($numReservas+1) ));
        }else{
            $this->Flash->error(__('No se ha guardado correctamente.'));
        }
        return $this->redirect(['controller' => 'reservas','action' => 'index']);
    }
}
