<?php
    include 'header.ctp';
    include 'menu.ctp';
?>
<head>
    <meta charset="utf-8">
    <title><?php echo $strings['PADEL48']; ?></title>
    <meta author="" name="" content="">
    <link rel="stylesheet" type="text/css" href="/css/css.css" />
</head>
<div id = "main">
    <div id="inicio">
        <?php echo $this->Html->image('pistas2.jpg', ['alt' => 'pista']);?>
    </div>
    <div id="noticias">
        <?php $this->Element('../Noticias/index');?>
    </div>
    <div id="nosotros">

    </div>
    <div id="contacto">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11795.54972590244!2d-7.8554787!3d42.3449233!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbb2380c0a6827554!2sESEI%20-%20Escola%20Superior%20de%20Enxe%C3%B1er%C3%ADa%20Inform%C3%A1tica!5e0!3m2!1ses!2ses!4v1573820141770!5m2!1ses!2ses"></iframe>
    </div>
</div>
</body>
</html>
