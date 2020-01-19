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
        <legend><?= __('Añadir clase grupal') ?></legend>
        <?php
            echo $this->Form->control('fecha_inicio', ['minYear' => date('Y'), 'maxYear' => date('Y')]);
            echo $this->Form->control('hora', ['type'=>'select', 'options' => $hora]);
            echo $this->Form->control('usuario_id', ['options' => $profesores]);
            echo $this->Form->control('num_max_apuntados', ['min' => 2, 'max' => '20']);
            echo $this->Form->control('precio', ['label' => 'Precio de inscripcion', 'min' => 0]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Añadir')) ?>
    <?= $this->Form->end() ?>
</div>

