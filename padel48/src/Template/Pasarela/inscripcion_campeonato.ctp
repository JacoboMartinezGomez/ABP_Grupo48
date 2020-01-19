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
    <div class="showVista" id="anhadirInscripcion">
    <?= $this->Form->create(null, [
    'url' => [
        'controller' => 'Pasarela',
        'action' => 'addInscripcion'
    ]
]) ?>
    <fieldset>
        <legend><?= __('Revisión de datos: ') ?></legend>
        <table>
            <tr>
                <td>DNI capitán: <?= h($pareja->id_capitan) ?></td>
            </tr>
            <tr>
                <td>DNI pareja: <?= h($pareja->id_pareja) ?></td>
            </tr>
            <tr>
                <td>Campeonato seleccionado: <?= h($pareja->campeonato_id) ?></td>
            </tr>
            <tr>
                <td>Precio: 
                <?php if($user['socio'] == true) {
                    echo '42€ (21€ pp)';
                }else{
                    echo '50€ (25€ pp)';
                } ?>
                <a style="color:#FF0000";>*</a> 
                </td>
            </tr>
        </table>
        <p style="color:#FF0000";>* La inscrición incluye bebida durante los partidos y una camiseta conmemorativa.</p>
    </fieldset>
    <?= $this->Form->button(__('Confirmar pago')) ?>
    <?= $this->Form->end()?>
</div>

 

