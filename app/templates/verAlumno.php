<?php ob_start() ?>
<div class="ficha">
	
	<div class="campo1">	
		<div class="fieldset1">
			
			<div class="orga">
				<div class="imgDF">
					<img class="imgP"  src="../<?php echo $alumno['url'] ?>" class="perfil">
				</div>
			</div>
			<div class="orga">

				<b>Nombre: </b><?php echo $params['alumno']['nombre']?><br>	
				<b>Apellidos: </b> <?php echo $params['alumno']['apellidos'] ?><br>				
				<b>Sexo: </b><?php echo $params['alumno']['sexo'] ?>	<br>
				<b>Fecha Nacimiento: </b><?php echo $params['alumno']['fecha'] ?><br>		
				<b>Nacionalidad: </b><?php echo $params['alumno']['nacionalidad'] ?><br>		
				<b>Direccion: </b><?php echo $params['alumno']['direccion'] ?><br>		
				<b>Correo: </b><?php echo $params['alumno']['correo'] ?>	<br>
			</div>
		</div>
		<div class="fieldset1">	
						
				<b>Idiomas: </b>
					<ul>

					<?php

						foreach ($params['alumno']['idiomas'] as $idioma) {
							
							echo "<li><b>".$idioma['nombre']."</b>-Nivel Hablado: ".$idioma['nivel_hablado']." Nivel Escrito: ".$idioma['nivel_escrito']."</li>";
						}
					?>
					</ul>
				
					<b>Estado: </b><?php echo $params['alumno']['estado'] ?><br>		
					<b>Transporte: </b><?php echo $params['alumno']['transporte'] ?>	<br>
		</div>
		<div class="fieldset1">

		<b>Otras Informaciones: </b> <?php echo $params['alumno']['otros'] ?>
			
		</div>
		<div class="fieldset1">

		<b>Panel de Control:</b><br>
			<a href="<?php echo $params['curriculum']?>">Ver Curriculum</a>
				<?php if(isset($_SESSION)){
						
						if($_SESSION['id']==$params['alumno']['iduser']){
							?>
							<th class="ttabla"><a href="index.php?ctl=modificarPerfil">Modificar Perfil</a></th>
							<th class="ttabla"><a href="index.php?ctl=modificarFoto">Modificar Foto</a></th>
				 			<form name="form_hidden" method="POST" action="index.php?ctl=borrarPerfil">
							<input type="hidden" name="valor1" value="<?php echo $_SESSION['id'] ?>">
							<input type="button" value="Borrar" onClick="avisarBorrado()">
							</form>
				 			<?php
						}
					  }
				 ?>
		</div>
	</div>
	<div class="campo2">
		<div class="fieldset2">
			<b>Experiencia: </b>	
			<ul>		
				<?php 
					foreach ($params['alumno']['experiencia'] as $trabajo) {
						
					echo "<li><b>".$trabajo['descripcion']." </b>- de : ".$trabajo['finicio']." a: ".$trabajo['ffinal']." "."</li>";
			
					}
				 ?>
			</ul>
		</div>
		<div class="fieldset2">
				
				 <b>Titulos: </b>
					<ul>
					<?php foreach($params['alumno']['titulos'] as $titulo){
						echo "<li>".$titulo."</li>";
					} ?>
					</ul>		
				<b>Competencias según títulos poseidos:</b>			
					<ul>
						<?php 
						foreach ($params['competencias'] as $competencia) :
							echo "<li>";
							echo $competencia;
							echo "</li>";
						endforeach;
						?>
					</ul>		
		 </div>	
		</div>
</div>

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>