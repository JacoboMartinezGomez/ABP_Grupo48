<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pareja $pareja
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pareja->id_capitan],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pareja->id_capitan)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Parejas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Campeonatos'), ['controller' => 'Campeonatos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Campeonato'), ['controller' => 'Campeonatos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Grupos'), ['controller' => 'Grupos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Grupo'), ['controller' => 'Grupos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="parejas form large-9 medium-8 columns content">
    <?= $this->Form->create($pareja) ?>
    <fieldset>
        <legend><?= __('Edit Pareja') ?></legend>
        <?php
            echo $this->Form->control('id');
            echo $this->Form->control('grupo_id', ['options' => $grupos, 'empty' => true]);
            echo $this->Form->control('categoria_id', ['options' => $categorias]);
            echo $this->Form->control('puntuacion');
            echo $this->Form->control('clasificado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
