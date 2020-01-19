<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
$this->extend('/Pages/navbar');
?>
<div class="showVista" id="verUsuario">
    <h2><?= h($usuario->dni) ?></h2>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Dni') ?></th>
            <td><?= h($usuario->dni) ?></td>
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
        <?php if (!empty($usuario->noticias)): ?>
        <h4><?= __('Noticias de este Usuario') ?></h4>
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
</div>

