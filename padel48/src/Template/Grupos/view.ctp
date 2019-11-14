<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pareja $parejas
 */
?>
<div class="grupos view large-9 medium-8 columns content">
    <h3><?= __('Parejas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id_capitan') ?></th>
            <th scope="col"><?= $this->Paginator->sort('id_pareja') ?></th>
            <th scope="col"><?= $this->Paginator->sort('campeonato_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('puntuacion') ?></th>
            <th scope="col"><?= $this->Paginator->sort('clasificado') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($parejas as $pareja): ?>
            <tr>
                <td><?= h($pareja->id_capitan) ?></td>
                <td><?= h($pareja->id_pareja) ?></td>
                <td><?= $pareja->has('campeonato_id') ? $this->Html->link(h($pareja->campeonato_id), ['controller' => 'Campeonatos', 'action' => 'view', $pareja->campeonato_id]) : '' ?></td>
                <td><?= $this->Number->format($pareja->puntuacion) ?></td>
                <td><?= h($pareja->clasificado) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
