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
        $reservas = $this->paginate($this->Reservas);

        $this->set(compact('reservas'));
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

        if ($this->request->is('post')) {
            $reserva = $this->Reservas->patchEntity($reserva, $this->request->getData());
            $reserva->hora = $this->request->getData()['hora'];
            $reserva->id_usuario = $this->Auth->user('dni');
            $usuario = $this->Usuarios->find('all')->where(['dni' => $this->Auth->user('dni')])->first();


            $numReservas = $this->Reservas->find('all')->where(['fecha' => $reserva->fecha, 'hora' => $reserva->hora])->all()->count();
            $numeroPistas = $this->Pistas->find('all')->all()->count();

            if($usuario->numero_pistas == 5){
                $this->Flash->error(__('No puedes reservar más de 5 pistas'));
                return $this->redirect(['action' => 'index']);
            }

            if($numReservas == $numeroPistas){
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


    /**
     * Delete method
     *
     * @param string|null $id Reserva id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->loadModel('Usuarios');

        $this->request->allowMethod(['post', 'delete']);
        $reserva = $this->Reservas->get($id);
        if ($this->Reservas->delete($reserva)) {
            $usuario = $this->Usuarios->find('all')->where(['dni' => $reserva->id_usuario])->first();
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

        $usuario = $this->Usuarios->find('all')->where(['dni' => $this->Auth->user('dni')])->first();
        $reservas = $this->Reservas->find('all')->where(['id_usuario' => $usuario->dni, 'fecha <' => Time::now()]);
        $numeroReservas = $reservas->count();
        $usuario->numero_pistas = $usuario->numero_pistas - $numeroReservas;
        $reservas->delete()->execute();
        $this->Usuarios->save($usuario);
    }



}
