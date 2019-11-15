<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
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
                    <li><?= $this->Html->link(__('Crear partido promocionado'), ['controller' => 'PromocionarPartido', 'action' => 'add']) ?></li>
                </ul>
            </li>
            <li><?= $this->Html->link(__('Noticias'), ['controller' => 'Noticias', 'action' => 'index']) ?>
                <ul>
                    <li><?= $this->Html->link(__('Añadir noticia'), ['controller' => 'Noticias','action' => 'add']) ?> </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div class="showVista" id="verUsuario">
    <h2><?= h($usuario->dni) ?></h2>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Dni') ?></th>
            <td><?= h($usuario->dni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($usuario->password) ?></td>
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
</div>