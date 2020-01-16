<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pista $pista
 */
$this->extend('/Pages/navbar');
?>
<div class="showVista" id="editarPista">
    <?= $this->Form->create($pista) ?>
    <fieldset>
        <legend><?= __('Editar pista') ?></legend>
        <?php
        echo $this->Form->select('tipo', ['PIEDRA' => 'PIEDRA', 'MOQUETA' => 'MOQUETA']);
        echo $this->Form->select('lugar', ['EXTERIOR' => 'EXTERIOR', 'INTERIOR' => 'INTERIOR']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
