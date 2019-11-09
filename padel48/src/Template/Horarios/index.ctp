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
                <th scope="col"><?= $this->Paginator->sort('id_horario') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pista_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_inicio') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($horarios as $horario): ?>
            <tr>
                <td><?= $this->Number->format($horario->id_horario) ?></td>
                <td><?= $horario->has('pista') ? $this->Html->link($horario->pista->num_pista, ['controller' => 'Pistas', 'action' => 'view', $horario->pista->num_pista]) : '' ?></td>
                <td><?= h($horario->hora_inicio) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $horario->id_horario]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $horario->id_horario]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $horario->id_horario], ['confirm' => __('Are you sure you want to delete # {0}?', $horario->id_horario)]) ?>
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
