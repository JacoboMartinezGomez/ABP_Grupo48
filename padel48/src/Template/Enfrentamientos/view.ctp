<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enfrentamiento $enfrentamiento
 */
$this->extend('/Pages/navbar');
?>
<div class="enfrentamientos view large-9 medium-8 columns content">
    <h3><?= h($enfrentamiento->id_enfrentamiento) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Grupo') ?></th>
            <td><?= $enfrentamiento->has('grupo') ? $this->Html->link($enfrentamiento->grupo->id_grupo, ['controller' => 'Grupos', 'action' => 'view', $enfrentamiento->grupo->id_grupo]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Enfrentamiento') ?></th>
            <td><?= $this->Number->format($enfrentamiento->id_enfrentamiento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fase') ?></th>
            <td><?= $this->Number->format($enfrentamiento->fase) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hora') ?></th>
            <td><?= h($enfrentamiento->hora) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($enfrentamiento->fecha) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Fechas Propuestas') ?></h4>
        <?php if (!empty($enfrentamiento->fechas_propuestas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Enfrentamiento Id') ?></th>
                <th scope="col"><?= __('Creador') ?></th>
                <th scope="col"><?= __('Hora') ?></th>
                <th scope="col"><?= __('Fecha') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($enfrentamiento->fechas_propuestas as $fechasPropuestas): ?>
            <tr>
                <td><?= h($fechasPropuestas->id) ?></td>
                <td><?= h($fechasPropuestas->enfrentamiento_id) ?></td>
                <td><?= h($fechasPropuestas->creador) ?></td>
                <td><?= h($fechasPropuestas->hora) ?></td>
                <td><?= h($fechasPropuestas->fecha) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FechasPropuestas', 'action' => 'view', $fechasPropuestas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'FechasPropuestas', 'action' => 'edit', $fechasPropuestas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FechasPropuestas', 'action' => 'delete', $fechasPropuestas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fechasPropuestas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Parejas Disputan Enfrentamiento') ?></h4>
        <?php if (!empty($enfrentamiento->parejas_disputan_enfrentamiento)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id Capitan1') ?></th>
                <th scope="col"><?= __('Id Capitan2') ?></th>
                <th scope="col"><?= __('Enfrentamiento Id') ?></th>
                <th scope="col"><?= __('Resultado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($enfrentamiento->parejas_disputan_enfrentamiento as $parejasDisputanEnfrentamiento): ?>
            <tr>
                <td><?= h($parejasDisputanEnfrentamiento->id_pareja1) ?></td>
                <td><?= h($parejasDisputanEnfrentamiento->id_pareja2) ?></td>
                <td><?= h($parejasDisputanEnfrentamiento->enfrentamiento_id) ?></td>
                <td><?= h($parejasDisputanEnfrentamiento->resultado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Parejasdisputanenfrentamiento', 'action' => 'view', $parejasDisputanEnfrentamiento->id_pareja1]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Parejasdisputanenfrentamiento', 'action' => 'edit', $parejasDisputanEnfrentamiento->id_pareja1]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Parejasdisputanenfrentamiento', 'action' => 'delete', $parejasDisputanEnfrentamiento->id_pareja1], ['confirm' => __('Are you sure you want to delete # {0}?', $parejasDisputanEnfrentamiento->id_pareja1)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
