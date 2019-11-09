<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ParejasDisputanEnfrentamiento $parejasDisputanEnfrentamiento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Parejas Disputan Enfrentamiento'), ['action' => 'edit', $parejasDisputanEnfrentamiento->id_capitan]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Parejas Disputan Enfrentamiento'), ['action' => 'delete', $parejasDisputanEnfrentamiento->id_capitan], ['confirm' => __('Are you sure you want to delete # {0}?', $parejasDisputanEnfrentamiento->id_capitan)]) ?> </li>
        <li><?= $this->Html->link(__('List Parejas Disputan Enfrentamiento'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parejas Disputan Enfrentamiento'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Campeonatos'), ['controller' => 'Campeonatos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Campeonato'), ['controller' => 'Campeonatos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="parejasDisputanEnfrentamiento view large-9 medium-8 columns content">
    <h3><?= h($parejasDisputanEnfrentamiento->id_capitan) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id Capitan') ?></th>
            <td><?= h($parejasDisputanEnfrentamiento->id_capitan) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Pareja') ?></th>
            <td><?= h($parejasDisputanEnfrentamiento->id_pareja) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Campeonato') ?></th>
            <td><?= $parejasDisputanEnfrentamiento->has('campeonato') ? $this->Html->link($parejasDisputanEnfrentamiento->campeonato->id_campeonato, ['controller' => 'Campeonatos', 'action' => 'view', $parejasDisputanEnfrentamiento->campeonato->id_campeonato]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Enfrentamiento') ?></th>
            <td><?= $this->Number->format($parejasDisputanEnfrentamiento->id_enfrentamiento) ?></td>
        </tr>
    </table>
</div>
