<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pista $pista
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pista'), ['action' => 'edit', $pista->num_pista]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pista'), ['action' => 'delete', $pista->num_pista], ['confirm' => __('Are you sure you want to delete # {0}?', $pista->num_pista)]) ?> </li>
        <li><?= $this->Html->link(__('List Pistas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pista'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Horarios'), ['controller' => 'Horarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Horario'), ['controller' => 'Horarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pistas view large-9 medium-8 columns content">
    <h3><?= h($pista->num_pista) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($pista->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lugar') ?></th>
            <td><?= h($pista->lugar) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Num Pista') ?></th>
            <td><?= $this->Number->format($pista->num_pista) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Horarios') ?></h4>
        <?php if (!empty($pista->horarios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id Horario') ?></th>
                <th scope="col"><?= __('Pista Id') ?></th>
                <th scope="col"><?= __('Hora Inicio') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pista->horarios as $horarios): ?>
            <tr>
                <td><?= h($horarios->id_horario) ?></td>
                <td><?= h($horarios->pista_id) ?></td>
                <td><?= h($horarios->hora_inicio) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Horarios', 'action' => 'view', $horarios->id_horario]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Horarios', 'action' => 'edit', $horarios->id_horario]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Horarios', 'action' => 'delete', $horarios->id_horario], ['confirm' => __('Are you sure you want to delete # {0}?', $horarios->id_horario)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
