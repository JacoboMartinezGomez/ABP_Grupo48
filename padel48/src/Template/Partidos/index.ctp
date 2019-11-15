<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Partido[]|\Cake\Collection\CollectionInterface $partidos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Partido'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="partidos index large-9 medium-8 columns content">
    <h3><?= __('Partidos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('usuario_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_id2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_id3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_id4') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($partidos as $partido): ?>
            <tr>
                <td><?= $partido->has('usuario') ? $this->Html->link($partido->usuario->dni, ['controller' => 'Usuarios', 'action' => 'view', $partido->usuario->dni]) : '' ?></td>
                <td><?= h($partido->usuario_id2) ?></td>
                <td><?= h($partido->usuario_id3) ?></td>
                <td><?= h($partido->usuario_id4) ?></td>
                <td><?= h($partido->hora) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $partido->usuario_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $partido->usuario_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $partido->usuario_id], ['confirm' => __('Are you sure you want to delete # {0}?', $partido->usuario_id)]) ?>
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
