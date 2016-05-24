<?php ob_start() ?>
<div class="menubusc">
	<form class="navbar-form navbar-left busofe" action="index.php?ctl=verAlumnos" method="POST" role="search">
		<div class="form-group">
			<input type="text" name="buscar" class="form-control" placeholder="Buscar...">
		</div>
		<button type="submit" class="btn btn-default">Buscar</button>
	</form>
</div>
<div class="ciclos">
	<?php foreach ($params['ciclos'] as $ciclo) :?>
	<div class="ciclo">
		<span class="center">
			<a href="index.php?ctl=verCiclo&id=<?php echo $ciclo['idciclo'] ?>">
				<b><?php echo $ciclo['abreviatura'] ?></b>
			</a><br>
			<?php echo $ciclo['nombre'] ?>
		</span>
	</div>
	<?php endforeach; ?>
</div>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>