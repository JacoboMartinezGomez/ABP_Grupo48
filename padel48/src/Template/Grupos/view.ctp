<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Grupo $grupo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Grupo'), ['action' => 'edit', $grupo->id_grupo]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Grupo'), ['action' => 'delete', $grupo->id_grupo], ['confirm' => __('Are you sure you want to delete # {0}?', $grupo->id_grupo)]) ?> </li>
        <li><?= $this->Html->link(__('List Grupos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grupo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Campeonatos'), ['controller' => 'Campeonatos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Campeonato'), ['controller' => 'Campeonatos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="grupos view large-9 medium-8 columns content">
    <h3><?= h($grupo->id_grupo) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Campeonato') ?></th>
            <td><?= $grupo->has('campeonato') ? $this->Html->link($grupo->campeonato->id_campeonato, ['controller' => 'Campeonatos', 'action' => 'view', $grupo->campeonato->id_campeonato]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($grupo->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Grupo') ?></th>
            <td><?= $this->Number->format($grupo->id_grupo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nivel') ?></th>
            <td><?= $this->Number->format($grupo->nivel) ?></td>
        </tr>
    </table>
</div>
