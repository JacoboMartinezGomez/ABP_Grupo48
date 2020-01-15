<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FechasPropuesta $fechasPropuesta
 */
$this->extend('/Pages/navbar');
?>
<div class="showVista" id="editarFechasPropuestas">
    <?= $this->Form->create($fechasPropuesta) ?>
    <fieldset>
        <legend><?= __('Editar fecha propuesta') ?></legend>
        <?php
            echo $this->Form->control('hora', ['options' => $hora_inicio, 'default' => date('H:i:s' ,strtotime($hora_elegida))]);
            echo $this->Form->control('fecha', ['minYear' => date('Y'), 'maxYear' => date('Y')]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>

