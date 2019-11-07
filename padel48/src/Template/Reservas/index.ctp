<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reserva[]|\Cake\Collection\CollectionInterface $reservas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Reserva'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reservas index large-9 medium-8 columns content">
    <h3><?= __('Reservas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_usuario') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_pista') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservas as $reserva): ?>
            <tr>
                <td><?= h($reserva->id_usuario) ?></td>
                <td><?= $this->Number->format($reserva->id_pista) ?></td>
                <td><?= $this->Number->format($reserva->hora) ?></td>
                <td><?= h($reserva->fecha) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $reserva->id_usuario]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reserva->id_usuario]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reserva->id_usuario], ['confirm' => __('Are you sure you want to delete # {0}?', $reserva->id_usuario)]) ?>
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
