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
        <legend><?= __('Add Clases Grupale') ?></legend>
        <?php
            echo $this->Form->control('fecha_inicio', ['minYear' => date('Y'), 'maxYear' => date('Y')]);
            echo $this->Form->control('hora');
            echo $this->Form->control('usuario_id', ['options' => $profesores]);
            echo $this->Form->control('num_max_apuntados', ['min' => 2, 'max' => '20']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

