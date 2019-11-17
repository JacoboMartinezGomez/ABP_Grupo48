<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parejasdisputanenfrentamiento[]|\Cake\Collection\CollectionInterface $parejasdisputanenfrentamiento
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
        </ul>
    </nav>
    <div class="showVista" id="parejasDispEnfrentamientos">
    <h2><?= __('Parejasdisputanenfrentamiento') ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_pareja1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_pareja2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enfrentamiento_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('resultado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parejasdisputanenfrentamiento as $parejasdisputanenfrentamiento): ?>
            <tr>
                <td><?= $this->Number->format($parejasdisputanenfrentamiento->id_pareja1) ?></td>
                <td><?= $this->Number->format($parejasdisputanenfrentamiento->id_pareja2) ?></td>
                <td><?= $parejasdisputanenfrentamiento->has('enfrentamiento') ? $this->Html->link($parejasdisputanenfrentamiento->enfrentamiento->id_enfrentamiento, ['controller' => 'Enfrentamientos', 'action' => 'view', $parejasdisputanenfrentamiento->enfrentamiento->id_enfrentamiento]) : '' ?></td>
                <td><?= h($parejasdisputanenfrentamiento->resultado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $parejasdisputanenfrentamiento->id_pareja1]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $parejasdisputanenfrentamiento->id_pareja1]) ?>
                    <?= $this->Html->link(__('Introducir resultado'), ['controller' => 'enfrentamientos', 'action' => 'introducirResultado', $parejasdisputanenfrentamiento->enfrentamiento_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $parejasdisputanenfrentamiento->id_pareja1], ['confirm' => __('Are you sure you want to delete # {0}?', $parejasdisputanenfrentamiento->id_pareja1)]) ?>
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
