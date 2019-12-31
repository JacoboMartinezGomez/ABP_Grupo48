<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reserva[]|\Cake\Collection\CollectionInterface $reservas
 */
$this->extend('/Pages/navbar')
?>
<div class="showVista" id="reservas">
    <h2><?= __('Reservas') ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_usuario') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_pista') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <?php if ($user['rol'] == 'ADMIN'){?>
                    <th scope="col" class="actions"><?= __('Acciones') ?></th>
                <?php }; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservas as $reserva): ?>
            <tr>
                <td><?= h($reserva->id_usuario) ?></td>
                <td><?= $this->Number->format($reserva->pista_id) ?></td>
                <td><?= date('H:i', strtotime($horas[$reserva->hora])) ?></td>
                <td><?= h($reserva->fecha) ?></td>
                <?php if ($user['rol'] == 'ADMIN'){?>
                    <td class="actions">
                        <?php echo $this->Form->postLink(
                                $this->Html->image(
                                    "borrar.png",
                                    ["alt" => __('Delete')]
                                ),
                                ['action' => 'delete', '?' => ['id_usuario' => $reserva->id_usuario, 'pista' => $reserva->pista_id, 'hora' => $reserva->hora, 'fecha' => $reserva->fecha]],
                                ['escape' => false, 'confirm' => __('¿Quieres eliminar la reserva del usuario {0}?',  $reserva->id_usuario)]
                            )?>
                    </td>
                <?php }; ?>
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
            <?= $this->Paginator->last(__('ultimo') . ' >>') ?>
        </ul>
            <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, mostrando {{current}} entrada(s) de un total de {{count}} ')]) ?></p>
    </div>
</div>
