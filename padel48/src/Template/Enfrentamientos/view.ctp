<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enfrentamiento $enfrentamiento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Enfrentamiento'), ['action' => 'edit', $enfrentamiento->id_enfrentamiento]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Enfrentamiento'), ['action' => 'delete', $enfrentamiento->id_enfrentamiento], ['confirm' => __('Are you sure you want to delete # {0}?', $enfrentamiento->id_enfrentamiento)]) ?> </li>
        <li><?= $this->Html->link(__('List Enfrentamientos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Enfrentamiento'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="enfrentamientos view large-9 medium-8 columns content">
    <h3><?= h($enfrentamiento->id_enfrentamiento) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id Capitan1') ?></th>
            <td><?= h($enfrentamiento->id_capitan1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Capitan2') ?></th>
            <td><?= h($enfrentamiento->id_capitan2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Enfrentamiento') ?></th>
            <td><?= $this->Number->format($enfrentamiento->id_enfrentamiento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Grupo') ?></th>
            <td><?= $this->Number->format($enfrentamiento->id_grupo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fase') ?></th>
            <td><?= $this->Number->format($enfrentamiento->fase) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora') ?></th>
            <td><?= h($enfrentamiento->hora) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($enfrentamiento->fecha) ?></td>
        </tr>
    </table>
</div>
