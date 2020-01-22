<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Grupo[]|\Cake\Collection\CollectionInterface $grupos
 */
$this->extend('/Pages/navbar');
?>
<div class="showVista" id="grupos">
    <h2><?= __('Grupos pertenecientes al campeonato '/*.$grupos[0]->id_campeonato*/) ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_grupo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('campeonato_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categoria_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($grupos as $grupo): ?>
            <tr>
                <td><?= $this->Number->format($grupo->id_grupo) ?></td>
                <td><?= $this->Number->format($grupo->campeonato_id) ?></td>
                <!--<td><?= $grupo->has('campeonato_id') ? $this->Html->link($grupo->campeonato_id, ['controller' => 'Campeonatos', 'action' => 'view', $grupo->campeonato_id]) : '' ?></td>-->
                <td><?= $this->Number->format($grupo->categoria_id) ?></td>
                <td class="actions">
                    <?php echo $this->Html->image("ver.png", array(
                        "src" => "Ver",
                        "alt" => "ver",
                        'url' => array('action' => 'view', $grupo->id_grupo, $grupo->campeonato_id),
                        "class" => "icono"
                    )); ?>
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
