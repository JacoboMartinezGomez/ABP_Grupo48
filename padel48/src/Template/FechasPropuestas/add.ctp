<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FechasPropuesta $fechasPropuesta
 */

use Cake\I18n\Time;
$this->extend('/Pages/navbar');
?>
    <div class="showVista" id="anhadirFechasPropuestas">
    <?= $this->Form->create($fechasPropuesta) ?>
    <fieldset>
        <legend><?= __('Proponer nueva fecha') ?></legend>
        <?php
            echo $this->Form->control('hora', ['options' => $hora_inicio]);
            echo $this->Form->control('fecha', ['minYear' => date('Y'), 'maxYear' => date('Y')]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>

