<?php ob_start() ?>

<div class="menubusc">
	<form class="navbar-form navbar-left busofe" action="index.php?ctl=verAlumnos" method="POST" role="search">
	    <div class="form-group">
	      <input type="text" name="buscar" class="form-control" placeholder="Buscar...">
	    </div>
	    <button type="submit" class="btn btn-default">Buscar</button>
	</form>
</div>
<?php foreach ($params['ciclos'] as $ciclo) :?>
	<table name="ciclo">
		<tr>
			<td><a href="index.php?ctl=verCiclo&id='<?php echo $ciclo['idciclo'] ?>'"><b><?php echo $ciclo['abreviatura'] ?></b></a></td>
		</tr>
		<tr>
			<td><?php echo $ciclo['nombre'] ?></td>
		</tr>
	</table>


<?php endforeach; ?>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>