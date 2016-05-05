<?php ob_start() ?>
<div class="ficha">
	
	<td><img src="..<?php echo $alumno['url'] ?>" class="perfil"></td><td></td>
	
	<table class="fichaal">
		<tr>
			<th>Nombre</th><td><?php echo $params['alumno']['nombre']." ".$params['alumno']['apellidos']?></td>
		</tr>
		<tr>
			<th>Sexo</th><td><?php echo $params['alumno']['sexo'] ?></td>
		</tr>
		<tr>
			<th>Fecha Nacimiento</th><td><?php echo $params['alumno']['fecha'] ?></td>
		</tr>
		<tr>
			<th>Nacionalidad</th><td><?php echo $params['alumno']['nacionalidad'] ?></td>
		</tr>
		<tr>
			<th>Direccion</th><td><?php echo $params['alumno']['direccion'] ?></td>
		</tr>
		<tr>
			<th>Correo</th><td><?php echo $params['alumno']['correo'] ?></td>
		</tr>
		<tr>
			<th>Estado</th><td><?php echo $params['alumno']['estado'] ?></td>
		</tr>
		<tr>
			<th>Transporte</th><td><?php echo $params['alumno']['transporte'] ?></td>
		</tr>
		<tr>
			<th>Titulos</th>
			<td><?php echo $params['alumno']['titulos'] ?></td>
		</tr>
		<tr>
			<th>Idiomas</th>
			<td>
				<?php
					foreach ($params['alumno']['idiomas'] as $idioma) {
						
						echo "<b>".$idioma['nombre']."</b> Nivel Hablado: ".$idioma['nivel_hablado']." Nivel Escrito: ".$idioma['nivel_escrito']."<br>";
					}
				?>
			</td>
		</tr>
		<tr>
			<th>Experiencia</th>
			<td>
			<?php 
				foreach ($params['alumno']['experiencia'] as $trabajo) {
					
				echo "<b>".$trabajo['descripcion']." </b>- de : ".$trabajo['finicio']." a: ".$trabajo['ffinal']." "."<br>";
		
				}
			 ?>
			</td>
		</tr>
		<tr>
			<th>Competencias</th>
			<td>
				<ul>
					<?php 
					foreach ($params['competencias'] as $competencia) :
						echo "<li>";
						echo $competencia;
						echo "</li>";
					endforeach;
					?>
				</ul>
			</td>
		</tr>
		<tr>
			<th>Otros</th><td><?php echo $params['alumno']['otros'] ?></td>
		</tr>
		</table>
		<table>
		<tr>
			<th><a href="<?php echo $params['curriculum']?>">Ver Curriculum</a></th>
			<?php if(isset($_SESSION)){
					
					if($_SESSION['id']==$params['alumno']['iduser']){

						?>

						<th class="ttabla"><a href="index.php?ctl=modificarPerfil">Modificar Perfil</a></th>
						<th class="ttabla"><a href="index.php?ctl=modificarFoto">Modificar Foto</a></th>
			 			<th><form name="form_hidden" method="POST" action="index.php?ctl=borrarPerfil">
						<input type="hidden" name="valor1" value="<?php echo $_SESSION['id'] ?>">
						<input type="button" value="Borrar" onClick="avisarBorrado()">
						</form></th>

			 			<?php
					}
				  }
			 ?>
		</tr>
	</table>
</div>

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>