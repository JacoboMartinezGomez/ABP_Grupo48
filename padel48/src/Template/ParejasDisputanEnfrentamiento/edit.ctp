<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ParejasDisputanEnfrentamiento $parejasDisputanEnfrentamiento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $parejasDisputanEnfrentamiento->id_capitan],
                ['confirm' => __('Are you sure you want to delete # {0}?', $parejasDisputanEnfrentamiento->id_capitan)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Parejas Disputan Enfrentamiento'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Campeonatos'), ['controller' => 'Campeonatos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Campeonato'), ['controller' => 'Campeonatos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="parejasDisputanEnfrentamiento form large-9 medium-8 columns content">
    <?= $this->Form->create($parejasDisputanEnfrentamiento) ?>
    <fieldset>
        <legend><?= __('Edit Parejas Disputan Enfrentamiento') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
