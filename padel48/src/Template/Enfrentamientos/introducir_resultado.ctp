<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enfrentamiento $enfrentamiento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Enfrentamientos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Grupos'), ['controller' => 'Grupos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Grupo'), ['controller' => 'Grupos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fechas Propuestas'), ['controller' => 'FechasPropuestas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fechas Propuesta'), ['controller' => 'FechasPropuestas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Parejas Disputan Enfrentamiento'), ['controller' => 'Parejasdisputanenfrentamiento', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parejas Disputan Enfrentamiento'), ['controller' => 'Parejasdisputanenfrentamiento', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="enfrentamientos form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Introduce resultado') ?></legend>
        <?php
        echo $this->Form->control('resultado', ['options' => $parejas]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
