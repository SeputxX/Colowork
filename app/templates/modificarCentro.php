<?php ob_start() ?>
<?php if(isset($params['mensaje'])) :?>
<b><span style="color: red;"><?php echo $params['mensaje'] ?></span></b>
<?php endif; ?>
<br/>
<form method="POST" action="index.php?ctl=modificarPerfil">
	<table>
	    <tr>
            <th>Nombre Acceso *</th><td><input type="text" name="user" value="<?php echo $params['user']?>" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" required /></td><td class="requisitos">(Solo letras. Max=48)</td>
        </tr>
		<tr>
			<th>Nombre</th>
			<td>
				<input type="text" name="nombre" value="<?php echo $params['datos']['nombre'] ?>" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚ\ ]|\s){2,50}" required/>
			</td>
		</tr>
		<tr>
			<th>Apellidos</th>
			<td>
				<input type="text" name="apellidos" value="<?php echo $params['datos']['apellidos'] ?>" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚ\ ]|\s){2,50}" required/>
			</td>
		</tr>
		<tr>
			<th>Correo</th>
			<td>
				<input name="correo" type="text" value="<?php echo $params['datos']['correo'] ?>" pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$" required/>
			</td>
		</tr>
		<tr>
			<th>Ocupacion</th>
			<td>
				<textarea name="ocupacion"><?php echo $params['datos']['ocupacion'] ?></textarea>
			</td>
		</tr>

	</table>
	<input type="hidden" name="id" value="<?php echo $params['id'] ?>"/>
	<input type="submit" value="insertar" name="modificar" />
</form>
<?php

 ?>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>