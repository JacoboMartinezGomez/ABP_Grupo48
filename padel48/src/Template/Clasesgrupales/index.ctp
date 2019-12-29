<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClasesGrupale[]|\Cake\Collection\CollectionInterface $clasesGrupales
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Clases Grupale'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clasesGrupales index large-9 medium-8 columns content">
    <h2><?= __('Clases Grupales') ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_claseGrupal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_inicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('num_max_apuntados') ?></th>
                <th scope="col"><?= $this->Paginator->sort('num_actual_apuntados') ?></th>
                <th scope="col"><?= $this->Paginator->sort('precio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pista_reserva') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_reserva') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_reserva') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clasesGrupales as $clasesGrupale): ?>
            <tr>
                <td><?= $this->Number->format($clasesGrupale->id_claseGrupal) ?></td>
                <td><?= h($clasesGrupale->fecha_inicio) ?></td>
                <td><?= h($clasesGrupale->hora) ?></td>
                <td><?= $clasesGrupale->has('usuario') ? $this->Html->link($clasesGrupale->usuario->dni, ['controller' => 'Usuarios', 'action' => 'view', $clasesGrupale->usuario->dni]) : '' ?></td>
                <td><?= $this->Number->format($clasesGrupale->num_max_apuntados) ?></td>
                <td><?= $this->Number->format($clasesGrupale->num_actual_apuntados) ?></td>
                <td><?= $this->Number->format($clasesGrupale->precio) ?></td>
                <td><?= $this->Number->format($clasesGrupale->pista_reserva) ?></td>
                <td><?= $this->Number->format($clasesGrupale->hora_reserva) ?></td>
                <td><?= h($clasesGrupale->fecha_reserva) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $clasesGrupale->id_claseGrupal]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clasesGrupale->id_claseGrupal]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clasesGrupale->id_claseGrupal], ['confirm' => __('Are you sure you want to delete # {0}?', $clasesGrupale->id_claseGrupal)]) ?>
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
