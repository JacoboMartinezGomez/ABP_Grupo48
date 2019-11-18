<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Noticia $noticia
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
            <?php if ($user['rol'] == 'ADMIN'){?>
                <ul>
                    <li><?= $this->Html->link(__('Nuevo campeonato'), ['controller' => 'Campeonatos', 'action' => 'add']) ?></li>
                </ul>
            <?php }; ?>
            </li>
            <li><?= $this->Html->link(__('Enfrentamientos'), ['controller' => 'Enfrentamientos', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Pistas'), ['controller' => 'Pistas', 'action' => 'index']) ?>
            <?php if ($user['rol'] == 'ADMIN'){?>
                <ul>
                    <li><?= $this->Html->link(__('Añadir pista'), ['controller' => 'Pistas', 'action' => 'add']) ?></li>
                </ul>
            <?php }; ?>
            </li>
            <?php if ($user['rol'] == 'ADMIN'){?>
            <li><?= $this->Html->link(__('Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?>
                <ul>
                    <li><?= $this->Html->link(__('Añadir usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
                </ul>
            <?php }; ?>
            </li>
            <li><?= $this->Html->link(__('Horarios'), ['controller' => 'Horarios', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?>
                <ul>
                    <li><?= $this->Html->link(__('Reservar pista'), ['controller' => 'Reservas','action' => 'add']) ?></li>
                </ul>
            </li>
            <li><?= $this->Html->link(__('Partidos'), ['controller' => 'Partidos', 'action' => 'index']) ?>
            <?php if ($user['rol'] == 'ADMIN'){?>
                <ul>
                    <li><?= $this->Html->link(__('Crear partido promocionado'), ['controller' => 'Partidos', 'action' => 'add']) ?></li>
                </ul>
            <?php }; ?>
            </li>
            <li><?= $this->Html->link(__('Noticias'), ['controller' => 'Noticias', 'action' => 'index']) ?>
            <?php if ($user['rol'] == 'ADMIN'){?>
                <ul>
                    <li><?= $this->Html->link(__('Añadir noticia'), ['controller' => 'Noticias','action' => 'add']) ?> </li>
                </ul>
            <?php }; ?>
            </li>
            <li><?= $this->Html->link(__('Cerrar sesión'), ['controller' => 'Usuarios', 'action' => 'logout']) ?></li>
        </ul>
    </nav>
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
</div>
