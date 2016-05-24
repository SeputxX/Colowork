<?php ob_start() ?>
<?php if(isset($params['mensaje'])) :?>
<b><span style="color: red;"><?php echo $params['mensaje'] ?></span></b>
<?php endif; ?>
<div class="zona6">
<form action="index.php?ctl=altaCiclo" method="POST">


			<b>Nombre:</b>
			<br>
				<input type="text" name="nombre" value="<?php echo $params['nombre'] ?>"pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚ\ ]|\s){2,200}" required> Solo letras max 50 <p></p>
			<b>
				Abreviatura:
			</b>
			<br>
				<input type="text" name="abreviatura" value="<?php echo $params['abreviatura'] ?>"pattern="([a-zA-Z]|\s){2,4}" required> Solo letras max 4 <p></p>
			
			<b>
				Descripcion:
			</b>
			<br>
				<textarea name="descripcion"><?php echo $params['descripcion'] ?></textarea>max 500
			<p></p>
			<b>
				Competencias:
			</b>
			<br>
				<textarea name="competencias"><?php echo $params['competencias'] ?></textarea>separado por ".", max 1000
<div class="insertar2">
	<input type="submit" value="insertar" name="insertar" />
</div>

</form>
</div>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>