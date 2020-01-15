<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Noticia $noticia
 */
$this->extend('/Pages/navbar');
?>
<div class="showVista" id="verNoticia">
    <h2><?= h($noticia->id_noticia) ?></h2>
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
