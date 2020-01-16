<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsuariosInscritosClase $usuariosInscritosClase
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Usuarios Inscritos Clase'), ['action' => 'edit', $usuariosInscritosClase->claseGrupal_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Usuarios Inscritos Clase'), ['action' => 'delete', $usuariosInscritosClase->claseGrupal_id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuariosInscritosClase->claseGrupal_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios Inscritos Clase'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuarios Inscritos Clase'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clasesgrupales'), ['controller' => 'Clasesgrupales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clasesgrupale'), ['controller' => 'Clasesgrupales', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usuariosInscritosClase view large-9 medium-8 columns content">
    <h2><?= h($usuariosInscritosClase->claseGrupal_id) ?></h2>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Clasesgrupale') ?></th>
            <td><?= $usuariosInscritosClase->has('clasesgrupale') ? $this->Html->link($usuariosInscritosClase->clasesgrupale->id_claseGrupal, ['controller' => 'Clasesgrupales', 'action' => 'view', $usuariosInscritosClase->clasesgrupale->id_claseGrupal]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usuario') ?></th>
            <td><?= $usuariosInscritosClase->has('usuario') ? $this->Html->link($usuariosInscritosClase->usuario->dni, ['controller' => 'Usuarios', 'action' => 'view', $usuariosInscritosClase->usuario->dni]) : '' ?></td>
        </tr>
    </table>
</div>
