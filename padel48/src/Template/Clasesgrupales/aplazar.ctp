<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClasesGrupale $clasesGrupale
 */
$this->extend('/Pages/navbar');
?>
<div class="showVista" id="clasesGrupales">
    <?= $this->Form->create($clasesGrupale) ?>
    <fieldset>
        <legend><?= __('Aplazar clase grupal') ?></legend>
        <?php
            echo $this->Form->control('hora_reserva', ['type'=>'select', 'options' => $hora_reserva, 'default' => $hora_elegida]);
            echo $this->Form->control('fecha_reserva', ['minYear' => date('Y'), 'maxYear' => date('Y')]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
