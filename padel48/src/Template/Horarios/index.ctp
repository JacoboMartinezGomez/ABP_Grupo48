<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Horario[]|\Cake\Collection\CollectionInterface $horarios
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Horario'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pistas'), ['controller' => 'Pistas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pista'), ['controller' => 'Pistas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="horarios index large-9 medium-8 columns content">
    <h3><?= __('Horarios') ?></h3>
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
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
