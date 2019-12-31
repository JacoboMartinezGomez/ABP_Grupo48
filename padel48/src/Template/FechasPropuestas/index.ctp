<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FechasPropuesta[]|\Cake\Collection\CollectionInterface $fechasPropuestas
 */

$this->extend('/Pages/navbar');
?>
<div class="showVista" id="fechasPropuestas">
    <h2><?= __('Fechas Propuestas por ti') ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enfrentamiento_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creador') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fechasPropuestas as $fechasPropuesta):
                if($fechasPropuesta->creador == $dniUser){
                ?>
            <tr>
                <td><?= $this->Number->format($fechasPropuesta->id) ?></td>
                <td><?= $this->Number->format($fechasPropuesta->enfrentamiento_id) ?></td>
                <td><?= h($fechasPropuesta->creador) ?></td>
                <td><?= h(date('H:i', strtotime($fechasPropuesta->hora))) ?></td>
                <td><?= h($fechasPropuesta->fecha) ?></td>
                <td class="actions">
                    <?php echo $this->Html->image("editar.png", array(
                        "src" => "Editar",
                        "alt" => "editar",
                        'url' => array('action' => 'edit',  $fechasPropuesta->id),
                        "class" => "icono"
                    )); ?>

                    <?php echo $this->Form->postLink(
                        $this->Html->image(
                            "borrar.png",
                            ["alt" => __('Delete')]
                        ),
                        ['action' => 'delete',   $fechasPropuesta->id],
                        ['escape' => false, 'confirm' => __('¿Quieres eliminar la fecha {0}?',  $fechasPropuesta->id)]
                    )?>
                </td>
            </tr>
            <?php }
                endforeach; ?>
        </tbody>
    </table>
    <div >
    <?php echo $this->Html->image("round-add-button.png", array(
                        "src" => "Proponer Hora",
                        "alt" => "Proponer Hora",
                        'url' => array('controller' => 'FechasPropuestas', 'action' => 'add', $enfrentamiento_id),
                    )); ?>
    </div>

    <h2><?= __('Fechas Propuestas por tu rival') ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('enfrentamiento_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('creador') ?></th>
            <th scope="col"><?= $this->Paginator->sort('hora') ?></th>
            <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
            <th scope="col" class="actions"><?= __('Acciones') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($fechasPropuestas as $fechasPropuesta):
            if($fechasPropuesta->creador != $dniUser){?>
            <tr>
                <td><?= $this->Number->format($fechasPropuesta->id) ?></td>
                <td><?= $this->Number->format($fechasPropuesta->enfrentamiento_id) ?></td>
                <td><?= h($fechasPropuesta->creador) ?></td>
                <td><?= h(date('H:i', strtotime($fechasPropuesta->hora))) ?></td>
                <td><?= h($fechasPropuesta->fecha) ?></td>
                <td class="actions">

                    <?php echo $this->Html->image("aceptar.png", array(
                        "src" => "Aceptar",
                        "alt" => "aceptar",
                        'url' => array('action' => 'acept', $fechasPropuesta->id),
                        "class" => "icono"
                    )); ?>

                </td>
            </tr>
        <?php
            } endforeach; ?>
        </tbody>
    </table>
</div>
