<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FechasPropuesta[]|\Cake\Collection\CollectionInterface $fechasPropuestas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fechas Propuesta'), ['action' => 'add', $enfrentamiento_id]) ?></li>
        <li><?= $this->Html->link(__('List Enfrentamientos'), ['controller' => 'Enfrentamientos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Enfrentamiento'), ['controller' => 'Enfrentamientos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fechasPropuestas index large-9 medium-8 columns content">
    <h3><?= __('Fechas Propuestas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enfrentamiento_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creador') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fechasPropuestas as $fechasPropuesta): ?>
            <tr>
                <td><?= $this->Number->format($fechasPropuesta->id) ?></td>
                <td><?= $this->Number->format($fechasPropuesta->enfrentamiento_id) ?></td>
                <td><?= h($fechasPropuesta->creador) ?></td>
                <td><?= h(date('H:i', strtotime($fechasPropuesta->hora))) ?></td>
                <td><?= h($fechasPropuesta->fecha) ?></td>
                <td class="actions">

                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fechasPropuesta->id]) ?>
                    <?= $this->Html->link(__('Aceptar'), ['action' => 'acept', $fechasPropuesta->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fechasPropuesta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fechasPropuesta->id)]) ?>
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
