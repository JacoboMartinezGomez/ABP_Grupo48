<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsuariosInscritosClase[]|\Cake\Collection\CollectionInterface $usuariosInscritosClase
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Usuarios Inscritos Clase'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clasesgrupales'), ['controller' => 'Clasesgrupales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clasesgrupale'), ['controller' => 'Clasesgrupales', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usuariosInscritosClase index large-9 medium-8 columns content">
    <h2><?= __('Usuarios Inscritos Clase') ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('claseGrupal_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuariosInscritosClase as $usuariosInscritosClase): ?>
            <tr>
                <td><?= $usuariosInscritosClase->has('clasesgrupale') ? $this->Html->link($usuariosInscritosClase->clasesgrupale->id_claseGrupal, ['controller' => 'Clasesgrupales', 'action' => 'view', $usuariosInscritosClase->clasesgrupale->id_claseGrupal]) : '' ?></td>
                <td><?= $usuariosInscritosClase->has('usuario') ? $this->Html->link($usuariosInscritosClase->usuario->dni, ['controller' => 'Usuarios', 'action' => 'view', $usuariosInscritosClase->usuario->dni]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $usuariosInscritosClase->claseGrupal_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usuariosInscritosClase->claseGrupal_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usuariosInscritosClase->claseGrupal_id], ['confirm' => __('Are you sure you want to delete # {0}?', $usuariosInscritosClase->claseGrupal_id)]) ?>
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
