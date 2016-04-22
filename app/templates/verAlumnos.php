<?php ob_start() ?>
<div class="menubusc">
	<form class="navbar-form navbar-left busofe" action="index.php?ctl=verAlumnos" method="POST" role="search">
	    <div class="form-group">
	      <input type="text" name="buscar" class="form-control" placeholder="Buscar...">
	    </div>
	    <button type="submit" class="btn btn-default">Buscar</button>
	</form>
</div>
<div class="alumnos">
	
				<?php foreach ($params['alumnos'] as $alumno) :?>
					<table class="alumno">
					<tr>
						<td><img src="../web/img/logo.png" style="width:100px; height:100px"></td>
						<th>
						
						<b>Nombre: </b><?php echo $alumno['nombre']?>&nbsp<?php echo $alumno['apellidos']?><br>
								
						</th>
					</tr>	
					<tr>
						<td colspan="2">
							<b>Direccion: </b><?php echo $alumno['direccion']?><br>
							<b>Edad: </b><?php echo $alumno['fecha']?><br>
							<b>Estado: </b><?php echo $alumno['estado']?><br>
							<b>Transporte Propio:</b><?php echo $alumno['transporte']?><br>
							<b>Titulos: </b><?php echo $alumno['titulos']?>.<br>
							<a href="index.php?ctl=verAlumno&id=<?php echo $alumno['idalumno'] ?>">Ver Experiencia y Capacidades</a>
						</td>
					</tr>
						
					
						
					</table>
				<?php endforeach; ?>
</div>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>