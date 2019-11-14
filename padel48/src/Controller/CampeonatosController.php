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
                $idCategoria=0;
                for($i=1; $i<=3; $i++){
                    $categorias->anhadir($idcamp,'MASC',$i,$idCategoria++);
                    $categorias->anhadir($idcamp,'FEM',$i,$idCategoria++);
                    $categorias->anhadir($idcamp,'MIXTO',$i,$idCategoria++);
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


    public function generarGrupos($idCampeonato = null){
        $this->loadModel('Parejas');

        //Para cada categoria
        for($i=0; $i<=8; $i++){
            switch ($i){
                case 0:
                    $tipo = "MASC";
                    $nivel = 1;
                    break;
                case 1:
                    $tipo = "FEM";
                    $nivel = 1;
                    break;
                case 2:
                    $tipo = "MIXTO";
                    $nivel = 1;
                    break;
                case 3:
                    $tipo = "MASC";
                    $nivel = 2;
                    break;
                case 4:
                    $tipo = "FEM";
                    $nivel = 2;
                    break;
                case 5:
                    $tipo = "MIXTO";
                    $nivel = 2;
                    break;
                case 6:
                    $tipo = "MASC";
                    $nivel = 3;
                    break;
                case 7:
                    $tipo = "FEM";
                    $nivel = 3;
                    break;
                case 8:
                    $tipo = "MIXTO";
                    $nivel = 3;
                    break;
            }

            $query = $this->Parejas->find('all')->where(['campeonato_id = ' => $idCampeonato, 'categoria_id =' => $i]);
            $numInscritos = $query->all()->count();
            if ($numInscritos < 8){ //Si no hay suficientes inscritos, error
                $this->Flash->error(__('No hay suficientes inscritos para la categoria ' . $tipo . ' y nivel ' . $nivel));
            }
            else{
                //Calcular numero de grupos
                $numGrupos = $numInscritos / 8;
                $numGrupos = floor($numGrupos);
                $numParejasSinGrupo = $numInscritos % 8;
                if ($numInscritos > 12 && $numInscritos <= 15){
                    $numParejasEliminar = $numInscritos - 12;
                    $parejasEliminar = $this->Parejas->find()->limit($numParejasEliminar)->where(['campeonato_id = ' => $idCampeonato, 'categoria_id =' => $i])->order(['id' => 'DESC'])->all()->toArray();
                    foreach ($parejasEliminar as $pareja ){
                        $this->Parejas->delete($pareja);
                    }
                    $this->Flash->error(__('Se eliminaran '.$numParejasEliminar.' parejas para poder realizar grupos correctamente'));
                }

                $parejasInscritas = $query->all()->toArray();
                //debug($parejasInscritas);
                //$cont1 = 0;
                //$cont2 = 1;
                //$cont3 = 1;

                $gruposController = new GruposController();
                for($x = 1; $x <= $numGrupos; $x++){
                    $gruposController->add($x, $idCampeonato, $i);
                }
                foreach ($parejasInscritas as $pareja){
                    /*
                    if($cont2 == $numGrupos+1){
                        $pareja->grupo_id = $cont3;
                        if(++$cont3 >= $numGrupos){
                            $cont3=1;
                        }
                    }else{
                        $pareja->grupo_id = $cont2;
                        if(++$cont1 == 8){
                            $cont1=0;
                            $cont2++;
                        }

                    }*/
                    $cont8 = 0;
                    $contGruposRellenadosMinimo = 1;
                    $contGrupoRellenarMas = 1;
                    if($contGruposRellenadosMinimo <= $numGrupos){
                        $pareja->grupo_id = $contGruposRellenadosMinimo;
                        $cont8++;
                        if($cont8 == 8){
                            $contGruposRellenadosMinimo++;
                        }
                    }
                    else{
                        $pareja->grupo_id = $contGrupoRellenarMas;
                        $contGrupoRellenarMas++;
                        if($contGrupoRellenarMas > $numGrupos){
                            $contGrupoRellenarMas = 1;
                        }
                    }
                    $this->Parejas->save($pareja);
                }
            }

        }
        $this->generarPartidos($idCampeonato);

        return $this->redirect(['controller' => 'grupos', 'action' => 'index']);
    }

    public function generarPartidos($idCampeonato){
        $this->loadModel('Grupos');
        $query = $this->Grupos->find('all');
        $grupos = $query->all()->toArray();
        foreach($grupos as $grupo){
            
        }
    }

}
