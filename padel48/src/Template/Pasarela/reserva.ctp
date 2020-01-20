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
        'action' => 'addReserva'
    ]
]) ?>
    <fieldset>
        <legend><?= __('Revisión de datos: ') ?></legend>
        <table>
            <tr>
                <td>Usuario: <?= h($reserva->id_usuario) ?></td>
            </tr>
            <tr>
                <td>Pista: <?= $this->Number->format($reserva->pista_id) ?></td>
            </tr>
            <tr>
                <td>Hora: <?= date('H:i', strtotime($horas[$reserva->hora])) ?></td>
            </tr>
            <tr>
                <td>Fecha: <?= h($reserva->fecha) ?></td>
            </tr>
            <tr>
                <td>Precio:
                <?php if($user['socio'] == true) {
                    echo '21€ (6€ pp no socia, 3€ socio)';
                }else{
                    echo '24€ (6€ pp)';
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



