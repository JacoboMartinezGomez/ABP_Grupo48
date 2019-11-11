<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
/**
 * Parejas Controller
 *
 * @property \App\Model\Table\ParejasTable $Parejas
 *
 * @method \App\Model\Entity\Pareja[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ParejasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Campeonatos']
        ];
        $parejas = $this->paginate($this->Parejas);

        $this->set(compact('parejas'));
    }

    /**
     * View method
     *
     * @param string|null $id Pareja id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pareja = $this->Parejas->get($id, [
            'contain' => ['Campeonatos']
        ]);

        $this->set('pareja', $pareja);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($campeonato_id)
    {
        $this->loadModel('Usuarios');
        $this->loadModel('Campeonatos');

        //Comprobar que el campeonato no tenga las inscripciones cerradas
        $query = $this->Campeonatos->find('all')->where(['id_campeonato = '=>$campeonato_id]);
        $campeonatoInicio = $query->first()->toArray()['fecha_inicio'];
        if($campeonatoInicio<TIME::now()){
            $this->Flash->error(__('Las inscripciones de este campeonato ya estan cerradas'));
            return $this->redirect(['controller' => 'Campeonatos' ,'action' => 'index']);
        }

        $pareja = $this->Parejas->newEntity();
        if ($this->request->is('post')) {
            $pareja = $this->Parejas->patchEntity($pareja, $this->request->getData());
            $pareja->campeonato_id=$campeonato_id;



            $pareja->id_capitan='2'; //cambiar por session id
            $pareja->puntuacion='0';
            $pareja->clasificado='0';


            //Comprobacion de que la pareja este registrada en la base de datos
            $parejaQuery = $this->Usuarios->find('all')->where(['dni ='=>$pareja->id_pareja]);
            if($parejaQuery->all()->count()==0){
                $this->Flash->error(__('No existe ningun deportista con ese DNI'));
                return $this->redirect(['action' => 'index']);
            }


            //Se comprueban los sexos de ambos participantes para escoger la categoria
            $sexoPareja = $parejaQuery->first()->toArray()['sexo'];
            $sexoCapitanQuery = $this->Usuarios->find('all')->select('sexo')->where(['dni ='=>$pareja->id_capitan]);
            $sexoCapitan = $sexoCapitanQuery->first()->toArray()['sexo'];
            if ($sexoPareja == $sexoCapitan){
                $pareja->tipo=$sexoCapitan;
            }
            else{
                $pareja->tipo='MIXTO';
            }

            //Comprobacion de que el capitan no este ya inscrito
            $query = $this->Parejas->find('all')->where([
                'campeonato_id =' => ($campeonato_id),
                'tipo =' => $pareja->tipo,
                'nivel =' => $pareja->nivel,
                'OR'=>[['id_capitan =' => $pareja->id_capitan],
                    ['id_pareja =' => $pareja->id_capitan]
                ]
            ]);

            if($query->all()->count()!=0){
                $this->Flash->error(__('Ya estás inscrito en el campeonato'));
                return $this->redirect(['action' => 'index']);
            }


            //Comprobacion de que el otro miembro de la pareja ya este inscrito
            $query = $this->Parejas->find('all')->where([
                'campeonato_id' => ($campeonato_id),
                'tipo' => $pareja->tipo,
                'nivel' => $pareja->nivel,
                'OR'=>[['id_capitan =' => $pareja->id_pareja],
                    ['id_pareja =' => $pareja->id_pareja]
                ]
            ]);

            if($query->all()->count()!=0){
                $this->Flash->error(__('Tu pareja ya está inscrita en el campeonato'));
                return $this->redirect(['action' => 'index']);
            }

            if ($this->Parejas->save($pareja)) {
                $this->Flash->success(__("Correcto"));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pareja could not be saved. Please, try again.'));


        }
        $campeonatos = $this->Parejas->Campeonatos->find('list', ['limit' => 200]);
        $this->set(compact('pareja', 'campeonatos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pareja id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pareja = $this->Parejas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pareja = $this->Parejas->patchEntity($pareja, $this->request->getData());
            if ($this->Parejas->save($pareja)) {
                $this->Flash->success(__('The pareja has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pareja could not be saved. Please, try again.'));
        }
        $campeonatos = $this->Parejas->Campeonatos->find('list', ['limit' => 200]);
        $this->set(compact('pareja', 'campeonatos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pareja id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pareja = $this->Parejas->get($id);
        if ($this->Parejas->delete($pareja)) {
            $this->Flash->success(__('The pareja has been deleted.'));
        } else {
            $this->Flash->error(__('The pareja could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
