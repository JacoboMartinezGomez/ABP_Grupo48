<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Horario[]|\Cake\Collection\CollectionInterface $horarios
 */
$this->extend('/Pages/navbar');
?>
<div class="showVista" id="horarios">
    <div id="cabeceraHorario">
        <h2><?= __('Horarios') ?> </h2>
        <?php if ($user['rol'] == 'ADMIN'){?>
            <div id="iconoHorario">
                <?php echo $this->Html->image("editar.png", array(
                    "src" => "Editar",
                    "alt" => "editar",
                    'url' => array('action' => 'edit'),
                    "class" => "icono"
                )); ?>
            </div>
        <?php }; ?>
    </div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('hora_inicio') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($horarios as $horario): ?>
            <tr>
                <td><?= h(date('H:i', strtotime($horario->hora_inicio))) ?></td>
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
