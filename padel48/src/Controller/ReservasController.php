<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;
/**
 * Reservas Controller
 *
 * @property \App\Model\Table\ReservasTable $Reservas
 *
 * @method \App\Model\Entity\Reserva[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReservasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        //$reservas = $this->paginate($this->Reservas);

        $query = $this->Reservas->find('all')
                                ->where(['id_usuario' => $this->Auth->user('dni')]);

        $this->set('horas', $this->getHorasPistaEntero());
        $this->set('reservas', $this->paginate($query));
        $this->set('user', $this->Auth->user());
    }

    /**
     * View method
     *
     * @param string|null $id Reserva id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->borrarReservasPasadas();

        $reserva = $this->Reservas->get($id, [
            'contain' => []
        ]);

        $this->set('reserva', $reserva);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        $this->borrarReservasPasadas();
        $this->loadModel('Usuarios');
        $this->loadModel('Pistas');
        $this->set('hora_inicio', $this->getHorasPistaEntero());


        $reserva = $this->Reservas->newEntity();
        if ($this->request->is('post') || $this->getRequest()->getSession()->check('Reservas.dni')) {
            $reserva = $this->Reservas->patchEntity($reserva, $this->request->getData());

            if($this->getRequest()->getSession()->check('Reservas.dni')){
                $reserva->id_usuario = $this->getRequest()->getSession()->consume('Reservas.dni');
                $reserva->hora = $this->getRequest()->getSession()->consume('Reservas.hora');
                $reserva->fecha = $this->getRequest()->getSession()->consume('Reservas.fecha');
            }
            else{
                $reserva->hora = $this->request->getData()['hora'];
                $reserva->id_usuario = $this->Auth->user('dni');
            }

            $usuario = $this->Usuarios->find('all')->where(['dni' => $reserva->id_usuario])->first();
            $numReservas = $this->Reservas->find('all')->where(['fecha' => $reserva->fecha, 'hora' => $reserva->hora])->all()->count();

            if($usuario->numero_pistas == 5 && $usuario->dni != 'admin'){
                $this->Flash->error(__('No puedes reservar más de 5 pistas'));
                return $this->redirect(['action' => 'index']);
            }

            if(!$this->hayPistaDisponible($reserva->fecha, $reserva->hora)){
                $this->Flash->error(__('Las reservas están llenas para ese día y hora'));
            }
            else{
                $reserva->pista_id = $numReservas+1;
                if($this->Reservas->save($reserva)){

                    $usuario->numero_pistas = $usuario->numero_pistas+1;
                    $this->Usuarios->save($usuario);
                    $this->Flash->success(__('Reserva guardada correctamente para la pista '. ($numReservas+1) ));
                    return $this->redirect(['action' => 'index']);
                }
            }
        }
        $this->set(compact('reserva'));
    }

    public function hayPistaDisponible($fecha, $hora){
        $this->loadModel('Pistas');
        $numReservas = $this->Reservas->find('all')->where(['fecha' => $fecha, 'hora' => $hora])->all()->count();
        $numeroPistas = $this->Pistas->find('all')->all()->count();
        if($numReservas == $numeroPistas){
            return false;
        }
        else{
            return true;
        }
    }


    /**
     * Delete method
     *
     * @param string|null $id Reserva id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete()
    {
        $this->loadModel('Usuarios');

        $this->request->allowMethod(['post', 'delete']);

        $id_usuario = $this->request->getQuery('id_usuario');
        $pista_id = $this->request->getQuery('pista');
        $hora = $this->request->getQuery('hora');
        $fecha = $this->request->getQuery('fecha');
        $reservaEliminar = $this->Reservas->find('all')->where(['id_usuario ='=>$id_usuario, 'pista_id ='=>$pista_id, 'hora ='=>$hora, 'fecha ='=>$fecha['date']])->first();
        debug($reservaEliminar);

//        $res = $this->Reservas->find('all')
//                                ->where([
//                                    'id_usuario' => $reserva->id_usuario,
//                                    'pista_id' => $reserva->pista_id,
//                                    'hora' => $reserva->hora,
//                                    'fecha' => $reserva->fecha,
//                                    ]);

        if ($this->Reservas->delete($reservaEliminar)) {
            $usuario = $this->Usuarios->find('all')->where(['dni' => $id_usuario])->first();
            $usuario->numero_pistas = $usuario->numero_pistas - 1;
            $this->Usuarios->save($usuario);
            $this->Flash->success(__('La reserva fue eliminada.'));
        } else {
            $this->Flash->error(__('La reserva no pudo ser eliminada.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function borrarReservasPasadas(){
        $this->loadModel('Usuarios');

        //Se borran las reservas del usuario que ha hecho la peticion
        $usuario = $this->Usuarios->find('all')->where(['dni' => $this->Auth->user('dni')])->first();
        $reservas = $this->Reservas->find('all')->where(['id_usuario' => $usuario->dni, 'fecha <' => Time::now()]);
        $numeroReservas = $reservas->count();
        $usuario->numero_pistas = $usuario->numero_pistas - $numeroReservas;
        $reservas->delete()->execute();
        $this->Usuarios->save($usuario);

        //Si el usuario que ha hecho la peticion no es 'admin', se comprueban y borran las reservas de admin
        if($this->Auth->user('dni') != 'admin'){
            $usuarioAdmin = $this->Usuarios->find('all')->where(['dni' => 'admin'])->first();
            $reservasAdmin = $this->Reservas->find('all')->where(['id_usuario' => $usuario->dni, 'fecha <' => Time::now()]);
            $numeroReservasAdmin = $reservas->count();
            $usuarioAdmin->numero_pistas = $usuarioAdmin->numero_pistas - $numeroReservas;
            $reservasAdmin->delete()->execute();
            $this->Usuarios->save($usuarioAdmin);
        }
    }
}
