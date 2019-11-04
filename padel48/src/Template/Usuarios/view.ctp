
<h1><?= h($usuario->title) ?></h1>
<p><?= h($usuario->body) ?></p>
<p><small>Nombre: <?= $usuario->nombre ?></small></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $usuario->dni]) ?></p>
