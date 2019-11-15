<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reserva $reserva
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Reservas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="reservas form large-9 medium-8 columns content">
    <?= $this->Form->create($reserva) ?>
    <fieldset>
        <legend><?= __('Add Reserva') ?></legend>
        <?php
            echo $this->Form->control('fecha',['type'=>'text', 'class'=>'datepicker']);
            echo $this->Form->control('hora', ['type'=>'select', 'options' => $hora_inicio]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Reservar')) ?>
    <?= $this->Form->end()?>
</div>

 <script>
  $( function() {
    $( ".datepicker" ).datepicker({'dateFormat':'yy-mm-dd',minDate: 0, maxDate: "+7D" });
  } );
  </script>
