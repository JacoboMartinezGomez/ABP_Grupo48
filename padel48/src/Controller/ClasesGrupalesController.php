<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Mailer\Email;
use Cake\Mailer\TransportFactory;

/**
 * ClasesGrupales Controller
 *
 * @property \App\Model\Table\ClasesGrupalesTable $ClasesGrupales
 *
 * @method \App\Model\Entity\ClasesGrupale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClasesGrupalesController extends AppController
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

        //Filtra las clases, mostrando solo en las que el usuario esta inscrito o imparte
//        $query = $this->ClasesGrupales->find('all')
//                                        ->join([
//                                            'u' => [
//                                                'table' => 'usuarios_inscritos_clase',
//                                                'type' => 'INNER',
//                                                'conditions' =>[
//                                                    ['id_claseGrupal = u.claseGrupal_id'],
//                                                    ['OR' =>
//                                                        ['ClasesGrupales.usuario_id' => $this->Auth->user('dni')],
//                                                        ['u.usuario_id' => $this->Auth->user('dni')]
//                                                    ]
//                                            ]]
//                                        ]);

        $query = $this->ClasesGrupales->find('all')->where(['num_max_apuntados > num_actual_apuntados']);

        $this->set('horas', $this->getHorasPistaEntero());
        $this->set('clasesGrupales',$this->paginate($query));
        $this->set('user', $this->Auth->user());
        $this->loadModel('Usuarios_Inscritos_Clase');
        $query = $this->Usuarios_Inscritos_Clase->find('all')->select('claseGrupal_id')->where(['usuario_id' => $this->Auth->user('dni')]);
        $query->enableHydration(false);
        $toret = [];
        foreach ($query->toArray() as $elem){
            $toret[] = $elem['claseGrupal_id'];
        }

        $this->set('clases_apuntado', $toret);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function misClases()
    {
        $this->paginate = [
            'contain' => ['Usuarios']
        ];


        if($this->Auth->user('rol') != 'PROFESOR'){
            //Filtra las clases, mostrando solo en las que el usuario esta inscrito
            $query = $this->ClasesGrupales->find('all')
                                            ->join([
                                                'u' => [
                                                    'table' => 'usuarios_inscritos_clase',
                                                    'type' => 'INNER',
                                                    'conditions' =>[
                                                        ['ClasesGrupales.id_claseGrupal = u.claseGrupal_id'],
                                                        ['u.usuario_id' => $this->Auth->user('dni')]
                                                        ]
                                                ]])
                                            ->select(['ClasesGrupales.id_claseGrupal',
                                                'ClasesGrupales.fecha_inicio',
                                                'ClasesGrupales.hora',
                                                'ClasesGrupales.usuario_id',
                                                'ClasesGrupales.num_max_apuntados',
                                                'ClasesGrupales.num_actual_apuntados',
                                                'ClasesGrupales.precio',
                                                'ClasesGrupales.pista_reserva',
                                                'ClasesGrupales.hora_reserva',
                                                'ClasesGrupales.fecha_reserva']);

        }else{
            $query = $this->ClasesGrupales->find('all')
                                            ->where(['usuario_id' => $this->Auth->user('dni')]);
        }


//        $query = $this->ClasesGrupales->find('all');

        $this->set('horas', $this->getHorasPistaEntero());
        $this->set('clasesGrupales',$this->paginate($query));
        $this->set('user', $this->Auth->user());
    }

    /**
     * View method
     *
     * @param string|null $id Clases Grupale id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Usuarios');

        $clasesGrupale = $this->ClasesGrupales->get($id, [
            'contain' => ['Usuarios']
        ]);

        $inscritos = $this->Usuarios->find('all')
                                            ->join([
                                                'i' => [
                                                    'table' => 'usuarios_inscritos_clase',
                                                    'type' => 'INNER',
                                                    'conditions' =>[
                                                        ['i.claseGrupal_id' => $id],
                                                        ['i.usuario_id = usuarios.dni']
                                                    ]
                                                ]
                                            ]);

        $this->set('inscritos', $inscritos);
        $this->set('clasesGrupale', $clasesGrupale);
        $this->set('user', $this->Auth->user());
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if(!$this->isAuthorized($this->Auth->user())){
            $this->Flash->error(__('No tiene permisos. Contacte con un administrador.'));
            return $this->redirect(['action' => 'index']);
        }

        $this->loadModel('Usuarios');
        $this->loadModel('Reservas');

        $this->set('hora', $this->getHorasPista());

        $query = $this->Usuarios->find('list',
                                            ['keyField' => 'dni',
                                            'valueField' => function($row){
                                                return $row['apellido'].', '.$row['nombre'].' ('.$row['dni'].')';
                                            }]
                                        )
                                ->where(['rol LIKE' => 'PROFESOR'])
                                ->order(['apellido']);

        $profesores = $query;

        $this->set( 'profesores', $profesores);

        $clasesGrupale = $this->ClasesGrupales->newEntity();
        if ($this->request->is('post')) {
            $clasesGrupale = $this->ClasesGrupales->patchEntity($clasesGrupale, $this->request->getData());

            if($clasesGrupale->fecha_inicio >= Time::now()){
                if($clasesGrupale->num_max_apuntados > 1){
                    if($clasesGrupale->precio >= 0){

//                        $idsHoras = $this->getHorasPistaEntero();
//                        for($i = 1; $i <= sizeof($idsHoras); $i++){
//                            if(date('H:i', strtotime($idsHoras[$i])) == $clasesGrupale->hora){
//                                $idHora = $i;
//                                break;
//                            }
//                        }

                        //Se crea una reserva
                        $reservasContr = new ReservasController();
                        $reserva = $reservasContr->reservarPista($clasesGrupale->usuario_id,
                                                                $this->getHorasPistaInverso()[date('H:i:s', strtotime($clasesGrupale->hora))],
                                                                $clasesGrupale->fecha_inicio);

                        if($reserva != null){
                            $clasesGrupale->fecha_reserva = $reserva->fecha;
                            $clasesGrupale->pista_reserva = $reserva->pista_id;
                            $clasesGrupale->hora_reserva = $reserva->hora;
                            $clasesGrupale->num_actual_apuntados = 0;

                            if ($this->ClasesGrupales->save($clasesGrupale)) {
                                $this->Flash->success(__('La clase grupal ha sido guardada con exito'));

                                return $this->redirect(['action' => 'index']);
                            }
                            $this->Flash->error(__('La clase grupal no se ha podido guardar con exito'));
                        }
                    }else{
                        $this->Flash->error(__('El precio no puede ser negativo'));
                    }
                }else{
                    $this->Flash->error(__('El numero maximo de apuntados es erroneo'));
                }
            }else{
                $this->Flash->error(__('La fecha es erronea'));
            }
        }

        $usuarios = $this->ClasesGrupales->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('clasesGrupale', 'usuarios'));
        $this->set('user', $this->Auth->user());
    }


    /**
     * @param integer|null $id
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     * */
    public function aplazar($id = null){
        $this->loadModel('Reservas');
        $this->loadModel('Usuarios');

        $this->set('hora_reserva', $this->getHorasPistaEntero());
        $this->set('hora_elegida', $this->ClasesGrupales->get($id)->hora_reserva);

        $clasesGrupale = $this->ClasesGrupales->get($id);

        if(!$this->isAuthorized($this->Auth->user()) & $clasesGrupale->usuario_id != $this->Auth->user('dni')){
            $this->Flash->error(__('No tiene permisos. Contacte con un administrador.'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $clasesGrupale = $this->ClasesGrupales->patchEntity($clasesGrupale, $this->request->getData());

            $fechaLimite = Time::now()->modify('+7 days');

            if ($clasesGrupale->fecha_reserva <= $fechaLimite && $clasesGrupale->fecha_reserva >= Time::now()) {

                $reservasContr = new ReservasController();
                $reserva = $reservasContr->reservarPista($clasesGrupale->usuario_id,
                    $clasesGrupale->hora_reserva,
                    $clasesGrupale->fecha_reserva);

                if ($reserva != null) {
                    $clasesGrupale->fecha_reserva = $reserva->fecha;
                    $clasesGrupale->hora_reserva = $reserva->hora;
                    $clasesGrupale->pista_reserva = $reserva->pista_id;

                    if ($this->ClasesGrupales->save($clasesGrupale)) {

                        // Sample SMTP configuration.
                        TransportFactory::setConfig('gmail', [
                            'host' => 'ssl://smtp.gmail.com',
                            'port' => 465,
                            'username' => 'abppadel48@gmail.com',
                            'password' => 'wgfnullmyiffvuzi',
                            'className' => 'Smtp'
                        ]);

                        /*$correos = $this->Usuarios->find()->extract('email');
                        $array = [];
                        foreach($correos as $correo){
                            $array[$correo] = $correo;
                        }*/

                        $profesor = $this->Usuarios->get($clasesGrupale->usuario_id);

                        $email = new Email('default');
                        $email->setFrom(['abppadel48@gmail.com'])
                            ->setTo(['ferodrigueza1998@gmail.com', 'dvfernandez@esei.uvigo.es', 'iffernandez@esei.uvigo.es', 'jmgomez2@esei.uvigo.es'])
                            ->setSubject('Clase grupal aplazada')
                            ->setTransport('gmail')
                            ->send('La clase grupal del profesor ' . $profesor->apellido . ', ' .
                                $profesor->nombre . ' ha sido aplazada al ' . $clasesGrupale->fecha_reserva .
                                ' a las ' . $this->getHorasPistaEntero()[$clasesGrupale->hora_reserva] . ' en la pista ' . $clasesGrupale->pista_reserva);


                        $this->Flash->success(__('La clase grupal ha sido aplazada con exito.'));
                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('Ha ocurrido un error al intentar aplazar la clase'));
                }
                $this->Flash->error(__('No se ha podido reservar pista para esa fecha y hora'));
            }
            $this->Flash->error(__('La fecha propuesta excede el limite de una semana.'));
        }
        $this->set(compact('clasesGrupale'));
        $this->set('user', $this->Auth->user());
    }

    /**
     * Delete method
     *
     * @param string|null $id Clases Grupale id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clasesGrupale = $this->ClasesGrupales->get($id);

        if(!$this->isAuthorized($this->Auth->user()) & $clasesGrupale->usuario_id != $this->Auth->user('dni')){
            $this->Flash->error(__('No tiene permisos. Contacte con un administrador.'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->ClasesGrupales->delete($clasesGrupale)) {
            // Sample SMTP configuration.
            TransportFactory::setConfig('gmail', [
                'host' => 'ssl://smtp.gmail.com',
                'port' => 465,
                'username' => 'abppadel48@gmail.com',
                'password' => 'wgfnullmyiffvuzi',
                'className' => 'Smtp'
            ]);

            

            /*$correos = $this->Usuarios->find()->extract('email');
            $array = [];
            foreach($correos as $correo){
                $array[$correo] = $correo;
            }*/
            $this->loadModel('Usuarios');
            $profesor = $this->Usuarios->get($clasesGrupale->usuario_id);

            $email = new Email('default');
            $email->setFrom(['abppadel48@gmail.com'])
                ->setTo(['ferodrigueza1998@gmail.com', 'dvfernandez@esei.uvigo.es', 'iffernandez@esei.uvigo.es', 'jmgomez2@esei.uvigo.es'])
                ->setSubject('Clase grupal borrada')
                ->setTransport('gmail')
                ->send('La clase grupal del profesor '.$profesor->apellido.', '.
                    $profesor->nombre.' ha sido borrada. Para mas informacion pongase en contacto con el ' .
                    'profesor o un administrador.');

            $this->Flash->success(__('La clases grupal ha sido borrada.'));
        } else {
            $this->Flash->error(__('La clase grupal no ha podido ser borrada'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        //El creador de la fecha propuesta no puede aceptarla
        if ($user['rol'] == 'PROFESOR') {
            return true;
        }

        return parent::isAuthorized($user);
    }

    public function inscribirse($idClase){
        $this->loadModel('Usuarios_Inscritos_Clase');

        $claseQuery = $this->ClasesGrupales->find('all')->where(['id_claseGrupal = '=>$idClase]);
        $clase = $claseQuery->first()->toArray();
        if($clase['num_actual_apuntados'] >= $clase['num_max_apuntados'] ){
            $this->Flash->error(__('Esta clase ya está llena'));
            return $this->redirect(['controller' => 'ClasesGrupales' ,'action' => 'index']);
        }

        $query = $this->Usuarios_Inscritos_Clase->find('all')->where(['usuario_id = '=>$this->Auth->user('dni'), 'claseGrupal_id = ' => $idClase]);
        if($query->first() != null){
            $this->Flash->error(__('Ya estas apuntado a esta clase'));
            return $this->redirect(['controller' => 'ClasesGrupales' ,'action' => 'index']);
        }

        //inscribir usuario
        $inscripcion = $this->Usuarios_Inscritos_Clase->newEntity();
        $inscripcion->claseGrupal_id = $idClase;
        $inscripcion->usuario_id = $this->Auth->user('dni');


        //aumentar numero_apuntados
        $clase = $this->ClasesGrupales->get($idClase);
        $clase->num_actual_apuntados++;


   /*      $this->Usuarios_Inscritos_Clase->save($inscripcion);
        if($this->ClasesGrupales->save($clase)){
            $this->Flash->success(__('Te has inscrito correctamente.'));
            return $this->redirect(['controller' => 'ClasesGrupales' ,'action' => 'mis_clases']);
        }else{
            $this->Flash->error(__('Hubo un problema con la inscripcion. Vuelve a intentarlo.'));
            return $this->redirect(['controller' => 'ClasesGrupales' ,'action' => 'index']);
        } */

        $_SESSION['inscripcion'] = $inscripcion;
        $_SESSION['clase'] = $clase;
        $this->set('user', $this->Auth->user());
        return $this->redirect(['controller' => 'Pasarela','action' => 'claseGrupal']);


    }

    public function desinscribirse($idClase){
        $this->loadModel('Usuarios_Inscritos_Clase');


        $query = $this->Usuarios_Inscritos_Clase->find('all')->where(['usuario_id = '=>$this->Auth->user('dni'), 'claseGrupal_id = ' => $idClase]);
        if($query->first() == null){
            $this->Flash->error(__('No estas apuntado a esta clase'));
            return $this->redirect(['controller' => 'ClasesGrupales' ,'action' => 'index']);
        }

        //disminuir numero_apuntados
        $clase = $this->ClasesGrupales->get($idClase);
        $clase->num_actual_apuntados--;

        //desapuntar usuario
        $inscripcion = $this->Usuarios_Inscritos_Clase->get([$idClase, $this->Auth->user('dni')]);
        if($this->Usuarios_Inscritos_Clase->delete($inscripcion)){
            $this->Flash->success(__('Te has desapuntado correctamente.'));
            return $this->redirect(['controller' => 'ClasesGrupales' ,'action' => 'mis_clases']);
        }
        else{
            $this->Flash->error(__('Se produjo un error'));
            return $this->redirect(['controller' => 'ClasesGrupales' ,'action' => 'mis_clases']);
        }

    }

}
