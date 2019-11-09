<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ParejasDisputanEnfrentamiento[]|\Cake\Collection\CollectionInterface $parejasDisputanEnfrentamiento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Parejas Disputan Enfrentamiento'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Campeonatos'), ['controller' => 'Campeonatos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Campeonato'), ['controller' => 'Campeonatos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="parejasDisputanEnfrentamiento index large-9 medium-8 columns content">
    <h3><?= __('Parejas Disputan Enfrentamiento') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_capitan') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_pareja') ?></th>
                <th scope="col"><?= $this->Paginator->sort('campeonato_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_enfrentamiento') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parejasDisputanEnfrentamiento as $parejasDisputanEnfrentamiento): ?>
            <tr>
                <td><?= h($parejasDisputanEnfrentamiento->id_capitan) ?></td>
                <td><?= h($parejasDisputanEnfrentamiento->id_pareja) ?></td>
                <td><?= $parejasDisputanEnfrentamiento->has('campeonato') ? $this->Html->link($parejasDisputanEnfrentamiento->campeonato->id_campeonato, ['controller' => 'Campeonatos', 'action' => 'view', $parejasDisputanEnfrentamiento->campeonato->id_campeonato]) : '' ?></td>
                <td><?= $this->Number->format($parejasDisputanEnfrentamiento->id_enfrentamiento) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $parejasDisputanEnfrentamiento->id_capitan]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $parejasDisputanEnfrentamiento->id_capitan]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $parejasDisputanEnfrentamiento->id_capitan], ['confirm' => __('Are you sure you want to delete # {0}?', $parejasDisputanEnfrentamiento->id_capitan)]) ?>
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
