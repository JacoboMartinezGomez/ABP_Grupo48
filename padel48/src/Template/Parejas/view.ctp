<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pareja $pareja
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pareja'), ['action' => 'edit', $pareja->id_capitan]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pareja'), ['action' => 'delete', $pareja->id_capitan], ['confirm' => __('Are you sure you want to delete # {0}?', $pareja->id_capitan)]) ?> </li>
        <li><?= $this->Html->link(__('List Parejas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pareja'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Campeonatos'), ['controller' => 'Campeonatos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Campeonato'), ['controller' => 'Campeonatos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="parejas view large-9 medium-8 columns content">
    <h3><?= h($pareja->id_capitan) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id Capitan') ?></th>
            <td><?= h($pareja->id_capitan) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Pareja') ?></th>
            <td><?= h($pareja->id_pareja) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Campeonato') ?></th>
            <td><?= $pareja->has('campeonato') ? $this->Html->link($pareja->campeonato->id_campeonato, ['controller' => 'Campeonatos', 'action' => 'view', $pareja->campeonato->id_campeonato]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($pareja->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nivel') ?></th>
            <td><?= $this->Number->format($pareja->nivel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Puntuacion') ?></th>
            <td><?= $this->Number->format($pareja->puntuacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clasificado') ?></th>
            <td><?= $pareja->clasificado ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
