<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pista[]|\Cake\Collection\CollectionInterface $pistas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pista'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Horarios'), ['controller' => 'Horarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Horario'), ['controller' => 'Horarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pistas index large-9 medium-8 columns content">
    <h3><?= __('Pistas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('num_pista') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lugar') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pistas as $pista): ?>
            <tr>
                <td><?= $this->Number->format($pista->num_pista) ?></td>
                <td><?= h($pista->tipo) ?></td>
                <td><?= h($pista->lugar) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pista->num_pista]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pista->num_pista]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pista->num_pista], ['confirm' => __('Are you sure you want to delete # {0}?', $pista->num_pista)]) ?>
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
