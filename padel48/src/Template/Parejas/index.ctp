<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pareja[]|\Cake\Collection\CollectionInterface $parejas
 */
$this->extend('/Pages/navbar');
?>
<div class="showVista" id="parejas">
    <h2><?= __('Parejas') ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_capitan') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_pareja') ?></th>
                <th scope="col"><?= $this->Paginator->sort('campeonato_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grupo_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categoria_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('puntuacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clasificado') ?></th>
                <?php if ($user['rol'] == 'ADMIN'){?>
                    <th scope="col" class="actions"><?= __('Acciones') ?></th>
                <?php }; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parejas as $pareja): ?>
            <tr>
            <td><?= $this->Number->format($pareja->id) ?></td>
                <td><?= h($pareja->id_capitan) ?></td>
                <td><?= h($pareja->id_pareja) ?></td>
                <td><?= $pareja->has('campeonato') ? $this->Html->link($pareja->campeonato->id_campeonato, ['controller' => 'Campeonatos', 'action' => 'view', $pareja->campeonato->id_campeonato]) : '' ?></td>
                <td><?= $pareja->has('grupo') ? $this->Html->link($pareja->grupo->id_grupo, ['controller' => 'Grupos', 'action' => 'view', $pareja->grupo->id_grupo]) : '' ?></td>
                <td><?= $pareja->has('categoria') ? $this->Html->link($pareja->categoria->campeonato_id, ['controller' => 'Categorias', 'action' => 'view', $pareja->categoria->campeonato_id]) : '' ?></td>
                <td><?= $this->Number->format($pareja->puntuacion) ?></td>
                <td><?= h($pareja->clasificado) ?></td>
                <?php if ($user['rol'] == 'ADMIN'){?>
                    <td class="actions">
                        <?php echo $this->Form->postLink(
                                $this->Html->image(
                                    "borrar.png",
                                    ["alt" => __('Delete')]
                                ),
                                ['action' => 'delete',   $pareja->id_capitan],
                                ['escape' => false, 'confirm' => __('¿Quieres eliminar la pareja {0}?',  $pareja->id_capitan)]
                            )?>
                    </td>
                <?php }; ?>
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
