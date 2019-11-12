<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Usuario'), ['action' => 'edit', $usuario->dni]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Usuario'), ['action' => 'delete', $usuario->dni], ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->dni)]) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Noticias'), ['controller' => 'Noticias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Noticia'), ['controller' => 'Noticias', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Partidos'), ['controller' => 'Partidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Partido'), ['controller' => 'Partidos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usuarios view large-9 medium-8 columns content">
    <h3><?= h($usuario->dni) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Dni') ?></th>
            <td><?= h($usuario->dni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Passwd') ?></th>
            <td><?= h($usuario->passwd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($usuario->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido') ?></th>
            <td><?= h($usuario->apellido) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($usuario->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sexo') ?></th>
            <td><?= h($usuario->sexo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rol') ?></th>
            <td><?= h($usuario->rol) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono') ?></th>
            <td><?= $this->Number->format($usuario->telefono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numero Pistas') ?></th>
            <td><?= $this->Number->format($usuario->numero_pistas) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Noticias') ?></h4>
        <?php if (!empty($usuario->noticias)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id Noticia') ?></th>
                <th scope="col"><?= __('Usuario Id') ?></th>
                <th scope="col"><?= __('Titulo') ?></th>
                <th scope="col"><?= __('Contenido') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($usuario->noticias as $noticias): ?>
            <tr>
                <td><?= h($noticias->id_noticia) ?></td>
                <td><?= h($noticias->usuario_id) ?></td>
                <td><?= h($noticias->titulo) ?></td>
                <td><?= h($noticias->contenido) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Noticias', 'action' => 'view', $noticias->id_noticia]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Noticias', 'action' => 'edit', $noticias->id_noticia]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Noticias', 'action' => 'delete', $noticias->id_noticia], ['confirm' => __('Are you sure you want to delete # {0}?', $noticias->id_noticia)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Partidos') ?></h4>
        <?php if (!empty($usuario->partidos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Usuario Id') ?></th>
                <th scope="col"><?= __('Usuario Id2') ?></th>
                <th scope="col"><?= __('Usuario Id3') ?></th>
                <th scope="col"><?= __('Usuario Id4') ?></th>
                <th scope="col"><?= __('Hora') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($usuario->partidos as $partidos): ?>
            <tr>
                <td><?= h($partidos->usuario_id) ?></td>
                <td><?= h($partidos->usuario_id2) ?></td>
                <td><?= h($partidos->usuario_id3) ?></td>
                <td><?= h($partidos->usuario_id4) ?></td>
                <td><?= h($partidos->hora) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Partidos', 'action' => 'view', $partidos->usuario_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Partidos', 'action' => 'edit', $partidos->usuario_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Partidos', 'action' => 'delete', $partidos->usuario_id], ['confirm' => __('Are you sure you want to delete # {0}?', $partidos->usuario_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
