<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Horario $horario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $horario->id_horario],
                ['confirm' => __('Are you sure you want to delete # {0}?', $horario->id_horario)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Horarios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pistas'), ['controller' => 'Pistas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pista'), ['controller' => 'Pistas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="horarios form large-9 medium-8 columns content">
    <?= $this->Form->create($horario) ?>
    <fieldset>
        <legend><?= __('Edit Horario') ?></legend>
        <?php
            echo $this->Form->control('pista_id', ['options' => $pistas]);
            echo $this->Form->control('hora_inicio');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
