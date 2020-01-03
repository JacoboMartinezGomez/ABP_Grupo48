<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClasesGrupale $clasesGrupale
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $clasesGrupale->id_claseGrupal],
                ['confirm' => __('Are you sure you want to delete # {0}?', $clasesGrupale->id_claseGrupal)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Clases Grupales'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clasesGrupales form large-9 medium-8 columns content">
    <?= $this->Form->create($clasesGrupale) ?>
    <fieldset>
        <legend><?= __('Edit Clases Grupale') ?></legend>
        <?php
            echo $this->Form->control('hora_reserva');
            echo $this->Form->control('fecha_reserva');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
