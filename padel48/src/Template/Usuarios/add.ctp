<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
$this->extend('/Pages/navbar');
?>
<div class="showVista" id="anhadirUsuarios">
    <?= $this->Form->create($usuario) ?>
    <fieldset>
        <legend><?= __('Añadir Usuario') ?></legend>
        <?php
           echo $this->Form->control('dni',  ['type' => 'text', 'required' => true]);
           echo $this->Form->control('password');
           echo $this->Form->control('nombre');
           echo $this->Form->control('apellido');
           echo $this->Form->control('email');
           echo $this->Form->control('sexo',['options' => ['MASC' => 'Hombre', 'FEM' => 'Mujer']]);
           echo $this->Form->control('telefono');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
