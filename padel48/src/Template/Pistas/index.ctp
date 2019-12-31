<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pista[]|\Cake\Collection\CollectionInterface $pistas
 */
$this->extend('/Pages/navbar');
?>
<div class="showVista" id="pistas">
    <h2><?= __('Pistas') ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('num_pista') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lugar') ?></th>
                <?php if ($user['rol'] == 'ADMIN'){?>
                    <th scope="col" class="actions"><?= __('Acciones') ?></th>
                <?php }; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pistas as $pista): ?>
            <tr>
                <td><?= $this->Number->format($pista->num_pista) ?></td>
                <td><?= h($pista->tipo) ?></td>
                <td><?= h($pista->lugar) ?></td>
                <?php if ($user['rol'] == 'ADMIN'){?>

                    <td class="actions">
                        <?php echo $this->Html->image("editar.png", array(
                            "src" => "Editar",
                            "alt" => "editar",
                            'url' => array('action' => 'edit', $pista->num_pista),
                            "class" => "icono"
                        )); ?>
                        <?php echo $this->Form->postLink(
                                $this->Html->image(
                                    "borrar.png",
                                    ["alt" => __('Delete')]
                                ),
                                ['action' => 'delete',   $pista->num_pista],
                                ['escape' => false, 'confirm' => __('¿Quieres eliminar la pista número {0}?',  $pista->num_pista)]
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
