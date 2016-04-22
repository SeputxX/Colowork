<?php ob_start() ?>
<?php if(isset($params['mensaje'])) :?>
<b><span style="color: red;"><?php echo $params['mensaje'] ?></span></b>
<?php endif; ?>

<form action="index.php?ctl=altaCiclo" method="POST">
	<table>
		<tr>
			<td>
				Nombre:
			</td>
			<td>
				<input type="text" name="nombre" value="<?php echo $params['nombre'] ?>"pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚ\ ]|\s){2,200}" required> (Solo letras max 50)
			</td>
		</tr>
		<tr>
			<td>
				Abreviatura:
			</td>
			<td>
				<input type="text" name="abreviatura" value="<?php echo $params['abreviatura'] ?>"pattern="([a-zA-Z]|\s){2,4}" required> (Solo letras max 4)
			</td>
		</tr>
		<tr>
			<td>
				Descripcion:
			</td>
			<td>
				<textarea name="descripcion"><?php echo $params['descripcion'] ?></textarea>(max 500)
			</td>
		</tr>
		<tr>
			<td>
				Competencias:
			</td>
			<td>
				<textarea name="competencias"><?php echo $params['competencias'] ?></textarea>(separado por ".", max 1000)
			</td>
		</tr>
		
	</table>
	<input type="submit" value="insertar" name="insertar" />
</form>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>