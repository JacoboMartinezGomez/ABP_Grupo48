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
       
        $this->loadModel('Horarios');
        $this->loadModel('Pistas');
        $this->set('hora_inicio', $this->getHorasPistaEntero());
        
        
        


        $reserva = $this->Reservas->newEntity();

        if ($this->request->is('post')) {
            $reserva = $this->Reservas->patchEntity($reserva, $this->request->getData());
            $reserva->hora = $this->request->getData()['hora'];
            //$fecha = new Time($this->request->getData()['fecha']);
            //$fecha = $fecha->format('Y-m-d');
            //$reserva->fecha = $fecha;
    
            //SELECT * FROM horarios WHERE NOT horarios.id_horario IN( SELECT reservas.hora FROM reservas WHERE reservas.fecha = $fecha)
            
            $horasReservadas = $this->Reservas->find('all')->where(['fecha' => $reserva->fecha])->all()->toArray();
            debug($horasReservadas);
            die;
            $horasDisponibles = $this->Horarios->find('all')->where([]);
            


            //if ($this->Reservas->save($reserva)) {
               // $this->Flash->success(__('Reserva guardada correctamente.'));

              //  return $this->redirect(['action' => 'index']);
            }
            ///$this->Flash->error(__('The reserva could not be saved. Please, try again.'));
        //}
        $this->set(compact('reserva'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Reserva id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reserva = $this->Reservas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reserva = $this->Reservas->patchEntity($reserva, $this->request->getData());
            if ($this->Reservas->save($reserva)) {
                $this->Flash->success(__('The reserva has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reserva could not be saved. Please, try again.'));
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
        $this->request->allowMethod(['post', 'delete']);
        $reserva = $this->Reservas->get($id);
        if ($this->Reservas->delete($reserva)) {
            $this->Flash->success(__('The reserva has been deleted.'));
        } else {
            $this->Flash->error(__('The reserva could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //Funcion que comprueba las reservas y muestra las horas disponibles
    public function comprobarReserva()
    {
        $this->loadModel('Horarios');
        $this->loadModel('Pistas');

        $this->set('hora_inicio', $this->getHorasPista());
        $this->set('numeros_pista', $this->getPistas());


        //$id = '1';
        //$reserva = $this->Reservas->get($id, ['contain' => []]);
     

        //$this->set('reserva', $reserva);


        //$reservas = $this->Reservas->find('list', ['keyField'=>function($pistas){$pistas->get('hora');}]);

        $query = $this->Reservas->find('all')->where(['pista = ' => $numeros_pista]);

       // echo $reservas;
        echo $query;

    }



}
