<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enfrentamiento $enfrentamiento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $enfrentamiento->id_enfrentamiento],
                ['confirm' => __('Are you sure you want to delete # {0}?', $enfrentamiento->id_enfrentamiento)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Enfrentamientos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="enfrentamientos form large-9 medium-8 columns content">
    <?= $this->Form->create($enfrentamiento) ?>
    <fieldset>
        <legend><?= __('Edit Enfrentamiento') ?></legend>
        <?php
            echo $this->Form->control('id_capitan1');
            echo $this->Form->control('id_capitan2');
            echo $this->Form->control('id_grupo');
            echo $this->Form->control('hora');
            echo $this->Form->control('fecha');
            echo $this->Form->control('fase');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
