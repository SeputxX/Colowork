<?php ob_start() ?>
<?php if(isset($params['mensaje'])) :?>
<b><span style="color: red;"><?php echo $params['mensaje'] ?></span></b>
<?php endif; ?>
<form method="POST" action="index.php?ctl=altaCentro">
	<table>
		<tr>
			<td>Nombre</td><td><input type="text" name="nombre" value="<?php echo $params['nombre'] ?>"pattern="([a-zA-Z]|\s){2,50}" required> (Solo letras max 50)</td>
		</tr>
		<tr>
			<td>Contraseña</td><td><input name="pass" value="<?php echo $params['pass'] ?>" type="password" pattern="[A-Za-z0-9!?-]{8,20}" required>(Letras y Numeros. Min=8. Max=20)</td>
		</tr>
		<tr>
			<td>Apellidos</td><td><input name="apellidos" value="<?php echo $params['apellidos'] ?>" type="text"pattern="([a-zA-Z]|\s){2,100}" required> (Solo letras max 50)</td>
		</tr>
		<tr>
			<th>Correo: </th>
			<td>
				<input type="text" name="correo" value="<?php echo $params['correo'] ?>" pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$" required/>(example@loquesea.algo)
			</td>
		</tr>
		<tr>
			<th>Ocupacion</th>
			<td><textarea name="ocupacion"><?php echo $params['ocupacion']?></textarea></td>
		</tr>
		<input type="hidden" name="rol" value="centro">
	</table>
	<input type="submit" value="insertar" name="insertar" />
</form>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>