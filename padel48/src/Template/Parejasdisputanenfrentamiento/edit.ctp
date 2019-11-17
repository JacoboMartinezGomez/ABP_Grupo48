<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parejasdisputanenfrentamiento $parejasdisputanenfrentamiento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $parejasdisputanenfrentamiento->id_pareja1],
                ['confirm' => __('Are you sure you want to delete # {0}?', $parejasdisputanenfrentamiento->id_pareja1)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Parejasdisputanenfrentamiento'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Enfrentamientos'), ['controller' => 'Enfrentamientos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Enfrentamiento'), ['controller' => 'Enfrentamientos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="parejasdisputanenfrentamiento form large-9 medium-8 columns content">
    <?= $this->Form->create($parejasdisputanenfrentamiento) ?>
    <fieldset>
        <legend><?= __('Edit Parejasdisputanenfrentamiento') ?></legend>
        <?php
            echo $this->Form->control('resultado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
