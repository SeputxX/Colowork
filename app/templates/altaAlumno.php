<?php ob_start() ?>
<?php if(isset($params['mensaje'])) :?>
<b><span style="color: red;"><?php echo $params['mensaje'] ?></span></b>
<?php endif; ?>
<form method="POST" action="index.php?ctl=altaAlumno">
	<table>
		<tr>
			<th>Nombre:</th>
			<td>
				<input type="text" name="nombre" value="<?php echo $params['nombre'] ?>" pattern="([a-zA-Z]|\s){2,50}" required/>(Solo letras max 50)
			</td>
		</tr>
		<tr>
			<th>Clave Acceso:</th>
			<td>
				<input type="password" name="pass" value="<?php echo $params['pass'] ?>" pattern="[A-Za-z0-9!?-]{8,20}" required />(Letras y Numeros. Min=8. Max=20)
			</td>
		</tr>
		<tr>
			<th>Apellidos</th>
			<td>
				<input type="text" name="apellidos" value="<?php echo $params['apellidos'] ?>" pattern="([a-zA-Z]|\s){2,50}" required/>(Solo letras max 50)
			</td>
		</tr>
		<tr>
			<th>Direccion:</th><td><input type="text" name="direccion" value="<?php echo $params['direccion'] ?>" pattern="([a-zA-Z]|\s){2,100}" required/>(solo letras max 100)</td>
		</tr>
		<tr>
			<th>Correo: </th>
			<td>
				<input type="text" name="correo" value="<?php echo $params['correo'] ?>" pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$" required/>(example@loquesea.algo)
			</td>
		</tr>
		<tr>
			<th>Nacionalidad:</th>
			<td>
				<input type="text" name="nacionalidad" value="<?php echo $params['nacionalidad'] ?>" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚ\ ]|\s){2,50}" required/>(Solo letras max 50)
			</td>
		</tr>
		<tr>
			<th>Fecha nacimiento</th>
			<td>
				<input type="text" pattern="^([0][1-9]|[12][0-9]|3[01])(\/|-)([0][1-9]|[1][0-2])\2(\d{4})$" name="fecha" value="<?php echo $params['fecha'] ?>"required/>(dd/mm/aaaa)
			</td>
		</tr>
		<tr><td>Sexo</td>
		<td>
			<select name="sexo">
				<option value="Hombre">Hombre</option>
				<option value="Mujer">Mujer</option>
			</select>
		</td>
	</tr>
	
	<tr>
		<th>Titulos</th>
		<td>
			<?php foreach ($params['opctitulos'] as $titulo) :?>

				<?php echo $titulo['abreviatura'] ?><input type="checkbox" name="titulos[]" value="<?php echo $titulo['abreviatura'] ?>">

			<?php endforeach; ?>
		</td>
	</tr>
	<tr>
		<th>Idiomas</th>
		<td>
			<textarea name="idiomas"><?php echo $params['idiomas'] ?></textarea>(ejemplo: Ingles:alto, Frances:medio)
		</td>
	</tr>
	<tr>
		<th>Estado Laboral:</th>
		<td>
			<select name="estado_laboral" value="<?php echo $params['estado_laboral'] ?>">
				<option value="Parado">Parado</option>
				<option value="Estudiando">Estudiando</option>
				<option value="Trabajando">Trabajando</option>
			</select>
		</td>
	</tr>
	<tr>
		<th>Capacidad de Transporte:</th>
		<td>
			<select name="transporte">
				<option value="No">No</option>
				<option value="Si">Si</option>
			</select>
		</td>
	</tr>
	<tr>
		<th>Experiencia Laboral:</th>
		<td>
			<textarea name="experiencia"><?php echo $params['experiencia'] ?></textarea>(max 500 separa por comas ejemplo: 3 meses camarero, 2 dias...)
		</td>
	</tr>
	<tr>
		<th>Otras Informaciones</th>
		<td>
			<textarea name="otros"><?php echo $params['otros'] ?></textarea>(max 500)
		</td>
	</tr>
	<tr>
		<th>Codigo Centro:</th>
		<td>
			<input type="text" name="codigo" value="<?php echo $params['codigo'] ?>" pattern="[a-zA-Z0-9]{6}">(Numero y letras 6 caracteres)Codigo sacolomina Q2W3E4</td>
		</tr>
		
		<input type="hidden" name="rol" value="alumno"/>
		
	</table>
	<input type="submit" value="insertar" name="insertar" />
</form>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>