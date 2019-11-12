<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reserva $reserva
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reserva'), ['action' => 'edit', $reserva->id_usuario]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reserva'), ['action' => 'delete', $reserva->id_usuario], ['confirm' => __('Are you sure you want to delete # {0}?', $reserva->id_usuario)]) ?> </li>
        <li><?= $this->Html->link(__('List Reservas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reserva'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reservas view large-9 medium-8 columns content">
    <h3><?= h($reserva->id_usuario) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id Usuario') ?></th>
            <td><?= h($reserva->id_usuario) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Pista') ?></th>
            <td><?= $this->Number->format($reserva->id_pista) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora') ?></th>
            <td><?= $this->Number->format($reserva->hora) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($reserva->fecha) ?></td>
        </tr>
    </table>
</div>
