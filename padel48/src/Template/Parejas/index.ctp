<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pareja[]|\Cake\Collection\CollectionInterface $parejas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pareja'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Campeonatos'), ['controller' => 'Campeonatos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Campeonato'), ['controller' => 'Campeonatos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Grupos'), ['controller' => 'Grupos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Grupo'), ['controller' => 'Grupos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="parejas index large-9 medium-8 columns content">
    <h3><?= __('Parejas') ?></h3>
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
                <th scope="col" class="actions"><?= __('Actions') ?></th>
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
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pareja->id_capitan]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pareja->id_capitan]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pareja->id_capitan], ['confirm' => __('Are you sure you want to delete # {0}?', $pareja->id_capitan)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
