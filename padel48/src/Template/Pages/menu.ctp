<head>
    <meta charset="utf-8">
    <title><?php echo $strings['PADEL48']; ?></title>
    <meta author="" name="" content="">
</head>
<div id = "menuInicio">
    <ul>
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Sobre nosotros</a></li>
        <li><a href="#contacto">Contacto</a></li>
        <li><?= $this->Html->link(__('Iniciar sesión'), ['controller' => 'Usuarios', 'action' => 'login']) ?></li>
    </ul>
</div>
</body>
</html>
