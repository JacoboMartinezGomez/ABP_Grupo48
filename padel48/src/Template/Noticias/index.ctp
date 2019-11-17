<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Noticia[]|\Cake\Collection\CollectionInterface $noticias
 */
$this->Html->css(['css'])?>
<head>
    <meta charset="utf-8">
    <title><?php echo 'PADEL48' ?></title>
    <meta author="" name="" content="">
    <link rel="stylesheet" type="text/css" href="./src/Template/Index/css/css.css" />
</head>
<body>
<header>
    <div id="head">
        <div id="logoWeb">
            <?php echo $this->Html->image('padel.png', ['alt' => 'palaPadel']);?>
            <div id="nombreWeb">
                <div class="letrasLogo">ádel</div>
                <div class="numeroLogo">48</div>
            </div>
        </div>
    </div>
</header>
<div class = "container">
    <nav class="menu"><ul class = "nav">
            <li class="heading"></li>
            <li><?= $this->Html->link(__('Campeonatos'), ['controller' => 'Campeonatos', 'action' => 'index']) ?>
                <ul>
                    <li><?= $this->Html->link(__('Nuevo campeonato'), ['controller' => 'Campeonatos', 'action' => 'add']) ?></li>
                </ul>
            </li>
            <li><?= $this->Html->link(__('Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Enfrentamientos'), ['controller' => 'Enfrentamientos', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Pistas'), ['controller' => 'Pistas', 'action' => 'index']) ?>
                <ul>
                    <li><?= $this->Html->link(__('Añadir pista'), ['controller' => 'Pistas', 'action' => 'add']) ?></li>
                </ul>
            </li>
            <li><?= $this->Html->link(__('Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?>
                <ul>
                    <li><?= $this->Html->link(__('Añadir usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
                </ul>
            </li>
            <li><?= $this->Html->link(__('Horarios'), ['controller' => 'Horarios', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?>
                <ul>
                    <li><?= $this->Html->link(__('Reservar pista'), ['controller' => 'Reservas','action' => 'add']) ?></li>
                </ul>
            </li>
            <li><?= $this->Html->link(__('Partidos'), ['controller' => 'Partidos', 'action' => 'index']) ?>
                <ul>
                    <li><?= $this->Html->link(__('Crear partido promocionado'), ['controller' => 'Partidos', 'action' => 'add']) ?></li>
                </ul>
            </li>
            <li><?= $this->Html->link(__('Noticias'), ['controller' => 'Noticias', 'action' => 'index']) ?>
                <ul>
                    <li><?= $this->Html->link(__('Añadir noticia'), ['controller' => 'Noticias','action' => 'add']) ?> </li>
                </ul>
            </li>
            <li><?= $this->Html->link(__('Cerrar sesión'), ['controller' => 'Usuarios', 'action' => 'logout']) ?></li>
        </ul>
    </nav>
    <div class="showVista" id="noticias">
    <h2><?= __('Noticias') ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_noticia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contenido') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($noticias as $noticia): ?>
            <tr>
                <td><?= $this->Number->format($noticia->id_noticia) ?></td>
                <td><?= $noticia->has('usuario') ? $this->Html->link($noticia->usuario->nombre, ['controller' => 'Usuarios', 'action' => 'view', $noticia->usuario->dni]) : '' ?></td>
                <td><?= h($noticia->titulo) ?></td>
                <td><?= h($noticia->contenido) ?></td>
                <td class="actions">
                    <?php echo $this->Html->image("ver.png", array(
                        "src" => "Ver mas",
                        "alt" => "verMas",
                        'url' => array('action' => 'view', $noticia->id_noticia),
                        "class" => "icono"
                    )); ?>
                    <?php echo $this->Html->image("editar.png", array(
                        "src" => "editar",
                        "alt" => "editar",
                        'url' => array('action' => 'edit', $noticia->id_noticia),
                        "class" => "icono"
                    )); ?>
                    <?php echo $this->Form->postLink(
                        $this->Html->image(
                            "borrar.png",
                            ["alt" => __('Delete')]
                        ),
                        ['action' => 'delete',   $noticia->id_noticia],
                        ['escape' => false, 'confirm' => __('¿Quieres eliminar la noticia {0}?',  $noticia->id_noticia)]
                    )?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
</div>
