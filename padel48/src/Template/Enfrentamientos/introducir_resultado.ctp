<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enfrentamiento $enfrentamiento
 */
$this->extend('/Pages/navbar');
?>
    <div class="showVista" id="introducirResultados">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Introduce resultado') ?></legend>
        <?php
        echo $this->Form->control('resultado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
    </div>
</div>
