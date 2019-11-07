<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enfrentamiento[]|\Cake\Collection\CollectionInterface $enfrentamientos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Enfrentamiento'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="enfrentamientos index large-9 medium-8 columns content">
    <h3><?= __('Enfrentamientos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_enfrentamiento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_capitan1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_capitan2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_grupo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fase') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($enfrentamientos as $enfrentamiento): ?>
            <tr>
                <td><?= $this->Number->format($enfrentamiento->id_enfrentamiento) ?></td>
                <td><?= h($enfrentamiento->id_capitan1) ?></td>
                <td><?= h($enfrentamiento->id_capitan2) ?></td>
                <td><?= $this->Number->format($enfrentamiento->id_grupo) ?></td>
                <td><?= h($enfrentamiento->hora) ?></td>
                <td><?= h($enfrentamiento->fecha) ?></td>
                <td><?= $this->Number->format($enfrentamiento->fase) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $enfrentamiento->id_enfrentamiento]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $enfrentamiento->id_enfrentamiento]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $enfrentamiento->id_enfrentamiento], ['confirm' => __('Are you sure you want to delete # {0}?', $enfrentamiento->id_enfrentamiento)]) ?>
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
