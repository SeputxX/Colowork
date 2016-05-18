<?php ob_start() ?>
<?php if(isset($params['mensaje'])) :?>
<b><span style="color: red;"><?php echo $params['mensaje'] ?></span></b>
<?php endif; ?>
<div class="menubusc">
	<form class="navbar-form navbar-left busofe" action="index.php?ctl=verAlumnos" method="POST" role="search">
	    <div class="form-group">
	      <input type="text" name="buscar" class="form-control" placeholder="Buscar...">
	    </div>
	    <button type="submit" class="btn btn-default">Buscar</button>
	</form>
</div>
<div class="alumnos" >
				<?php foreach ($params['alumnos'] as $alumno) :?>
					<div class="alumno">											
						<div class="info1">
							<b>Nombre: </b><?php echo $alumno['nombre']?><br><b>Apellidos:</b> <?php echo $alumno['apellidos']?><br>
							<b>Direccion: </b><?php echo $alumno['direccion']?><br>
							<b>Fecha Nacimiento: </b><?php echo $alumno['fecha']?><br>
							<b>Estado: </b><?php echo $alumno['estado']?><br>
							<b>Transporte Propio: </b><?php echo $alumno['transporte']?><br>
							<b>Titulos: </b>
							<ul>
							<?php foreach ($alumno['titulos'] as $titulo) : ?>
							<li><?php echo $titulo ?>.</li>
							<?php endforeach; ?>
							</ul>							
						</div>
						<div class="controles">
								<a href="index.php?ctl=verAlumno&id=<?php echo $alumno['iduser'] ?>">Ver Perfil</a>
						</div>
					</div>
				<?php endforeach; ?>
</div>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>