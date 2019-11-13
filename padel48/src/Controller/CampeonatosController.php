<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Campeonatos Controller
 *
 * @property \App\Model\Table\CampeonatosTable $Campeonatos
 *
 * @method \App\Model\Entity\Campeonato[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CampeonatosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $campeonatos = $this->paginate($this->Campeonatos);

        $this->set(compact('campeonatos'));
    }

    /**
     * View method
     *
     * @param string|null $id Campeonato id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $campeonato = $this->Campeonatos->get($id, [
            'contain' => ['Categorias', 'Grupos', 'Parejas', 'ParejasDisputanEnfrentamiento']
        ]);

        $this->set('campeonato', $campeonato);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $campeonato = $this->Campeonatos->newEntity();
        if ($this->request->is('post')) {
            $campeonato = $this->Campeonatos->patchEntity($campeonato, $this->request->getData());
            $fecha_inicio = $this->request->getData()['fecha_inicio'];
            $fecha_fin = $this->request->getData()['fecha_fin'];
            $fecha_inicio = \Cake\Database\Type::build('date')->marshal($fecha_inicio);
            $fecha_fin = \Cake\Database\Type::build('date')->marshal($fecha_fin);
            if ($fecha_fin<=$fecha_inicio){
                $this->Flash->error(__('La fecha de finalización del campeonato debe ser posterior a la de inicio'));
            }
            elseif ($fecha_inicio<Time::now()){
                $this->Flash->error(__('La fecha de inicio debe ser posterior a la fecha de hoy'));
            }
            else{
                $idcamp = $this->Campeonatos->save($campeonato)['id_campeonato'];

                $categorias = new CategoriasController();
                for($i=1; $i<=3; $i++){
                    $categorias->anhadir($idcamp,'MASC',$i);
                    $categorias->anhadir($idcamp,'FEM',$i);
                    $categorias->anhadir($idcamp,'MIXTO',$i);
                }

                $this->Flash->success(__('El campeonato ha sido guardado'));
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('campeonato'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Campeonato id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $campeonato = $this->Campeonatos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $campeonato = $this->Campeonatos->patchEntity($campeonato, $this->request->getData());
            if ($this->Campeonatos->save($campeonato)) {
                $this->Flash->success(__('The campeonato has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The campeonato could not be saved. Please, try again.'));
        }
        $this->set(compact('campeonato'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Campeonato id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $campeonato = $this->Campeonatos->get($id);
        if ($this->Campeonatos->delete($campeonato)) {
            $this->Flash->success(__('The campeonato has been deleted.'));
        } else {
            $this->Flash->error(__('The campeonato could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function generarGrupos(){
        if ($this->request->is('post')) {
            $this->loadModel('Parejas');
            $idCampeonato = $this->request->getData()['id_campeonato'];
            $gruposController = new GruposController();
            //Para cada nivel
            for($i=1; $i<=3; $i++){
                for($j = 1; $j <= 3; $j++){
                    switch ($j){
                        case 1:
                            $tipo = "MASC";
                            break;
                        case 2:
                            $tipo = "FEM";
                            break;
                        case 3:
                            $tipo = "MIXTO";
                            break;
                    }

                    $query = $this->Parejas->find('all')->where(['campeonato_id = ' => $idCampeonato, 'nivel = ' => $i, 'tipo = ' => $tipo]);
                    $numInscritos = $query->all()->count();
                    if ($numInscritos < 8){ //Si no hay suficientes inscritos, error
                        $this->Flash->error(__('No hay suficientes inscritos para la categoria ' . $tipo . ' y nivel ' . $i));
                    }
                    else{
                        //Calcular numero de grupos
                        $numGrupos = $numInscritos / 8;
                        $numGrupos = floor($numGrupos);
                        $numParejasSinGrupo = $numInscritos % 8;
                        if (($numParejasSinGrupo / $numGrupos) > 5){
                            $this->Flash->error(__('No se pueden realizar grupos para la categoria ' . $tipo . ' y nivel ' . $i));
                        }
                        else{
                            $parejasInscritas = $query->all()->toArray();
                            $cont1 = 0;
                            $cont2 = 0;
                            $cont3 = 0;
                            for($x = 0; $x < $numGrupos; $x++){
                                $gruposController->add($x, $idCampeonato, $tipo, $i);
                            }
                            foreach ($parejasInscritas as &$pareja){
                                if($cont2 == $numGrupos){
                                    $pareja->grupo_id = $cont3;
                                    if(++$cont3 == $numGrupos){
                                        $cont3=0;
                                    }
                                }else{
                                    $pareja->grupo_id = $cont2;
                                    if(++$cont1 == 8){
                                        $cont1=0;
                                        $cont2++;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
