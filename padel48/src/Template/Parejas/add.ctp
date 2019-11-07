<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pareja $pareja
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Parejas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Campeonatos'), ['controller' => 'Campeonatos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Campeonato'), ['controller' => 'Campeonatos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="parejas form large-9 medium-8 columns content">
    <?= $this->Form->create($pareja) ?>
    <fieldset>
        <legend><?= __('Add Pareja') ?></legend>
        <?php
            echo $this->Form->control('tipo');
            echo $this->Form->control('nivel');
            echo $this->Form->control('puntuacion');
            echo $this->Form->control('clasificado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
