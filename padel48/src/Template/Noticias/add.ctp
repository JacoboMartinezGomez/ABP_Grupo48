<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Noticia $noticia
 */
$this->extend('/Pages/navbar');
?>
<div class="showVista" id="anhadirNoticia">
    <?= $this->Form->create($noticia) ?>
    <fieldset>
        <legend><?= __('Añadir noticia') ?></legend>
        <?php
            echo $this->Form->hidden('usuario_id', ['value' => $userId]);
            echo $this->Form->control('titulo');
            echo $this->Form->control('contenido');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
