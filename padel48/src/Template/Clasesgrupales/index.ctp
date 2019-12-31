<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClasesGrupale[]|\Cake\Collection\CollectionInterface $clasesGrupales
 */

$this->extend('/Pages/navbar');
?>
<div class="showVista"  id="clasesGrupales">
    <h2><?= __('Clases Grupales') ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('fecha_inicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_id', 'Profesor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('num_max_apuntados', 'Nº Max apuntados') ?></th>
                <th scope="col"><?= $this->Paginator->sort('num_actual_apuntados', 'Nº Apuntados actuales') ?></th>
                <th scope="col"><?= $this->Paginator->sort('precio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pista_reserva') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora_reserva') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_reserva') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clasesGrupales as $clasesGrupale): ?>
            <tr>
                <td><?= h($clasesGrupale->fecha_inicio) ?></td>
                <td><?= date('H:i', strtotime($clasesGrupale->hora)) ?></td>
                <td><?= $clasesGrupale->has('usuario') ? $this->Html->link($clasesGrupale->usuario->apellido.', '.$clasesGrupale->usuario->nombre, ['controller' => 'Usuarios', 'action' => 'view', $clasesGrupale->usuario->dni]) : '' ?></td>
                <td><?= $this->Number->format($clasesGrupale->num_max_apuntados) ?></td>
                <td><?= $this->Number->format($clasesGrupale->num_actual_apuntados) ?></td>
                <td><?= $this->Number->format($clasesGrupale->precio) ?></td>
                <td><?= $this->Number->format($clasesGrupale->pista_reserva) ?></td>
                <td><?= $this->Number->format($clasesGrupale->hora_reserva) ?></td>
                <td><?= h($clasesGrupale->fecha_reserva) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $clasesGrupale->id_claseGrupal]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clasesGrupale->id_claseGrupal]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clasesGrupale->id_claseGrupal], ['confirm' => __('Are you sure you want to delete # {0}?', $clasesGrupale->id_claseGrupal)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} en total')]) ?></p>
    </div>
</div>
