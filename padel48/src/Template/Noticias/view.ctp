<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Noticia $noticia
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Noticia'), ['action' => 'edit', $noticia->id_noticia]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Noticia'), ['action' => 'delete', $noticia->id_noticia], ['confirm' => __('Are you sure you want to delete # {0}?', $noticia->id_noticia)]) ?> </li>
        <li><?= $this->Html->link(__('List Noticias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Noticia'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="noticias view large-9 medium-8 columns content">
    <h3><?= h($noticia->id_noticia) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Usuario') ?></th>
            <td><?= $noticia->has('usuario') ? $this->Html->link($noticia->usuario->nombre, ['controller' => 'Usuarios', 'action' => 'view', $noticia->usuario->dni]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($noticia->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contenido') ?></th>
            <td><?= h($noticia->contenido) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Noticia') ?></th>
            <td><?= $this->Number->format($noticia->id_noticia) ?></td>
        </tr>
    </table>
</div>
