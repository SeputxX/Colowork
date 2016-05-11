<?php ob_start() ?>
<div class="menubusc">
	<form class="navbar-form navbar-left busofe" action="index.php?ctl=verAlumnos" method="POST" role="search">
	    <div class="form-group">
	      <input type="text" name="buscar" class="form-control" placeholder="Buscar...">
	    </div>
	    <button type="submit" class="btn btn-default">Buscar</button>
	</form>
</div>
<div class="profesores">
	<?php foreach ($params['profesores'] as $profe) :?>
		<table class="profesor">
			<tr>
				<th>Nombre</th><td><?php echo $profe['nombre'] ?></td>
			</tr>
			<tr>
				<th>Apellidos</th><td><?php echo $profe['apellidos'] ?></td>
			</tr>
			<tr>
				<th>Correo</th><td><?php echo $profe['correo'] ?></td>
			</tr>
			<tr>
				<th>Campo</th><td><?php echo $profe['ocupacion'] ?></td>
			</tr>
		</table>
	<?php endforeach; ?>
</div>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>
