<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FechasPropuesta $fechasPropuesta
 */

use Cake\I18n\Time;
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
            <?php if ($user['rol'] != 'ADMIN'){
                $_SESSION['user'] = $user;
            ?>
                <li><?= $this->Html->link(__('Mi perfil'), ['controller' => 'Usuarios', 'action' => 'viewPerfil']) ?></li>
            <?php }; ?>
            <li><?= $this->Html->link(__('Campeonatos'), ['controller' => 'Campeonatos', 'action' => 'index']) ?>
                <?php if ($user['rol'] == 'ADMIN'){?>
                    <ul>
                        <li><?= $this->Html->link(__('Nuevo campeonato'), ['controller' => 'Campeonatos', 'action' => 'add']) ?></li>
                    </ul>
                <?php }; ?>
            </li>
            <li><?= $this->Html->link(__('Clases Grupales'), ['controller' => 'ClasesGrupales', 'action' => 'index']) ?>
                <ul>
                <?php if ($user['rol'] == 'ADMIN'){?>
                    <li><?= $this->Html->link(__('Nueva clase grupal'), ['controller' => 'ClasesGrupales', 'action' => 'add']) ?></li>
                <?php }; ?>
                    <li><?= $this->Html->link(__('Mis clases'), ['controller' => 'ClasesGrupales', 'action' => 'misClases']) ?></li>
                </ul>
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
    <?= $this->fetch('content') ?>
</div>
