<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FechasPropuesta[]|\Cake\Collection\CollectionInterface $fechasPropuestas
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
    <div class="showVista" id="fechasPropuestas">
    <h2><?= __('Fechas Propuestas por ti') ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enfrentamiento_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creador') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fechasPropuestas as $fechasPropuesta):
                if($fechasPropuesta->creador == $dniUser){
                ?>
            <tr>
                <td><?= $this->Number->format($fechasPropuesta->id) ?></td>
                <td><?= $this->Number->format($fechasPropuesta->enfrentamiento_id) ?></td>
                <td><?= h($fechasPropuesta->creador) ?></td>
                <td><?= h(date('H:i', strtotime($fechasPropuesta->hora))) ?></td>
                <td><?= h($fechasPropuesta->fecha) ?></td>
                <td class="actions">
                    <?php echo $this->Html->image("editar.png", array(
                        "src" => "Editar",
                        "alt" => "editar",
                        'url' => array('action' => 'edit',  $fechasPropuesta->id),
                        "class" => "icono"
                    )); ?>

                    <?php echo $this->Form->postLink(
                        $this->Html->image(
                            "borrar.png",
                            ["alt" => __('Delete')]
                        ),
                        ['action' => 'delete',   $fechasPropuesta->id],
                        ['escape' => false, 'confirm' => __('¿Quieres eliminar la fecha {0}?',  $fechasPropuesta->id)]
                    )?>
                </td>
            </tr>
            <?php }
                endforeach; ?>
        </tbody>
    </table>
    <div >
    <?php echo $this->Html->image("round-add-button.png", array(
                        "src" => "Proponer Hora",
                        "alt" => "Proponer Hora",
                        'url' => array('controller' => 'FechasPropuestas', 'action' => 'add', $enfrentamiento_id),
                    )); ?>
    </div>

    <h2><?= __('Fechas Propuestas por tu rival') ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('enfrentamiento_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('creador') ?></th>
            <th scope="col"><?= $this->Paginator->sort('hora') ?></th>
            <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
            <th scope="col" class="actions"><?= __('Acciones') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($fechasPropuestas as $fechasPropuesta):
            if($fechasPropuesta->creador != $dniUser){?>
            <tr>
                <td><?= $this->Number->format($fechasPropuesta->id) ?></td>
                <td><?= $this->Number->format($fechasPropuesta->enfrentamiento_id) ?></td>
                <td><?= h($fechasPropuesta->creador) ?></td>
                <td><?= h(date('H:i', strtotime($fechasPropuesta->hora))) ?></td>
                <td><?= h($fechasPropuesta->fecha) ?></td>
                <td class="actions">

                    <?php echo $this->Html->image("aceptar.png", array(
                        "src" => "Aceptar",
                        "alt" => "aceptar",
                        'url' => array('action' => 'acept', $fechasPropuesta->id),
                        "class" => "icono"
                    )); ?>

                </td>
            </tr>
        <?php
            } endforeach; ?>
        </tbody>
    </table>
</div>
</div>
