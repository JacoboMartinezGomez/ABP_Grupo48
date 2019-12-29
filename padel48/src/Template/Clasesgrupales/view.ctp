<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClasesGrupale $clasesGrupale
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Clases Grupale'), ['action' => 'edit', $clasesGrupale->id_claseGrupal]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Clases Grupale'), ['action' => 'delete', $clasesGrupale->id_claseGrupal], ['confirm' => __('Are you sure you want to delete # {0}?', $clasesGrupale->id_claseGrupal)]) ?> </li>
        <li><?= $this->Html->link(__('List Clases Grupales'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clases Grupale'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clasesGrupales view large-9 medium-8 columns content">
    <h2><?= h($clasesGrupale->id_claseGrupal) ?></h2>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Usuario') ?></th>
            <td><?= $clasesGrupale->has('usuario') ? $this->Html->link($clasesGrupale->usuario->dni, ['controller' => 'Usuarios', 'action' => 'view', $clasesGrupale->usuario->dni]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id ClaseGrupal') ?></th>
            <td><?= $this->Number->format($clasesGrupale->id_claseGrupal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Num Max Apuntados') ?></th>
            <td><?= $this->Number->format($clasesGrupale->num_max_apuntados) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Num Actual Apuntados') ?></th>
            <td><?= $this->Number->format($clasesGrupale->num_actual_apuntados) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Precio') ?></th>
            <td><?= $this->Number->format($clasesGrupale->precio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pista Reserva') ?></th>
            <td><?= $this->Number->format($clasesGrupale->pista_reserva) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora Reserva') ?></th>
            <td><?= $this->Number->format($clasesGrupale->hora_reserva) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Inicio') ?></th>
            <td><?= h($clasesGrupale->fecha_inicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora') ?></th>
            <td><?= h($clasesGrupale->hora) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Reserva') ?></th>
            <td><?= h($clasesGrupale->fecha_reserva) ?></td>
        </tr>
    </table>
</div>
