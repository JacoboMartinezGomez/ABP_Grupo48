<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Campeonato $campeonato
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
    <div class="showVista" id="detallesCampeonato">
    <h3><?= h($campeonato->id_campeonato) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id Campeonato') ?></th>
            <td><?= $this->Number->format($campeonato->id_campeonato) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Inicio') ?></th>
            <td><?= h($campeonato->fecha_inicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Fin') ?></th>
            <td><?= h($campeonato->fecha_fin) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Categorias') ?></h4>
        <?php if (!empty($campeonato->categorias)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Campeonato Id') ?></th>
                <th scope="col"><?= __('Tipo') ?></th>
                <th scope="col"><?= __('Nivel') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($campeonato->categorias as $categorias): ?>
            <tr>
                <td><?= h($categorias->campeonato_id) ?></td>
                <td><?= h($categorias->tipo) ?></td>
                <td><?= h($categorias->nivel) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Categorias', 'action' => 'view', $categorias->campeonato_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Categorias', 'action' => 'edit', $categorias->campeonato_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Categorias', 'action' => 'delete', $categorias->campeonato_id], ['confirm' => __('Are you sure you want to delete # {0}?', $categorias->campeonato_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Grupos') ?></h4>
        <?php if (!empty($campeonato->grupos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id Grupo') ?></th>
                <th scope="col"><?= __('Campeonato Id') ?></th>
                <th scope="col"><?= __('Tipo') ?></th>
                <th scope="col"><?= __('Nivel') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($campeonato->grupos as $grupos): ?>
            <tr>
                <td><?= h($grupos->id_grupo) ?></td>
                <td><?= h($grupos->campeonato_id) ?></td>
                <td><?= h($grupos->tipo) ?></td>
                <td><?= h($grupos->nivel) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Grupos', 'action' => 'view', $grupos->id_grupo]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Grupos', 'action' => 'edit', $grupos->id_grupo]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Grupos', 'action' => 'delete', $grupos->id_grupo], ['confirm' => __('Are you sure you want to delete # {0}?', $grupos->id_grupo)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Parejas') ?></h4>
        <?php if (!empty($campeonato->parejas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id Capitan') ?></th>
                <th scope="col"><?= __('Id Pareja') ?></th>
                <th scope="col"><?= __('Campeonato Id') ?></th>
                <th scope="col"><?= __('Tipo') ?></th>
                <th scope="col"><?= __('Nivel') ?></th>
                <th scope="col"><?= __('Puntuacion') ?></th>
                <th scope="col"><?= __('Clasificado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($campeonato->parejas as $parejas): ?>
            <tr>
                <td><?= h($parejas->id_capitan) ?></td>
                <td><?= h($parejas->id_pareja) ?></td>
                <td><?= h($parejas->campeonato_id) ?></td>
                <td><?= h($parejas->tipo) ?></td>
                <td><?= h($parejas->nivel) ?></td>
                <td><?= h($parejas->puntuacion) ?></td>
                <td><?= h($parejas->clasificado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Parejas', 'action' => 'view', $parejas->id_capitan]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Parejas', 'action' => 'edit', $parejas->id_capitan]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Parejas', 'action' => 'delete', $parejas->id_capitan], ['confirm' => __('Are you sure you want to delete # {0}?', $parejas->id_capitan)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Parejas Disputan Enfrentamiento') ?></h4>
        <?php if (!empty($campeonato->parejas_disputan_enfrentamiento)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id Capitan') ?></th>
                <th scope="col"><?= __('Id Pareja') ?></th>
                <th scope="col"><?= __('Campeonato Id') ?></th>
                <th scope="col"><?= __('Id Enfrentamiento') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($campeonato->parejas_disputan_enfrentamiento as $parejasDisputanEnfrentamiento): ?>
            <tr>
                <td><?= h($parejasDisputanEnfrentamiento->id_capitan) ?></td>
                <td><?= h($parejasDisputanEnfrentamiento->id_pareja) ?></td>
                <td><?= h($parejasDisputanEnfrentamiento->campeonato_id) ?></td>
                <td><?= h($parejasDisputanEnfrentamiento->id_enfrentamiento) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ParejasDisputanEnfrentamiento', 'action' => 'view', $parejasDisputanEnfrentamiento->id_capitan]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ParejasDisputanEnfrentamiento', 'action' => 'edit', $parejasDisputanEnfrentamiento->id_capitan]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ParejasDisputanEnfrentamiento', 'action' => 'delete', $parejasDisputanEnfrentamiento->id_capitan], ['confirm' => __('Are you sure you want to delete # {0}?', $parejasDisputanEnfrentamiento->id_capitan)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
</div>
