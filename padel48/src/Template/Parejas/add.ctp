<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pareja $pareja
 */
$this->extend('/Pages/navbar');
?>
<div class="showVista" id="anhadirPareja">
    <?= $this->Form->create($pareja) ?>
    <fieldset>
        <legend><?= __('Añadir pareja') ?></legend>
        <?php
            echo $this->Form->control('id_pareja', ['type' => 'text']);
            echo $this->Form->control('nivel', ['options' => $niveles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
