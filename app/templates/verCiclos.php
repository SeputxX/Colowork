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
			<td colspan="2"><b><?php echo $ciclo['abreviatura']." ".$ciclo['nombre'] ?></b></td>
		</tr>
		<tr>
			<td>Descripcion: </td><td><?php echo $ciclo['descripcion'] ?></td>
		</tr>
		<tr>
			<td>Competencias: </td>
			<td>
			<?php foreach ($ciclo['competencias'] as $competencia) :?>
				<?php echo $competencia." " ?>
			<?php endforeach; ?>
			</td>
		</tr>
		
	</table>


<?php endforeach; ?>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>