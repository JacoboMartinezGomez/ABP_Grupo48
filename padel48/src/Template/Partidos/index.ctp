<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Partido[]|\Cake\Collection\CollectionInterface $partidos
 */
$this->extend('/Pages/navbar');
?>
<div class="showVista" id="partidos">
    <h2><?= __('Partidos promocionados') ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('usuario_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_id2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_id3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_id4') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($partidos as $partido): ?>
            <tr>
                <td><?= h($partido->usuario_id) ?></td>
                <td><?= h($partido->usuario_id2) ?></td>
                <td><?= h($partido->usuario_id3) ?></td>
                <td><?= h($partido->usuario_id4) ?></td>
                <td><?= h($partido->hora); echo " - ".$partido['fecha'] ?></td>
                <td class="actions">
                <?php echo $this->Html->image("inscribir.png", array(
                    "src" => "Inscribirse",
                    "alt" => "inscribirse",
                    'url' => array('action' => 'inscribirse', $partido->id_partido),
                    "class" => "icono"
                )); ?>
                <?php if ($user['rol'] == 'ADMIN'){?>
                    <?php echo $this->Form->postLink(
                        $this->Html->image(
                            "borrar.png",
                            ["alt" => __('Delete')]
                        ),
                        ['action' => 'delete',  $partido->id_partido],
                        ['escape' => false, 'confirm' => __('¿Quieres eliminar el partido número {0}?', $partido->id_partido)]
                    )?>
                <?php }; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('ultimo') . ' >>') ?>
        </ul>
            <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, mostrando {{current}} entrada(s) de un total de {{count}} ')]) ?></p>
    </div>
</div>
