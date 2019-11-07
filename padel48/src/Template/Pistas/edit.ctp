<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pista $pista
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pista->num_pista],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pista->num_pista)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pistas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Horarios'), ['controller' => 'Horarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Horario'), ['controller' => 'Horarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pistas form large-9 medium-8 columns content">
    <?= $this->Form->create($pista) ?>
    <fieldset>
        <legend><?= __('Edit Pista') ?></legend>
        <?php
            echo $this->Form->control('tipo');
            echo $this->Form->control('lugar');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
