<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enfrentamiento[]|\Cake\Collection\CollectionInterface $enfrentamientos
 * * @var \App\Model\Entity\FechasPropuesta[]|\Cake\Collection\CollectionInterface $fechaPropuesta
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
    <div class="showVista" id="enfrentamientos">
    <h2><?= __('Enfrentamientos') ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" width = "140px"><?= $this->Paginator->sort('id_enfrentamiento') ?> </th>
                <th scope="col"><?= $this->Paginator->sort('id_pareja1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_pareja2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_grupo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fase') ?></th>
                <th scope="col"><?= $this->Paginator->sort('resultado') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($enfrentamientos as $enfrentamiento): ?>
            <tr>
                <td><?= $this->Number->format($enfrentamiento->enfrentamiento['id_enfrentamiento']) ?></td>
                <td><?= h($enfrentamiento->enfrentamiento['id_pareja1']) ?></td>
                <td><?= h($enfrentamiento->enfrentamiento['id_pareja2']) ?></td>
                <td><?= $this->Number->format($enfrentamiento->enfrentamiento['id_grupo']) ?></td>
                <td><?= h(h(date('H:i', strtotime($enfrentamiento->enfrentamiento['hora'])))) ?></td>
                <td><?= h($enfrentamiento->enfrentamiento['fecha']) ?></td>
                <td><?= $this->Number->format($enfrentamiento->enfrentamiento['fase']) ?></td>
                <td><?= $this->Number->format($enfrentamiento->d['resultado']) ?></td>
                <td class="actions">
                    <?php echo $this->Html->image("calendario.png", array(
                        "src" => "Proponer fecha",
                        "alt" => "proponerFecha",
                        'url' => array('controller' => 'FechasPropuestas', 'action' => 'index', $enfrentamiento->id_enfrentamiento),
                        "class" => "icono"
                    )); ?>
                    <?php echo $this->Html->image("marcador.png", array(
                        "src" => "Añadir Resultado",
                        "alt" => "anhadirResultado",
                        'url' => array('controller' => 'Enfrentamientos', 'action' => 'introducirResultado', $enfrentamiento->id_enfrentamiento),
                        "class" => "icono"
                    )); ?>
                    <?php echo $this->Form->postLink(
                            $this->Html->image(
                                "borrar.png", 
                                ["alt" => __('Delete')]
                            ), 
                            ['action' => 'delete',   $enfrentamiento->id_enfrentamiento],
                            ['escape' => false, 'confirm' => __('¿Quieres eliminar el enfrentamiento {0}?',  $enfrentamiento->id_enfrentamiento)]
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
