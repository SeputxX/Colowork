<?php ob_start() ?>
<?php if(isset($params['mensaje'])) :?>
<b><span style="color: red;"><?php echo $params['mensaje'] ?></span></b>
<?php endif; ?>
<br/>
<form method="POST" action="index.php?ctl=crearOferta">

<table>
	<tr>
		<th>Titulo</th>
		<td><input type="text" name="titulo" pattern="[a-zA-Z]{50}" required/>(Solo letras. Max 50)</td>
	</tr>
	<tr>
		<th>Desripcion</th>
		<td><input type="text" name="descripcion" pattern="[a-zA-Z]{250}" required/>(Solo letras. Max 250)</td>
	</tr>
	<tr>
		<th>Ubicacion</th>
		<td><input type="text" name="ubicacion" pattern="[a-zA-Z]{50}" required/>(Solo letras. Max 50)</td>
	</tr>
	<tr>
		<th>Contrato</th>
		<td>
			<?php foreach ($params['opact'] as $actividad) : ?> 
	            <option value="<?php echo $actividad['idactividad'] ?>"><?php echo $actividad['nombre'] ?></option>
	        <?php  endforeach; ?>
		</td>
	</tr>
	<tr>
		<th>Jornada</th>
		<td></td>
	</tr>
	<tr>
		<th>Salario</th>
		<td></td>
	</tr>
</table>
	
</form>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>