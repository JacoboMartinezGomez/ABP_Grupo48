<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enfrentamiento[]|\Cake\Collection\CollectionInterface $enfrentamientos
 * * @var \App\Model\Entity\FechasPropuesta[]|\Cake\Collection\CollectionInterface $fechaPropuesta
 */
$this->extend('/Pages/navbar');
?>
    <div class="showVista" id="enfrentamientos">
    <h2><?= __('Enfrentamientos') ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" width = "140px"><?= $this->Paginator->sort('id_enfrentamiento', 'Nº Enfrentamiento') ?> </th>
                <th scope="col"><?= $this->Paginator->sort('id_grupo', 'Grupo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rival', 'Capitan Rival') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fase') ?></th>
                <th scope="col"><?= $this->Paginator->sort('resultado', 'Ganador') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($enfrentamientos as $enfrentamiento): ?>
            <tr>
                <td><?= $this->Number->format($enfrentamiento->enfrentamientos['id_enfrentamiento']) ?></td>
                <td><?= $this->Number->format($enfrentamiento->enfrentamientos['grupo_id']) ?></td>
                <td><?= $this->Html->link($enfrentamiento['rival'], ['controller' => 'Usuarios', 'action' => 'view', $enfrentamiento['rival']]) ?></td>
                <td><?= $enfrentamiento->enfrentamientos['hora'] != null ? h(date('H:i', strtotime($enfrentamiento->enfrentamientos['hora']))) : 'Sin hora acordada' ?></td>
                <td><?= $enfrentamiento->enfrentamientos['fecha'] != null ? h($enfrentamiento->enfrentamientos['fecha']) : 'Sin fecha acordada'  ?></td>
                <td><?= $this->Number->format($enfrentamiento->enfrentamientos['fase']) ?></td>
                <td><?= $enfrentamiento->d['resultado'] ? $this->Html->link($enfrentamiento->d['resultado'], ['controller' => 'Usuarios', 'action' => 'view', $enfrentamiento->d['resultado']]) : '--'?></td>
                <td class="actions">
                    <?php if ($enfrentamiento->enfrentamientos['fecha'] == null){?>
                    <?php if ($user['rol'] != 'ADMIN'){?>
                        <?php echo $this->Html->image("calendario.png", array(
                            "src" => "Proponer fecha",
                            "alt" => "proponerFecha",
                            'url' => array('controller' => 'FechasPropuestas', 'action' => 'index', $enfrentamiento->enfrentamientos['id_enfrentamiento']),
                            "class" => "icono"
                        )); ?>
                    <?php }
                        }; ?>

                    <?php if ($user['rol'] == 'ADMIN'){?>
                        <?php echo $this->Html->image("marcador.png", array(
                            "src" => "Añadir Resultado",
                            "alt" => "anhadirResultado",
                            'url' => array('controller' => 'Enfrentamientos', 'action' => 'introducirResultado', $enfrentamiento->enfrentamientos['id_enfrentamiento']),
                            "class" => "icono"
                        )); ?>
                    <?php }; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
