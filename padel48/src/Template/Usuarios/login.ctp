<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="usuarios form">
<?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Introduce tu DNI y la contraseña') ?></legend>
        <?= $this->Form->control('dni') ?>
        <?= $this->Form->control('password') ?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
</div>
