<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pista $pista
 */
$this->extend('/Pages/navbar');
?>
<div class="showVista" id="anhadirPista">
    <?= $this->Form->create($pista) ?>
    <fieldset>
        <legend><?= __('Añadir pista') ?></legend>
        <?php
            echo $this->Form->select('tipo', ['PIEDRA' => 'PIEDRA', 'MOQUETA' => 'MOQUETA'], ['empty' => 'Elegir una']);
            echo $this->Form->select('lugar', ['EXTERIOR' => 'EXTERIOR', 'INTERIOR' => 'INTERIOR'], ['empty' => 'Elegir una']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
