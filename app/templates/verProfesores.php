<?php ob_start() ?>
<div class="menubusc">
	<form class="navbar-form navbar-left busofe" action="index.php?ctl=verProfesores" method="POST" role="search">
	    <div class="form-group">
	      <input type="text" name="buscar" class="form-control" placeholder="Buscar...">
	    </div>
	    <button type="submit" class="btn btn-default">Buscar</button>
	</form>
</div>
<div class="profesores">
	<?php foreach ($params['profesores'] as $profe) :?>
		<div class="profesor">
			<div class="imgD"><img class="imgP"  src="../<?php echo $alumno['url'] ?>" class="perfil"></div>
			<div class="info2">
				<b>Nombre: </b><?php echo $profe['nombre'] ?><br>
				<b>Apellidos: </b><?php echo $profe['apellidos'] ?><br>	
				<b>Correo: </b><?php echo $profe['correo'] ?><br>
				<b>Campo: </b><?php echo $profe['ocupacion'] ?><br>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>
