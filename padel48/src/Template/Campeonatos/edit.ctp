<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Campeonato $campeonato
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $campeonato->id_campeonato],
                ['confirm' => __('Are you sure you want to delete # {0}?', $campeonato->id_campeonato)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Campeonatos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Grupos'), ['controller' => 'Grupos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Grupo'), ['controller' => 'Grupos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Parejas'), ['controller' => 'Parejas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pareja'), ['controller' => 'Parejas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Parejas Disputan Enfrentamiento'), ['controller' => 'ParejasDisputanEnfrentamiento', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parejas Disputan Enfrentamiento'), ['controller' => 'ParejasDisputanEnfrentamiento', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="campeonatos form large-9 medium-8 columns content">
    <?= $this->Form->create($campeonato) ?>
    <fieldset>
        <legend><?= __('Edit Campeonato') ?></legend>
        <?php
            echo $this->Form->control('fecha_inicio');
            echo $this->Form->control('fecha_fin');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
