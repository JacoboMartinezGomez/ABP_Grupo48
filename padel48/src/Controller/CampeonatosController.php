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
        $campeonatos = $this->Campeonatos->find('all')->all()->toArray();
        foreach ($campeonatos as $campeonato){
            $campeonato['gruposGenerados'] = $this->faseGenerada($campeonato->id_campeonato, 1);
            $campeonato['playoffsGenerados'] = $this->faseGenerada($campeonato->id_campeonato, 2);
        }
        $this->set('user', $this->Auth->user());
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
        $this->set('user', $this->Auth->user());
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
        $this->set('user', $this->Auth->user());
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
        $this->set('user', $this->Auth->user());

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
                //Puede haber como máximo 8 grupos
                if($numGrupos>8){
                    $numGrupos=8;
                }
                //$numParejasSinGrupo = $numInscritos % 8;
                if ($numInscritos > 12 && $numInscritos <= 15){
                    $numParejasEliminar = $numInscritos - 12;
                    $parejasEliminar = $this->Parejas->find()->limit($numParejasEliminar)->where(['campeonato_id = ' => $idCampeonato, 'categoria_id =' => $i])->order(['id' => 'DESC'])->all()->toArray();
                    foreach ($parejasEliminar as $pareja ){
                        $this->Parejas->delete($pareja);
                    }
                    $this->Flash->error(__('Se eliminaran '.$numParejasEliminar.' parejas para poder realizar grupos correctamente'));
                }
                $parejasInscritas = $query->all()->toArray();
                $gruposController = new GruposController();
                for($x = 1; $x <= $numGrupos; $x++){
                    $gruposController->add($x, $idCampeonato, $i);
                }
                $cont8 = 0;
                $contGruposRellenadosMinimo = 1;
                $contGrupoRellenarMas = 1;

                foreach ($parejasInscritas as $pareja){

                    if($contGruposRellenadosMinimo <= $numGrupos){
                        $pareja->grupo_id = $contGruposRellenadosMinimo;
                        $cont8++;
                        if($cont8 == 8){
                            $contGruposRellenadosMinimo++;
                            $cont8 = 0;
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
        return $this->redirect(['controller' => 'grupos', 'action' => 'index', $idCampeonato]);
    }

    public function generarPartidos($idCampeonato){
        $this->loadModel('Grupos');
        $this->loadModel('Parejas');
        $this->loadModel('Enfrentamientos');
        $this->loadModel('ParejasDisputanEnfrentamiento');
        $query = $this->Grupos->find('all')->where(['campeonato_id =' => $idCampeonato]);
        $grupos = $query->all()->toArray();

        foreach($grupos as $grupo){
            $query = $this->Parejas->find('all')->where(['grupo_id =' => $grupo['id_grupo'],
                                                        'campeonato_id =' => $grupo['campeonato_id'],
                                                        'categoria_id =' => $grupo['categoria_id']]);
            $parejas = $query->all()->toArray();
            $numElementos = count($parejas);
            $keys = array_keys($parejas);

            for($i = 0; $i<$numElementos; $i++){

                for($j = $i+1; $j<$numElementos; $j++){
                    $enfrentamiento = $this->Enfrentamientos->newEntity();
                    $enfrentamiento = $this->Enfrentamientos->patchEntity($enfrentamiento, ['grupo_id' => $parejas[$keys[$i]]['grupo_id'],
                        'fase' => 1]);
                    $id = $this->Enfrentamientos->save($enfrentamiento)['id_enfrentamiento'];
                    $parejasDisputanEnfrentamiento = $this->ParejasDisputanEnfrentamiento->newEntity();
                    $parejasDisputanEnfrentamiento = $this->ParejasDisputanEnfrentamiento->patchEntity($parejasDisputanEnfrentamiento, [
                                                                                                                                        'id_pareja1' => $parejas[$keys[$i]]['id'],
                                                                                                                                        'id_pareja2' => $parejas[$keys[$j]]['id'],
                                                                                                                                        'enfrentamiento_id' => $id
                                                                                                                                        ]);

                    $this->ParejasDisputanEnfrentamiento->save($parejasDisputanEnfrentamiento);

                }
            }
        }
    }
    public function generarPartidosPlayOff($idCampeonato){
        $this->loadModel('Grupos');
        $this->loadModel('Parejas');
        $this->loadModel('Enfrentamientos');
        $this->loadModel('ParejasDisputanEnfrentamiento');
        $query = $this->Grupos->find('all')->where(['campeonato_id =' => $idCampeonato]);
        $grupos = $query->all()->toArray();

        $numeroGrupos = count($grupos);
        $parejasPorGrupo = round(8 / $numeroGrupos);
        $contadorParejas = 0;
        $parejasSeleccionadas[0] = "";
        foreach($grupos as $grupo){
            $query = $this->Parejas->find('all')->where(['grupo_id =' => $grupo['id_grupo'],
                                                        'campeonato_id =' => $grupo['campeonato_id'],
                                                        'categoria_id =' => $grupo['categoria_id']])->order(['puntuacion' => 'DESC'])->limit($parejasPorGrupo);
            $parejas = $query->all()->toArray();
            $numeroParejas = count($parejas);
            for($i = 0; $i<$numeroParejas; $i++){
                $parejasSeleccionadas[$contadorParejas] = $parejas[$i];
                $contadorParejas++;
            }
        }
        foreach ($parejasSeleccionadas as $key => $row) {
            $aux[$key] = $row['puntuacion'];
        }
        array_multisort($aux, SORT_DESC, $parejasSeleccionadas);
        $numeroParejasSeleccionadas = count($parejasSeleccionadas);
        if($numeroParejasSeleccionadas > 8){
            $parejasSeleccionadas = array_slice($parejasSeleccionadas, 0, 8);
        }
        $contadorPareja2 = 7;

        for($i = 0; $i < 4; $i++){
            $enfrentamiento = $this->Enfrentamientos->newEntity();
            $enfrentamiento = $this->Enfrentamientos->patchEntity($enfrentamiento, ['grupo_id' => $parejasSeleccionadas[$i]['grupo_id'],
                'fase' => 2]);
            $id = $this->Enfrentamientos->save($enfrentamiento)['id_enfrentamiento'];
            $parejasDisputanEnfrentamiento = $this->ParejasDisputanEnfrentamiento->newEntity();
            $parejasDisputanEnfrentamiento = $this->ParejasDisputanEnfrentamiento->patchEntity($parejasDisputanEnfrentamiento, [
                                                                                                                                'id_pareja1' => $parejasSeleccionadas[$i]['id'],
                                                                                                                                'id_pareja2' => $parejasSeleccionadas[$contadorPareja2-$i]['id'],
                                                                                                                                'enfrentamiento_id' => $id
                                                                                                                                ]);
            $this->ParejasDisputanEnfrentamiento->save($parejasDisputanEnfrentamiento);

        }
        $this->Flash->success(__('PlayOff generado correctamente'));
        return $this->redirect(['controller' => 'campeonatos', 'action' => 'index']);
    }

    public function faseGenerada($idCampeonato, $fase){
        $this->loadModel('Grupos');
        $this->loadModel('Enfrentamientos');
        $query = $this->Grupos->find('all')->where(['campeonato_id =' => $idCampeonato]);
        $grupos = $query->all()->toArray();

        if(!empty($grupos)){
            $query2 = $this->Enfrentamientos->find('all')->where(['grupo_id =' => $grupos[0]['id_grupo'],
                ['fase >=' => $fase]]);
            $enfrentamientos = $query2->all()->toArray();

            return !empty($enfrentamientos);
        }
        return false;

    }
}
