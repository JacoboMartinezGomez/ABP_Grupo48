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
                <td><?= h(date('H:i', strtotime($clasesGrupale->hora))) ?></td>
                <td><?= $clasesGrupale->has('usuario') ? $this->Html->link($clasesGrupale->usuario->apellido.', '.$clasesGrupale->usuario->nombre, ['controller' => 'Usuarios', 'action' => 'view', $clasesGrupale->usuario->dni]) : '' ?></td>
                <td><?= $this->Number->format($clasesGrupale->num_max_apuntados) ?></td>
                <td><?= $this->Number->format($clasesGrupale->num_actual_apuntados) ?></td>
                <td><?= $this->Number->format($clasesGrupale->precio) ?></td>
                <td><?= $this->Number->format($clasesGrupale->pista_reserva) ?></td>
                <td><?= h(date('H:i', strtotime($horas[$clasesGrupale->hora_reserva]))) ?></td>
                <td><?= h($clasesGrupale->fecha_reserva) ?></td>
                <td class="actions">
                    <?php echo $this->Html->image("ver.png", array(
                        "src" => "Ver",
                        "alt" => "ver",
                        'url' => array('action' => 'view', $clasesGrupale->id_claseGrupal),
                        "class" => "icono"
                    ));

                    if($clasesGrupale->num_actual_apuntados < $clasesGrupale->num_max_apuntados && !in_array($clasesGrupale->id_claseGrupal, $clases_apuntado)){
                        echo $this->Html->image("inscribir.png", array(
                            "src" => "Inscribirse",
                            "alt" => "inscribirse",
                            'url' => array('action' => 'inscribirse', $clasesGrupale->id_claseGrupal),
                            "class" => "icono"
                        ));
                    }
                    if($user['rol'] == 'ADMIN' || $user['rol'] == 'PROFESOR') {
                        echo $this->Html->image("calendario.png", array(
                            "src" => "Aplazar",
                            "alt" => "Aplazar",
                            'url' => array('action' => 'aplazar', $clasesGrupale->id_claseGrupal),
                            "class" => "icono"
                        ));

                        echo $this->Form->postLink(
                            $this->Html->image(
                                "borrar.png",
                                ["alt" => __('Delete')]
                            ),
                            ['action' => 'delete', $clasesGrupale->id_claseGrupal],
                            ['escape' => false, 'confirm' => __('Esta seguro de que desea borrar la clase # {0}?', $clasesGrupale->id_claseGrupal)]
                        );
                    }
                    ?>
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
