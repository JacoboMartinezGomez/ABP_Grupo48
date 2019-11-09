<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pista $pista
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pistas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Horarios'), ['controller' => 'Horarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Horario'), ['controller' => 'Horarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pistas form large-9 medium-8 columns content">
    <?= $this->Form->create($pista) ?>
    <fieldset>
        <legend><?= __('Add Pista') ?></legend>
        <?php
            echo $this->Form->select('tipo', ['PIEDRA' => 'PIEDRA', 'MOQUETA' => 'MOQUETA'], ['empty' => 'Elegir una']);
            echo $this->Form->select('lugar', ['EXTERIOR' => 'EXTERIOR', 'INTERIOR' => 'INTERIOR'], ['empty' => 'Elegir una']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
