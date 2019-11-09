<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Horario $horario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Horario'), ['action' => 'edit', $horario->id_horario]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Horario'), ['action' => 'delete', $horario->id_horario], ['confirm' => __('Are you sure you want to delete # {0}?', $horario->id_horario)]) ?> </li>
        <li><?= $this->Html->link(__('List Horarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Horario'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pistas'), ['controller' => 'Pistas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pista'), ['controller' => 'Pistas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="horarios view large-9 medium-8 columns content">
    <h3><?= h($horario->id_horario) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pista') ?></th>
            <td><?= $horario->has('pista') ? $this->Html->link($horario->pista->num_pista, ['controller' => 'Pistas', 'action' => 'view', $horario->pista->num_pista]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Horario') ?></th>
            <td><?= $this->Number->format($horario->id_horario) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Inicio') ?></th>
            <td><?= h($horario->hora_inicio) ?></td>
        </tr>
    </table>
</div>
