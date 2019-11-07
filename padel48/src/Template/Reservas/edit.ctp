<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reserva $reserva
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $reserva->id_usuario],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reserva->id_usuario)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Reservas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="reservas form large-9 medium-8 columns content">
    <?= $this->Form->create($reserva) ?>
    <fieldset>
        <legend><?= __('Edit Reserva') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
