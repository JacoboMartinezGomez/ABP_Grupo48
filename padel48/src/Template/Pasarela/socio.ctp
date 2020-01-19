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
        'action' => 'confirmarSocio'
    ]
]) ?>
    <fieldset>
        <legend><?= __('Revisión de datos: ') ?></legend>
        <p>
            <?= __('Usuario: '); ?>
        <?=  h($usuario->dni); ?>
        </p>
        <p>
        <?= __('Nombre: '); ?>
        <?= h($usuario->nombre); ?>
        </p>
        <p><?= __('Apellido: '); ?>
        <?= h($usuario->apellido); ?>
        </p>
        <p><?= __('Email: '); ?>
        <?= h($usuario->email); ?>
        </p>
        <p>¿Esta seguro de que desea cambiar su cuenta a socio del club?</p>
        <p>Obtendrá diversos descuentos (reserva de pistas, inscripciones, etc)</p>
        <p>Precio: 20€/mes</p>
    </fieldset>
    <?= $this->Form->button(__('Confirmar pago')) ?>
    <?= $this->Form->end()?>
</div>

 

