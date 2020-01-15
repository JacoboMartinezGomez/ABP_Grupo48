<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Campeonato $campeonato
 */

//use App\Controller\CampeonatosController;
use Cake\I18n\Time;
$this->extend('/Pages/navbar');
?>
    <div class="showVista" id="campeonatos">
        <h2><?= __('Campeonatos') ?></h2>
        <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_campeonato') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_inicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_fin') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($campeonatos as $campeonato): ?>
            <tr>
                <td><?= $this->Number->format($campeonato->id_campeonato) ?></td>
                <td><?= h($campeonato->fecha_inicio) ?></td>
                <td><?= h($campeonato->fecha_fin) ?></td>
                    <td class="actions">
                        <?php echo $this->Html->image("ver.png", array(
                            "src" => "Ver",
                            "alt" => "ver",
                            'url' => array('controller' => 'Grupos','action' => 'index', $campeonato->id_campeonato),
                            "class" => "icono"
                        )); ?>
                            <!--Comprobacion para que no se generen los playoffs mas de una vez  -->
                            <?php if(!$campeonato['gruposGenerados'] && !$campeonato['playoffsGenerados']){ ?>
                                <?php echo $this->Html->image("generar.png", array(
                                    "src" => "Generar",
                                    "alt" => "generar",
                                    'url' => array('action' => 'generarGrupos', $campeonato->id_campeonato),
                                    "class" => "icono"
                                )); ?>

                            <!--Comprobacion para que no se generen los playoffs mas de una vez  -->
                            <?php if(!$campeonato['playoffsGenerados'] && $campeonato['gruposGenerados']){ ?>
                                <?php echo $this->Html->image("dado.png", array(
                                    "src" => "GenerarPlayOf",
                                    "alt" => "generarplayoff",
                                    'url' => array('action' => 'generarPartidosPlayOff', $campeonato->id_campeonato),
                                    "class" => "icono"
                                ));} ?>
                        <?php }; ?>


                            <?php 
                            switch($campeonato['comprobarFase']) {
                                case 2: 
                                    echo $this->Html->image("buscarimagen", array(
                                    "src" => "GenerarSemis",
                                    "alt" => "generarSemis",
                                    'url' => array('action' => 'generarPartidosPlayOffPorFase',  2, $campeonato->id_campeonato),
                                    "class" => "icono"
                                ));
                                break;
                                case 3:
                                    echo $this->Html->image("buscarimagen", array(
                                    "src" => "GenerarFinal",
                                    "alt" => "generarFinal",
                                    'url' => array('action' => 'generarPartidosPlayOffPorFase',  3, $campeonato->id_campeonato),
                                    "class" => "icono"
                                ));
                                break;
                            }; ?>
                                

                        <?php if($campeonato->fecha_inicio > TIME::now()){?>
                            <?php echo $this->Html->image("inscribir.png", array(
                                "src" => "Inscribirse",
                                "alt" => "inscribirse",
                                'url' => array('action' => '../parejas/add', $campeonato->id_campeonato),
                                "class" => "icono"
                            )); ?>
                        <?php
                        };
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

