<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Partido $partido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Partido'), ['action' => 'edit', $partido->usuario_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Partido'), ['action' => 'delete', $partido->usuario_id], ['confirm' => __('Are you sure you want to delete # {0}?', $partido->usuario_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Partidos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Partido'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="partidos view large-9 medium-8 columns content">
    <h3><?= h($partido->usuario_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Usuario') ?></th>
            <td><?= $partido->has('usuario') ? $this->Html->link($partido->usuario->dni, ['controller' => 'Usuarios', 'action' => 'view', $partido->usuario->dni]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usuario Id2') ?></th>
            <td><?= h($partido->usuario_id2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usuario Id3') ?></th>
            <td><?= h($partido->usuario_id3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usuario Id4') ?></th>
            <td><?= h($partido->usuario_id4) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora') ?></th>
            <td><?= h($partido->hora) ?></td>
        </tr>
    </table>
</div>
