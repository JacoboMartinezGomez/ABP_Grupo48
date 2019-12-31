<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Partido $partido
 */
$this->extend('/Pages/navbar');
?>
<div class="showVista" id="anhadirPartido">

    <?= $this->Form->create($partido) ?>
    <fieldset>
        <legend><?= __('Añadir partido') ?></legend>
        <?php
            echo $this->Form->control('hora', ['options' => $hora_inicio]);
            echo $this->Form->control('fecha', ['minYear' => date('Y'), 'maxYear' => date('Y')]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
