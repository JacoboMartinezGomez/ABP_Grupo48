<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parejasdisputanenfrentamiento[]|\Cake\Collection\CollectionInterface $parejasdisputanenfrentamiento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Parejasdisputanenfrentamiento'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Enfrentamientos'), ['controller' => 'Enfrentamientos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Enfrentamiento'), ['controller' => 'Enfrentamientos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="parejasdisputanenfrentamiento index large-9 medium-8 columns content">
    <h3><?= __('Parejasdisputanenfrentamiento') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_pareja1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_pareja2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enfrentamiento_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('resultado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parejasdisputanenfrentamiento as $parejasdisputanenfrentamiento): ?>
            <tr>
                <td><?= $this->Number->format($parejasdisputanenfrentamiento->id_pareja1) ?></td>
                <td><?= $this->Number->format($parejasdisputanenfrentamiento->id_pareja2) ?></td>
                <td><?= $parejasdisputanenfrentamiento->has('enfrentamiento') ? $this->Html->link($parejasdisputanenfrentamiento->enfrentamiento->id_enfrentamiento, ['controller' => 'Enfrentamientos', 'action' => 'view', $parejasdisputanenfrentamiento->enfrentamiento->id_enfrentamiento]) : '' ?></td>
                <td><?= h($parejasdisputanenfrentamiento->resultado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $parejasdisputanenfrentamiento->id_pareja1]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $parejasdisputanenfrentamiento->id_pareja1]) ?>
                    <?= $this->Html->link(__('Introducir resultado'), ['controller' => 'enfrentamientos', 'action' => 'introducirResultado', $parejasdisputanenfrentamiento->enfrentamiento_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $parejasdisputanenfrentamiento->id_pareja1], ['confirm' => __('Are you sure you want to delete # {0}?', $parejasdisputanenfrentamiento->id_pareja1)]) ?>
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
