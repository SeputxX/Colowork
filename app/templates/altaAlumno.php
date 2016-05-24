<?php ob_start() ?>
<?php if(isset($params['mensaje'])) :?>
<b><span style="color: red;"><?php echo $params['mensaje'] ?></span></b>
<?php endif; ?>
<form enctype="multipart/form-data" method="POST" action="index.php?ctl=altaAlumno">
	<table>
	<div class="zona">
		<div class="acceso">
		<legend>Datos de Acceso</legend>
			<b>Usuario:</b>			
			<br><input type="text" name="user" value="<?php echo $params['user'] ?>" pattern="([a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\ ]){2,50}" required/>Solo letras max 50 <p></p>		
			<b>Clave Acceso:</b>
			<br><input type="password" name="pass" value="<?php echo $params['pass'] ?>" pattern="[A-Za-z0-9!?-]{8,20}" required />Letras y Numeros Min 8 Max 20
		</div>
		<div class="acceso">
		<legend>Datos Personales</legend>
			<b>Nombre:</b>
			<br><input type="text" name="nombre" value="<?php echo $params['nombre'] ?>" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚ\ ]){2,50}" required/>Solo letras max 50 <p></p>
			<b>Apellidos:</b>
			<br><input type="text" name="apellidos" value="<?php echo $params['apellidos'] ?>" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚ\ ]){2,100}" required/>Solo letras max 100 <p></p>
			<b>F. nacimiento</b>
			<br><input type="text" pattern="^([0][1-9]|[12][0-9]|3[01])(\/|-)([0][1-9]|[1][0-2])\2(\d{4})$" name="fecha" value="<?php echo $params['fecha'] ?>" required/>dd/mm/aaaa
			<p></p>
			<b>Sexo</b>
			<select name="sexo">
				<option value="Hombre" <?php if(isset($_POST['sexo'])){ if($_POST['sexo']=='Hombre'){ echo "selected";}}?>>Hombre</option>
				<option value="Mujer" <?php if(isset($_POST['sexo'])){ if($_POST['sexo']=='Mujer'){ echo "selected";}}?>>Mujer</option>
			</select>
			<p></p>
			<b>Nacionalidad:</b>
			<br><input type="text" name="nacionalidad" value="<?php echo $params['nacionalidad'] ?>" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚ\ ]|\s){2,50}" required/>Solo letras max 50 <p></p>
			<b>Direccion:</b>
			<br><input type="text" name="direccion" value="<?php echo $params['direccion'] ?>" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚ\ ]){2,100}" required/>Solo letras max 100
			<p></p>
			<b>Correo:</b>
			<br><input type="text" name="correo" value="<?php echo $params['correo'] ?>" pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$" required/>example@loquesea.algo			
		</div>
	</div>
	<div class="zona2">
		<div class="datosEMP">
		<legend>Datos Académicos</legend>
			 <b>Idiomas:</b>
			<div id="idiomas">
		<?php if(isset($_POST['idiomas'])){ 

			$cant=count($_POST['idiomas']);

			for($i=0;$i<$cant;$i++){

		?>
		<div id="idi">
			<select name="idiomas[<?php echo $i ?>]">
				<option value="Aleman" <?php if(isset($_POST['idiomas'])){ if($_POST['idiomas'][$i]=="Aleman"){ echo "selected";}} ?>>Alemán</option>
				<option value="Arabe" <?php if(isset($_POST['idiomas'])){ if($_POST['idiomas'][$i]=="Arabe"){ echo "selected";}} ?>>Árabe</option>
				<option value="Catalan" <?php if(isset($_POST['idiomas'])){ if($_POST['idiomas'][$i]=="Catalan"){ echo "selected";}} ?>>Catalán</option>
				<option value="Español" <?php if(isset($_POST['idiomas'])){ if($_POST['idiomas'][$i]=="Español"){ echo "selected";}} ?>>Español</option>
				<option value="Frances" <?php if(isset($_POST['idiomas'])){ if($_POST['idiomas'][$i]=="Frances"){ echo "selected";}} ?>>Francés</option>
				<option value="Ingles" <?php if(isset($_POST['idiomas'])){ if($_POST['idiomas'][$i]=="Ingles"){ echo "selected";}} ?>>Inglés</option>
				<option value="Italiano" <?php if(isset($_POST['idiomas'])){ if($_POST['idiomas'][$i]=="Italiano"){ echo "selected";}} ?>>Italiano</option>
				<option value="Portugues" <?php if(isset($_POST['idiomas'])){ if($_POST['idiomas'][$i]=="Portugues"){ echo "selected";}} ?>>Portugués</option>
				<option value="Ruso" <?php if(isset($_POST['idiomas'])){ if($_POST['idiomas'][$i]=="Ruso"){ echo "selected";}} ?>>Ruso</option>
			</select>
			Hablado:
			<select name="n_Hablado:[<?php echo $i ?>]">
				<option value="Alto" <?php if(isset($_POST['n_Hablado:'])){if($_POST['n_Hablado:'][$i]=="Alto"){echo "selected";}} ?>>Alto</option>
				<option value="Medio" <?php if(isset($_POST['n_Hablado:'])){if($_POST['n_Hablado:'][$i]=="Medio"){echo "selected";}} ?>>Medio</option>
				<option value="Bajo" <?php if(isset($_POST['n_Hablado:'])){if($_POST['n_Hablado:'][$i]=="Bajo"){echo "selected";}} ?>>Bajo</option>
			</select>
			Escrito:
			<select name="n_Escrito:[<?php echo $i ?>]">
				<option value="Alto" <?php if(isset($_POST['n_Escrito:'])){if($_POST['n_Escrito:'][$i]=="Alto"){echo "selected";}} ?>>Alto</option>
				<option value="Medio" <?php if(isset($_POST['n_Escrito:'])){if($_POST['n_Escrito:'][$i]=="Medio"){echo "selected";}} ?>>Medio</option>
				<option value="Bajo" <?php if(isset($_POST['n_Escrito:'])){if($_POST['n_Escrito:'][$i]=="Bajo"){echo "selected";}} ?>>Bajo</option>
			</select>
			Fecha Titulación:<input name="fechat[<?php echo $i ?>]" type="text" value="<?php if(isset($_POST['fechat'])){ echo $params['fechat'][$i];} ?>" pattern="^([0][1-9]|[12][0-9]|3[01])(\/|-)([0][1-9]|[1][0-2])\2(\d{4})$" name="fechat[$i]" required/>(dd/mm/aaaa)
		</div>
		<?php 	}

		}else{ ?>
		<div id="idi">
			<select name="idiomas[0]">
				<option value="Aleman" <?php if(isset($_POST['idiomas'])){ if($_POST['idiomas'][0]=="Aleman"){ echo "selected";}} ?>>Alemán</option>
				<option value="Arabe" <?php if(isset($_POST['idiomas'])){ if($_POST['idiomas'][0]=="Arabe"){ echo "selected";}} ?>>Árabe</option>
				<option value="Catalan" <?php if(isset($_POST['idiomas'])){ if($_POST['idiomas'][0]=="Catalan"){ echo "selected";}} ?>>Catalán</option>
				<option value="Español" <?php if(isset($_POST['idiomas'])){ if($_POST['idiomas'][0]=="Español"){ echo "selected";}} ?>>Español</option>
				<option value="Frances" <?php if(isset($_POST['idiomas'])){ if($_POST['idiomas'][0]=="Frances"){ echo "selected";}} ?>>Francés</option>
				<option value="Ingles" <?php if(isset($_POST['idiomas'])){ if($_POST['idiomas'][0]=="Ingles"){ echo "selected";}} ?>>Inglés</option>
				<option value="Italiano" <?php if(isset($_POST['idiomas'])){ if($_POST['idiomas'][0]=="Italiano"){ echo "selected";}} ?>>Italiano</option>
				<option value="Portugues" <?php if(isset($_POST['idiomas'])){ if($_POST['idiomas'][0]=="Portugues"){ echo "selected";}} ?>>Portugués</option>
				<option value="Ruso" <?php if(isset($_POST['idiomas'])){ if($_POST['idiomas'][0]=="Ruso"){ echo "selected";}} ?>>Ruso</option>
			</select>
			Hablado:
			<select name="n_Hablado:[0]">
				<option value="Alto" <?php if(isset($_POST['n_Hablado:'])){if($_POST['n_Hablado:'][0]=="Alto"){echo "selected";}} ?>>Alto</option>
				<option value="Medio" <?php if(isset($_POST['n_Hablado:'])){if($_POST['n_Hablado:'][0]=="Medio"){echo "selected";}} ?>>Medio</option>
				<option value="Bajo" <?php if(isset($_POST['n_Hablado:'])){if($_POST['n_Hablado:'][0]=="Bajo"){echo "selected";}} ?>>Bajo</option>
			</select>
			Escrito:
			<select name="n_Escrito:[0]">
				<option value="Alto" <?php if(isset($_POST['n_Escrito:'])){if($_POST['n_Escrito:'][0]=="Alto"){echo "selected";}} ?>>Alto</option>
				<option value="Medio" <?php if(isset($_POST['n_Escrito:'])){if($_POST['n_Escrito:'][0]=="Medio"){echo "selected";}} ?>>Medio</option>
				<option value="Bajo" <?php if(isset($_POST['n_Escrito:'])){if($_POST['n_Escrito:'][0]=="Bajo"){echo "selected";}} ?>>Bajo</option>
			</select>
			Fecha Titulación:<input type="text" value="<?php if(isset($_POST['fechat'])){ echo $_POST['fechat'][0];} ?>" pattern="^([0][1-9]|[12][0-9]|3[01])(\/|-)([0][1-9]|[1][0-2])\2(\d{4})$" name="fechat[0]" required/>(dd/mm/aaaa)
		</div>
		<?php } ?>
		<a id="but" onclick="anadirIdioma()">Añadir Idioma</a>
		</div>
		<b>Estado Laboral:</b>
			<select name="estado_laboral" value="<?php echo $params['estado_laboral'] ?>">
				<option value="Parado" <?php if(isset($_POST['estado_laboral'])){ if($_POST['estado_laboral']=='Parado'){ echo "selected";}} ?>>Parado</option>
				<option value="Estudiando" <?php if(isset($_POST['estado_laboral'])){ if($_POST['estado_laboral']=='Estudiando'){ echo "selected";}} ?>>Estudiando</option>
				<option value="Trabajando" <?php if(isset($_POST['estado_laboral'])){ if($_POST['estado_laboral']=='Trabajando'){ echo "selected";}} ?>>Trabajando</option>
			</select>
			&nbsp&nbsp&nbsp<b>Capacidad de Transporte:</b>
			<select name="transporte">
				<option value="No" <?php if(isset($_POST['transporte'])){ if($_POST['transporte']=='No'){ echo "selected";}} ?>>No</option>
				<option value="Si" <?php if(isset($_POST['transporte'])){ if($_POST['transporte']=='Si'){ echo "selected";}} ?>>Si</option>
			</select>
			&nbsp&nbsp&nbsp<b>Titulos:</b>
			<?php foreach ($params['opctitulos'] as $titulo) :
				if(isset($_POST['titulos'])){
					if(in_array($titulo['abreviatura'], $_POST['titulos'])){?>
				    <?php echo $titulo['abreviatura'] ?><input type="checkbox" name="titulos[]" value="<?php echo $titulo['abreviatura'] ?>" checked >
			<?php }else{ echo $titulo['abreviatura'] ?><input type="checkbox" name="titulos[]" value="<?php echo $titulo['abreviatura'] ?>">

			<?php }
				}else{ ?>
   				<?php echo $titulo['abreviatura'] ?><input type="checkbox" name="titulos[]" value="<?php echo $titulo['abreviatura'] ?>">
			<?php	}
			 endforeach; ?>
		<p></p>
		<b>Experiencia Laboral:</b>
		<div id="experiencia">
		<?php if(isset($_POST['descripcion'])){ 

			$cant=count($_POST['descripcion']);

			for($i=0;$i<$cant;$i++){ ?>

				<div id="exp">
					Puesto<input type="text" name="descripcion[<?php echo $i; ?>]" value="<?php if(isset($_POST['descripcion'])){ echo $_POST['descripcion'][$i];} ?>" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚ\ ]|\s){2,50}" required/>
					F. de Inicio<input type="text" value="<?php if(isset($_POST['finicio'])){ echo $_POST['finicio'][$i];} ?>" pattern="^([0][1-9]|[12][0-9]|3[01])(\/|-)([0][1-9]|[1][0-2])\2(\d{4})$" name="finicio[<?php echo $i; ?>]" required/>
					F. de Fin<input type="text" value="<?php if(isset($_POST['ffinal'])){ echo $_POST['ffinal'][$i];} ?>" pattern="^([0][1-9]|[12][0-9]|3[01])(\/|-)([0][1-9]|[1][0-2])\2(\d{4})$" name="ffinal[<?php echo $i; ?>]" required/><br>
				</div>
				
			<?php } 
				}else{ ?>
				<div id="exp">
					Descripción<input type="text" name="descripcion[]" value="<?php if(isset($_POST['descripcion'])){ echo $_POST['descripcion'][0];} ?>" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚ\ ]|\s){2,50}" required/>
					F. de Inicio<input type="text" value="<?php if(isset($_POST['finicio'])){ echo $_POST['finicio'][0];} ?>" pattern="^([0][1-9]|[12][0-9]|3[01])(\/|-)([0][1-9]|[1][0-2])\2(\d{4})$" name="finicio[0]" required/>
					F.de Fin<input type="text" value="<?php if(isset($_POST['ffinal'])){ echo $_POST['ffinal'][0];} ?>" pattern="^([0][1-9]|[12][0-9]|3[01])(\/|-)([0][1-9]|[1][0-2])\2(\d{4})$" name="ffinal[0]" required/><br>
				</div>
				<a id="but2" onclick="anadirExp()">Añadir Experiencia</a>	
			<?php } ?>
		</div>
		<b>Otras Informaciones</b><br>
			<textarea name="otros"><?php echo $params['otros'] ?></textarea>
			<p></p>
			<b>Codigo Centro:</b><br>
			<input type="text" name="codigo" value="<?php echo $params['codigo'] ?>" pattern="[a-zA-Z0-9]{6}">Numero y letras 6 caracteres Codigo sacolomina Q2W3E4
		<p></p>
		<b>Foto de Perfil</b>
		<input type="file" name="foto" />
 	</div>
		
		
	<input type="hidden" name="rol" value="alumno"/>
	<input type="submit" name="submit" value="Insertar" />
</form>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>