<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Noticia $noticia
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $noticia->id_noticia],
                ['confirm' => __('Are you sure you want to delete # {0}?', $noticia->id_noticia)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Noticias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="noticias form large-9 medium-8 columns content">
    <?= $this->Form->create($noticia) ?>
    <fieldset>
        <legend><?= __('Edit Noticia') ?></legend>
        <?php
            echo $this->Form->control('usuario_id', ['options' => $usuarios]);
            echo $this->Form->control('titulo');
            echo $this->Form->control('contenido');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
