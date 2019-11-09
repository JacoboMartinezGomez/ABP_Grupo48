<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Campeonato[]|\Cake\Collection\CollectionInterface $campeonatos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Campeonato'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Grupos'), ['controller' => 'Grupos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Grupo'), ['controller' => 'Grupos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Parejas'), ['controller' => 'Parejas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pareja'), ['controller' => 'Parejas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Parejas Disputan Enfrentamiento'), ['controller' => 'ParejasDisputanEnfrentamiento', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parejas Disputan Enfrentamiento'), ['controller' => 'ParejasDisputanEnfrentamiento', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="campeonatos index large-9 medium-8 columns content">
    <h3><?= __('Campeonatos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_campeonato') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_inicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_fin') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($campeonatos as $campeonato): ?>
            <tr>
                <td><?= $this->Number->format($campeonato->id_campeonato) ?></td>
                <td><?= h($campeonato->fecha_inicio) ?></td>
                <td><?= h($campeonato->fecha_fin) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $campeonato->id_campeonato]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $campeonato->id_campeonato]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $campeonato->id_campeonato], ['confirm' => __('Are you sure you want to delete # {0}?', $campeonato->id_campeonato)]) ?>
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
