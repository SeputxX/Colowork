<?php ob_start() ?>
<?php if(isset($params['mensaje'])) :?>
<b><span style="color: red;"><?php echo $params['mensaje'] ?></span></b>
<?php endif; ?>
<form method="POST" action="index.php?ctl=modificarPerfil">
	<table>
	<tr>
			<th>Usuario:</th>
			<td>
				<input type="text" name="user" value="<?php echo $params['user'] ?>" pattern="([a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\ ]){2,50}" required/>(Solo letras max 50)
			</td>
		</tr>
		<tr>
			<th>Nombre:</th>
			<td>
				<input type="text" name="nombre" value="<?php echo $params['datos']['nombre'] ?>" pattern="([a-zA-Z]|\s){2,50}" required/>(Solo letras max 50)
			</td>
		</tr>
		<tr>
			<th>Apellidos</th>
			<td>
				<input type="text" name="apellidos" value="<?php echo $params['datos']['apellidos'] ?>" pattern="([a-zA-Z]|\s){2,50}" required/>(Solo letras max 50)
			</td>
		</tr>
		<tr>
			<th>Direccion:</th><td><input type="text" name="direccion" value="<?php echo $params['datos']['direccion'] ?>" pattern="([a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\ ]){2,50}" required/>(solo letras max 100)</td>
		</tr>
		<tr>
			<th>Correo: </th>
			<td>
				<input type="text" name="correo" value="<?php echo $params['datos']['correo'] ?>" pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$" required/>(example@loquesea.algo)
			</td>
		</tr>
		<tr>
			<th>Nacionalidad:</th>
			<td>
				<input type="text" name="nacionalidad" value="<?php echo $params['datos']['nacionalidad'] ?>" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚ\ ]|\s){2,50}" required/>(Solo letras max 50)
			</td>
		</tr>
		<tr>
			<th>Fecha nacimiento</th>
			<td>
				<input type="text" pattern="^([0][1-9]|[12][0-9]|3[01])(\/|-)([0][1-9]|[1][0-2])\2(\d{4})$" name="fecha" value="<?php echo $params['datos']['fecha'] ?>"required/>(dd/mm/aaaa)
			</td>
		</tr>
		<tr><th>Sexo</th>
		<td>
			<select name="sexo">
				<option value="Hombre" <?php if($params['datos']['sexo']=="Hombre") echo "selected"; ?>>Hombre</option>
				<option value="Mujer" <?php if($params['datos']['sexo']=="Mujer") echo "selected"; ?>>Mujer</option>
			</select>
		</td>
	</tr>
		<th>Titulos</th>
		<td>
			<?php foreach ($params['opctitulos'] as $titulo) :
					if(in_array($titulo['idciclo'], $params['titulos'])){?>

				    <?php echo $titulo['abreviatura'] ?><input type="checkbox" name="titulos[]" value="<?php echo $titulo['abreviatura'] ?>" checked >
			<?php }else{ echo $titulo['abreviatura'] ?><input type="checkbox" name="titulos[]" value="<?php echo $titulo['abreviatura'] ?>">

			<?php }
				
			 endforeach; ?>
		</td>
	</tr>
	<tr>
		<th>Idiomas</th>
		<td>
			<textarea name="idiomas"><?php echo $params['datos']['idiomas'] ?></textarea>(ejemplo: Ingles:alto, Frances:medio)
		</td>
	</tr>
	<tr>
		<th>Estado Laboral:</th>
		<td>
			<select name="estado">
				<option value="Parado" <?php if($params['datos']['estado']=="Parado") echo "selected"; ?>>Parado</option>
				<option value="Estudiando" <?php if($params['datos']['estado']=="Estudiando") echo "selected"; ?>>Estudiando</option>
				<option value="Trabajando" <?php if($params['datos']['estado']=="Trabajando") echo "selected"; ?>>Trabajando</option>
			</select>
		</td>
	</tr>
	<tr>
		<th>Capacidad de Transporte:</th>
		<td>
			<select name="transporte">
				<option value="No" <?php if($params['datos']['transporte']=="No") echo "selected"; ?>>No</option>
				<option value="Si" <?php if($params['datos']['transporte']=="Si") echo "selected"; ?>>Si</option>
			</select>
		</td>
	</tr>
	<tr>
		<th>Experiencia Laboral:</th>
		<td>
			<textarea name="experiencia"><?php echo $params['datos']['experiencia'] ?></textarea>(max 500 separa por comas ejemplo: 3 meses camarero, 2 dias...)
		</td>
	</tr>
	<tr>
		<th>Otras Informaciones</th>
		<td>
			<textarea name="otros"><?php echo $params['datos']['otros'] ?></textarea>(max 500)
		</td>
	</tr>
	</table>
	<input type="submit" value="insertar" name="insertar" />
</form>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>