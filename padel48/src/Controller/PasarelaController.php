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
        $this->set(compact('reserva'));
        $this->set('user', $this->Auth->user());
    }

    public function partidoPromocionado()
    {
        $this->loadModel('Partidos');
        $this->loadModel('Usuarios');
        $id_partido = $_SESSION['id_partido'];
        $partido = $this->Partidos->get($id_partido);
        $this->set('partido', $partido);
        $this->set('user', $this->Auth->user());
    }

    public function addPartidoPromocionado()
    {
        $this->loadModel('Usuarios');
        $this->loadModel('Partidos');
        $this->loadModel('Reservas');
        $id_partido = $_SESSION['id_partido'];
        if($this->Partidos->addDeportista($id_partido, $this->Auth->user('dni'))){
                $partido = $this->Partidos->get($id_partido);
                $reservasController = new ReservasController();
                $horaInt = date('H:i:s', strtotime($partido->hora));
                $aux = $this->getHorasPistaInverso();

                if($partido->usuario_id != null && $partido->usuario_id2 != null && $partido->usuario_id3 != null && $partido->usuario_id4 != null){
                    if($reservasController->hayPistaDisponible($partido->fecha, $aux[$horaInt])){
                        $this->Flash->success(__('Se ha inscrito en el partido correctamente.'));
                        $this->getRequest()->getSession()->write(['Reservas.fecha' => $partido->fecha]);
                        $this->getRequest()->getSession()->write(['Reservas.hora' => $aux[$horaInt]]);
                        $this->getRequest()->getSession()->write(['Reservas.dni' => 'admin']);
                        $reservasController->add();
                        $this->Partidos->delete($partido);
                    }
                    else{
                        $this->Partidos->delete($partido);
                        $this->Flash->error(__('No hay pistas disponibles para realizar este partido'));
                    }
                    return $this->redirect(['controller' => 'partidos', 'action' => 'index']);
                }
            }
            else{
                $this->Flash->error(__('No se ha podido inscribir en el partido. El partido esta completo.'));
            }
            $usuarios = $this->Partidos->Usuarios->find('list', ['limit' => 200]);
            $this->set(compact('partido', 'usuarios'));
            $this->set('user', $this->Auth->user());
            return $this->redirect(['controller' => 'partidos', 'action' => 'index']);
    }

    public function inscripcionCampeonato()
    {
        $this->loadModel('Parejas');
        $pareja = $_SESSION['pareja'];
        $this->set('pareja', $pareja);
        $this->set('user', $this->Auth->user());
    }

    public function addInscripcion()
    {
        $this->loadModel('Parejas');
        $this->loadModel('Capeonatos');
        $pareja = $_SESSION['pareja'];

        if ($this->Parejas->save($pareja)) {
            $this->Flash->success(__("Correcto"));
            return $this->redirect(['controller' => 'Campeonatos' ,'action' => 'index']);
        }else{
            $this->Flash->error(__('The pareja could not be saved. Please, try again.'));
        }
        $campeonatos = $this->Parejas->Campeonatos->find('list', ['limit' => 200]);
        $this->set(compact('pareja', 'campeonatos'));
        $this->set('user', $this->Auth->user());
    }
}
