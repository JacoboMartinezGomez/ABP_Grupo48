<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Grupo $grupo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Grupos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Campeonatos'), ['controller' => 'Campeonatos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Campeonato'), ['controller' => 'Campeonatos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="grupos form large-9 medium-8 columns content">
    <?= $this->Form->create($grupo) ?>
    <fieldset>
        <legend><?= __('Add Grupo') ?></legend>
        <?php
            echo $this->Form->control('campeonato_id', ['options' => $campeonatos]);
            echo $this->Form->control('tipo');
            echo $this->Form->control('nivel');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
