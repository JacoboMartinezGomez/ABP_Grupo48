<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FechasPropuesta $fechasPropuesta
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fechasPropuesta->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fechasPropuesta->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fechas Propuestas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Enfrentamientos'), ['controller' => 'Enfrentamientos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Enfrentamiento'), ['controller' => 'Enfrentamientos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fechasPropuestas form large-9 medium-8 columns content">
    <?= $this->Form->create($fechasPropuesta) ?>
    <fieldset>
        <legend><?= __('Edit Fechas Propuesta') ?></legend>
        <?php
            echo $this->Form->control('enfrentamiento_id');
            echo $this->Form->control('capitan1_id');
            echo $this->Form->control('capitan2_id', ['options' => $enfrentamientos, 'empty' => true]);
            echo $this->Form->control('hora');
            echo $this->Form->control('fecha');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>