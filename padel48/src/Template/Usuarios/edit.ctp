<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
$this->extend('/Pages/navbar');
?>
<div class="showVista" id="editarUsuario">
    <?= $this->Form->create($usuario) ?>
    <fieldset>
        <legend><?= __('Editar usuario') ?></legend>
        <?php
            echo $this->Form->control('password');
            echo $this->Form->control('nombre');
            echo $this->Form->control('apellido');
            echo $this->Form->control('email');
            echo $this->Form->control('sexo');
            echo $this->Form->control('telefono');
            echo $this->Form->control('rol');
            echo $this->Form->control('numero_pistas');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
