<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Partido[]|\Cake\Collection\CollectionInterface $partidos
 */
?>

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
    <div class="showVista" id="partidos">
    <h2><?= __('Partidos') ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('usuario_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_id2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_id3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_id4') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($partidos as $partido): ?>
            <tr>
                <td><?= h($partido->usuario_id) ?></td>
                <td><?= h($partido->usuario_id2) ?></td>
                <td><?= h($partido->usuario_id3) ?></td>
                <td><?= h($partido->usuario_id4) ?></td>
                <td><?= h($partido->hora->format('H:i')) ?></td>
                <td><?= h($partido->fecha) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $partido->usuario_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $partido->usuario_id], ['confirm' => __('Are you sure you want to delete # {0}?', $partido->usuario_id)]) ?>
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
