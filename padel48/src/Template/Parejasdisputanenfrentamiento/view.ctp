<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parejasdisputanenfrentamiento $parejasdisputanenfrentamiento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Parejasdisputanenfrentamiento'), ['action' => 'edit', $parejasdisputanenfrentamiento->id_pareja1]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Parejasdisputanenfrentamiento'), ['action' => 'delete', $parejasdisputanenfrentamiento->id_pareja1], ['confirm' => __('Are you sure you want to delete # {0}?', $parejasdisputanenfrentamiento->id_pareja1)]) ?> </li>
        <li><?= $this->Html->link(__('List Parejasdisputanenfrentamiento'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parejasdisputanenfrentamiento'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Enfrentamientos'), ['controller' => 'Enfrentamientos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Enfrentamiento'), ['controller' => 'Enfrentamientos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="parejasdisputanenfrentamiento view large-9 medium-8 columns content">
    <h3><?= h($parejasdisputanenfrentamiento->id_pareja1) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Enfrentamiento') ?></th>
            <td><?= $parejasdisputanenfrentamiento->has('enfrentamiento') ? $this->Html->link($parejasdisputanenfrentamiento->enfrentamiento->id_enfrentamiento, ['controller' => 'Enfrentamientos', 'action' => 'view', $parejasdisputanenfrentamiento->enfrentamiento->id_enfrentamiento]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Resultado') ?></th>
            <td><?= h($parejasdisputanenfrentamiento->resultado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Pareja1') ?></th>
            <td><?= $this->Number->format($parejasdisputanenfrentamiento->id_pareja1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Pareja2') ?></th>
            <td><?= $this->Number->format($parejasdisputanenfrentamiento->id_pareja2) ?></td>
        </tr>
    </table>
</div>
