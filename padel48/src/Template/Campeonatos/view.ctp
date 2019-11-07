<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Campeonato $campeonato
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Campeonato'), ['action' => 'edit', $campeonato->id_campeonato]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Campeonato'), ['action' => 'delete', $campeonato->id_campeonato], ['confirm' => __('Are you sure you want to delete # {0}?', $campeonato->id_campeonato)]) ?> </li>
        <li><?= $this->Html->link(__('List Campeonatos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Campeonato'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Grupos'), ['controller' => 'Grupos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grupo'), ['controller' => 'Grupos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parejas'), ['controller' => 'Parejas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pareja'), ['controller' => 'Parejas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parejas Disputan Enfrentamiento'), ['controller' => 'ParejasDisputanEnfrentamiento', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parejas Disputan Enfrentamiento'), ['controller' => 'ParejasDisputanEnfrentamiento', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="campeonatos view large-9 medium-8 columns content">
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
