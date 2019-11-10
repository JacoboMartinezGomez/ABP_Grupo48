<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FechasPropuesta $fechasPropuesta
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fechas Propuesta'), ['action' => 'edit', $fechasPropuesta->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fechas Propuesta'), ['action' => 'delete', $fechasPropuesta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fechasPropuesta->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fechas Propuestas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fechas Propuesta'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Enfrentamientos'), ['controller' => 'Enfrentamientos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Enfrentamiento'), ['controller' => 'Enfrentamientos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fechasPropuestas view large-9 medium-8 columns content">
    <h3><?= h($fechasPropuesta->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Capitan1 Id') ?></th>
            <td><?= h($fechasPropuesta->capitan1_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Enfrentamiento') ?></th>
            <td><?= $fechasPropuesta->has('enfrentamiento') ? $this->Html->link($fechasPropuesta->enfrentamiento->id_enfrentamiento, ['controller' => 'Enfrentamientos', 'action' => 'view', $fechasPropuesta->enfrentamiento->id_enfrentamiento]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fechasPropuesta->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Enfrentamiento Id') ?></th>
            <td><?= $this->Number->format($fechasPropuesta->enfrentamiento_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora') ?></th>
            <td><?= h($fechasPropuesta->hora) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($fechasPropuesta->fecha) ?></td>
        </tr>
    </table>
</div>
