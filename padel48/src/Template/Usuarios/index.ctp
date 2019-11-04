
<h1>Usuarios</h1>
<table>
    <tr>
        <th>Nombre</th>
        <th>DNI</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td>
                <?= $this->Html->link($usuario->nombre, ['action' => 'view', $usuario->dni]) ?>
            </td>
            <td>
                <?= $this->Html->link($usuario->dni, ['action' => 'view', $usuario->dni]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
