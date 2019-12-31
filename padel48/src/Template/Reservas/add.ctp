<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reserva $reserva
 */
$this->extend('/Pages/navbar');
?>
<div class="showVista" id="anhadirReserva">
    <?= $this->Form->create($reserva) ?>
    <fieldset>
        <legend><?= __('Añadir reserva') ?></legend>
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

