<?php ob_start() ?>

<table>
	<tr>
		<th>Nombre</th>
		<td><?php echo $params['profesor']['nombre']?></td>
	</tr>
	<tr>
		<th>Apellidos</th>
		<td><?php echo $params['profesor']['apellidos']?></td>
	</tr>
	<tr>
		<th>Correo</th>
		<td><?php echo $params['profesor']['correo']?></td>
	</tr>
	<tr>
		<th>Ocupacion</th>
		<td><?php echo $params['profesor']['ocupacion']?></td>
	</tr>
	<?php if(isset($_SESSION['user'])){
			if($_SESSION['id']==$params['profesor']['iduser']){
	 ?>
	 <tr>
	 	<td><a href="index.php?ctl=modificarPerfil">Modificar</a></td>
		
	 	<th><form name="form_hidden" method="POST" action="index.php?ctl=borrarPerfil">
		<input type="hidden" name="valor1" value="<?php echo $_SESSION['id'] ?>">
		<input type="button" value="Borrar" onClick="avisarBorrado()">
		</form></th>
	 </tr>
	 <?php 	}
 		  } ?>
</table>


<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>