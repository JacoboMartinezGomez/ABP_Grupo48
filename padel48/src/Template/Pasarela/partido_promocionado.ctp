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
        'action' => 'addPartidoPromocionado'
    ]
]) ?>
    <fieldset>
        <legend><?= __('Revisión de datos: ') ?></legend>
        <table>
            <tr>
                <td>Usuario 1:
                <?php
                if ($partido['usuario_id']!=null) {
                echo $partido['usuario_id'];
                }
                else{
                    echo "Aún no se ha inscrito";
                }
                ?>
                </td>
            </tr>
            <tr>
                <td>Usuario 2:
                <?php
                if ($partido['usuario_id2']!=null) {
                echo $partido['usuario_id2'];
                }else{echo "Aún no se ha inscrito";}
                ?>
                </td>
            </tr>
            <tr>
                <td>Usuario 3:
                <?php
                if ($partido['usuario_id3']!=null) {
                echo $partido['usuario_id3'];
                }else{echo "Aún no se ha inscrito";}
                ?>
                </td>
            </tr>
            <tr>
                <td>Usuario 4:
                <?php
                if ($partido['usuario_id4']!=null) {
                echo $partido['usuario_id4'];
                }else{echo "Aún no se ha inscrito";}
                ?></td>
            </tr>
            <tr>
                <td>Hora: <?= date('H:i', strtotime($partido['hora'])) ?></td>
            </tr>
            <tr>
                <td>Fecha: <?= h($partido->fecha) ?></td>
            </tr>
            <tr>
                <td>Precio:
                <?php if($user['socio'] == true) {
                    echo '3€';
                }else{
                    echo '6€';
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



