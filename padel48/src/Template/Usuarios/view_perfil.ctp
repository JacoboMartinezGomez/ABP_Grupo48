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
    <div class="showVista" id="verUsuario">
    <?= $this->Form->create(null, [
        'url' => [
            'controller' => 'Pasarela',
            'action' => 'socio'
        ]
]) ?>
    <fieldset>
        <legend><?= __('Perfil del usuario '); echo h($usuario->dni); ?></legend>
        <table>
            <tr>
                <td scope="row"><?= __('Dni'); ?></td>
                <td><?= h($usuario->dni); ?></td>
            </tr>
            <tr>
                <td scope="row"><?= __('Nombre'); ?></td>
                <td><?= h($usuario->nombre); ?></td>
            </tr>
            <tr>
                <td scope="row"><?= __('Apellido'); ?></td>
                <td><?= h($usuario->apellido); ?></td>
            </tr>
            <tr>
                <td scope="row"><?= __('Email'); ?></td>
                <td><?= h($usuario->email); ?></td>
            </tr>
            <tr>
                <td scope="row"><?= __('Sexo'); ?></td>
                <td><?= h($usuario->sexo); ?></td>
            </tr>
            <tr>
                <td scope="row"><?= __('Rol'); ?></td>
                <td><?= h($usuario->rol); ?></td>
            </tr>
            <tr>
                <td scope="row"><?= __('Telefono'); ?></td>
                <td><?= $this->Number->format($usuario->telefono); ?></td>
            </tr>
            <tr>
                <td scope="row"><?= __('Numero Pistas'); ?></td>
                <td><?= $this->Number->format($usuario->numero_pistas); ?></td>
            </tr>
            <tr>
                <td scope="row"><?= __('Socio'); ?></td>
                <td><?php
                    if($usuario['socio'] == false){
                        echo 'No';
                    }else{
                        echo 'Si';
                    };?>
                </td>
            </tr>
        </table>
    </fieldset>
    <?php 
    if($usuario['socio'] == false){
        echo $this->Form->button(__('Hacerme socio'));
    }
    ?>
    <?= $this->Form->end()?>
</div>

 

