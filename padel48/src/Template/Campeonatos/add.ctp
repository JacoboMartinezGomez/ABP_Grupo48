<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Campeonato $campeonato
 */
$this->extend('/Pages/navbar');
?>
    <div class="showVista" id="anhadirCampeonato">
    <?= $this->Form->create($campeonato) ?>
    <fieldset>
        <legend><?= __('Añadir campeonato') ?></legend>
        <?php
            echo $this->Form->control('fecha_inicio');
            echo $this->Form->control('fecha_fin');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
