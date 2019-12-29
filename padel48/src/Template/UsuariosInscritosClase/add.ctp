<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsuariosInscritosClase $usuariosInscritosClase
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Usuarios Inscritos Clase'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clasesgrupales'), ['controller' => 'Clasesgrupales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clasesgrupale'), ['controller' => 'Clasesgrupales', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usuariosInscritosClase form large-9 medium-8 columns content">
    <?= $this->Form->create($usuariosInscritosClase) ?>
    <fieldset>
        <legend><?= __('Add Usuarios Inscritos Clase') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
