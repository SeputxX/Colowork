<?php ob_start() ?>
<?php if(isset($params['mensaje'])) :?>
<b><span style="color: red;"><?php echo $params['mensaje'] ?></span></b>
<?php endif; ?>
<form method="POST" action="index.php?ctl=altaCentro">

	<div class="zona">
		<div class="acceso">
		<legend>Datos de Acceso</legend>
            <b>Nombre Acceso:</b><br><input type="text" name="user" value="<?php echo $params['user']?>" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required />Solo letras. Max 48)<p></p>
        	
			<b>Contraseña</b><br><input name="pass" value="<?php echo $params['pass'] ?>" type="password" pattern="[A-Za-z0-9!?-]{8,20}" required>Letras y Numeros. Min 8 Max 20 <p></p>
		</div>
	</div>
	<div class="zona2">
		<div class="acceso" style="text-align: left">
		<legend>Datos Personales</legend>
			<b>Nombre:</b><br><input type="text" name="nombre" value="<?php echo $params['nombre'] ?>" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚ\ ]|\s){2,50}" required> Solo letras max 50 <p></p>		
		
			<b>Apellidos</b><br><input name="apellidos" value="<?php echo $params['apellidos'] ?>" type="text"pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚ\ ]|\s){2,50}" required> Solo letras max 50 <p></p>
		
			<b>Correo: </b>
			<br>
				<input type="text" name="correo" value="<?php echo $params['correo'] ?>" pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$" required/>example@loquesea.algo
			<p></p>
	
			<b>Ocupación</b>
			<br><textarea name="ocupacion"><?php echo $params['ocupacion']?></textarea> <p></p>
		</div>
	</div>
	
		<input type="hidden" name="rol" value="centro">
	<input type="submit" value="insertar" name="insertar" />
</form>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>