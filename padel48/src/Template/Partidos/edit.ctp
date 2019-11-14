<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Partido $partido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $partido->usuario_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $partido->usuario_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Partidos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="partidos form large-9 medium-8 columns content">
    <?= $this->Form->create($partido) ?>
    <fieldset>
        <legend><?= __('Edit Partido') ?></legend>
        <?php
            echo $this->Form->control('hora');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
