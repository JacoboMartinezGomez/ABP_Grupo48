<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Noticia[]|\Cake\Collection\CollectionInterface $noticias
 */
$this->extend('/Pages/navbar');
?>
<div class="showVista" id="noticias">
    <h2><?= __('Noticias') ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_noticia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contenido') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($noticias as $noticia): ?>
            <tr>
                <td><?= $this->Number->format($noticia->id_noticia) ?></td>
                <td><?= $noticia->has('usuario') ? $this->Html->link($noticia->usuario->nombre, ['controller' => 'Usuarios', 'action' => 'view', $noticia->usuario->dni]) : '' ?></td>
                <td><?= h($noticia->titulo) ?></td>
                <td><?= h($noticia->contenido) ?></td>
                <td class="actions">
                    <?php echo $this->Html->image("ver.png", array(
                        "src" => "Ver mas",
                        "alt" => "verMas",
                        'url' => array('action' => 'view', $noticia->id_noticia),
                        "class" => "icono"
                    )); ?>

                <?php if ($user['rol'] == 'ADMIN'){?>
                    <?php echo $this->Form->postLink(
                        $this->Html->image(
                            "borrar.png",
                            ["alt" => __('Delete')]
                        ),
                        ['action' => 'delete',   $noticia->id_noticia],
                        ['escape' => false, 'confirm' => __('¿Quieres eliminar la noticia {0}?',  $noticia->id_noticia)]
                    )?>
                <?php }; ?>
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
