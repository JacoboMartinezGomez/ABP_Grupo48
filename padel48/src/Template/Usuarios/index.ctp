<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario[]|\Cake\Collection\CollectionInterface $usuarios
 */
$this->extend('/Pages/navbar');
?>
<div class="showVista" id="usuarios">
    <h2><?= __('Usuarios') ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
            <th scope="col"><?= $this->Paginator->sort('dni') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sexo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefono') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rol') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numero_pistas') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
            <td><?= h($usuario->dni) ?></td>
                <td><?= h($usuario->password) ?></td>
                <td><?= h($usuario->nombre) ?></td>
                <td><?= h($usuario->apellido) ?></td>
                <td><?= h($usuario->email) ?></td>
                <td><?= h($usuario->sexo) ?></td>
                <td><?= $this->Number->format($usuario->telefono) ?></td>
                <td><?= h($usuario->rol) ?></td>
                <td><?= $this->Number->format($usuario->numero_pistas) ?></td>
                <td class="actions">
                    <?php echo $this->Html->image("ver.png", array(
                        "src" => "Ver mas",
                        "alt" => "verMas",
                        'url' => array('action' => 'view', $usuario->dni),
                        "class" => "icono"
                    )); ?>
                    <?php echo $this->Html->image("editar.png", array(
                        "src" => "Editar",
                        "alt" => "editar",
                        'url' => array('action' => 'edit', $usuario->dni),
                        "class" => "icono"
                    )); ?>
                    <?php echo $this->Form->postLink(
                            $this->Html->image(
                                "borrar.png",
                                ["alt" => __('Delete')]
                            ),
                            ['action' => 'delete',   $usuario->dni],
                            ['escape' => false, 'confirm' => __('¿Quieres eliminar el el usuario {0}?',  $usuario->dni)]
                        )?>
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
            <?= $this->Paginator->last(__('ultimo') . ' >>') ?>
        </ul>
            <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, mostrando {{current}} entrada(s) de un total de {{count}} ')]) ?></p>
    </div>
</div>
