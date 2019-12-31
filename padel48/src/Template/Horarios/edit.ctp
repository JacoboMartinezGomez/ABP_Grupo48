<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Horario $horario
 */
$this->extend('/Pages/navbar');
?>
<div class="showVista" id="editarHorarios">
    <?= $this->Form->create($horario) ?>
    <fieldset>
        <legend><?= __('Editar horario') ?></legend>
        <?php
            echo $this->Form->control('pista_id', ['options' => $pistas]);
            echo $this->Form->control('hora_inicio');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
