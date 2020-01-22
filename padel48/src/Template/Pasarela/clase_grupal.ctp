<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reserva $reserva
 */
$this->Html->css(['css']);
$this->extend('/Pages/navbar')?>
<head>
    <meta charset="utf-8">
    <title><?php echo 'PADEL48' ?></title>
    <meta author="" name="" content="">
    <link rel="stylesheet" type="text/css" href="./src/Template/Index/css/css.css" />
</head>
<body>
<div class = "container">
    <nav class="menu"><ul class = "nav">
    </nav>
    <div class="showVista" id="anhadirReserva">
    <?= $this->Form->create(null, [
    'url' => [
        'controller' => 'Pasarela',
        'action' => 'addClaseGrupal'
    ]
]) ?>
    <fieldset>
        <legend><?= __('Revisión de datos: ') ?></legend>
        <table><tr>
                <td>Usuario: <?= h($inscripcion->usuario_id) ?></td>
            </tr>
            <tr>
                <td>Pista: <?= $this->Number->format($clase->pista_reserva) ?></td>
            </tr>
            <tr>
                <td>Hora: <?= date('H:i', strtotime($horas[$clase->hora_reserva])) ?></td>
            </tr>
            <tr>
                <td>Fecha: <?= h($clase->fecha_reserva) ?></td>
            </tr>
            <tr>
                <td>Precio:
                <?php if($user['socio'] == true) {
                    echo '16€';
                }else{
                    echo '20€';
                } ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $this->Form->control('Numero de tarjeta');?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->control('Fecha de caducidad');?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->control('CVV');?></td>
            </tr>
        </table>
    </fieldset>
    <?= $this->Form->button(__('Confirmar pago')) ?>
    <?= $this->Form->end()?>
</div>



