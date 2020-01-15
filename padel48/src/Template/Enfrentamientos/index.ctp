<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enfrentamiento[]|\Cake\Collection\CollectionInterface $enfrentamientos
 * * @var \App\Model\Entity\FechasPropuesta[]|\Cake\Collection\CollectionInterface $fechaPropuesta
 */
$this->extend('/Pages/navbar');
?>
    <div class="showVista" id="enfrentamientos">
    <h2><?= __('Enfrentamientos') ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" width = "140px"><?= $this->Paginator->sort('id_enfrentamiento') ?> </th>
                <th scope="col"><?= $this->Paginator->sort('id_grupo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fase') ?></th>
                <th scope="col"><?= $this->Paginator->sort('resultado') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($enfrentamientos as $enfrentamiento): ?>
            <tr>
                <td><?= $this->Number->format($enfrentamiento->enfrentamientos['id_enfrentamiento']) ?></td>
                <td><?= $this->Number->format($enfrentamiento->enfrentamientos['grupo_id']) ?></td>
                <td><?= h(h(date('H:i', strtotime($enfrentamiento->enfrentamientos['hora'])))) ?></td>
                <td><?= h($enfrentamiento->enfrentamientos['fecha']) ?></td>
                <td><?= $this->Number->format($enfrentamiento->enfrentamientos['fase']) ?></td>
                <td><?= $this->Number->format($enfrentamiento->d['resultado']) ?></td>
                <td class="actions">
                    <?php echo $this->Html->image("calendario.png", array(
                        "src" => "Proponer fecha",
                        "alt" => "proponerFecha",
                        'url' => array('controller' => 'FechasPropuestas', 'action' => 'index', $enfrentamiento->enfrentamientos['id_enfrentamiento']),
                        "class" => "icono"
                    )); ?>

                    <?php if ($user['rol'] == 'ADMIN'){?>
                        <?php echo $this->Html->image("marcador.png", array(
                            "src" => "Añadir Resultado",
                            "alt" => "anhadirResultado",
                            'url' => array('controller' => 'Enfrentamientos', 'action' => 'introducirResultado', $enfrentamiento->enfrentamientos['id_enfrentamiento']),
                            "class" => "icono"
                        )); ?>
                        <?php echo $this->Form->postLink(
                                $this->Html->image(
                                    "borrar.png",
                                    ["alt" => __('Delete')]
                                ),
                                ['action' => 'delete',   $enfrentamiento->id_enfrentamiento],
                                ['escape' => false, 'confirm' => __('¿Quieres eliminar el enfrentamiento {0}?',  $enfrentamiento->enfrentamientos['id_enfrentamiento'])]
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
</div>
