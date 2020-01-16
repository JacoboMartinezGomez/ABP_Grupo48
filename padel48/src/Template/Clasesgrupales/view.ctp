<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClasesGrupale $clasesGrupale
 */
$this->extend('/Pages/navbar');
?>
<div class="showVista" id="clasesGrupales">
    <h3>Profesor: <?= h($clasesGrupale->usuario->apellido) ?>, <?= h($clasesGrupale->usuario->nombre) ?> </h3>
    <h5>Fecha inicio: <?= h($clasesGrupale->fecha_inicio) ?> </h5>
    <h5>Precio: <?= h($clasesGrupale->precio) ?> </h5>

    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('apellido') ?></th>
            <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
            <th scope="col"><?= $this->Paginator->sort('dni', 'DNI') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($inscritos as $usuario): ?>
            <tr>
                <td><?= $this->Html->link($usuario->apellido, ['controller' => 'Usuarios', 'action' => 'view', $usuario->dni]) ?></td>
                <td><?= $this->Html->link($usuario->nombre, ['controller' => 'Usuarios', 'action' => 'view', $usuario->dni]) ?></td>
                <td><?= $this->Html->link($usuario->dni, ['controller' => 'Usuarios', 'action' => 'view', $usuario->dni]) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
