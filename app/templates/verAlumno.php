<?php ob_start() ?>
<div class="ficha">
	<table class="curriculum">
		<tr>
			<td class="sepa"><br><b>Formato europeo <br> para el <br> Curriculum <br></b><img class="bandera" src="img/bandera-europa.png"></td>
			<td class="datos"><br><img class="perfil" src="img/logo.png"></td>
		</tr>
		<tr>
			<th class="sepa">Datos</th>
			<td class="datos"></td>
		</tr>
		<tr>
			<td class="sepa">Apellidos/Nombre</td>
			<td class="datos"><?php echo $params['alumno']['apellidos'] ?>&nbsp<?php echo $params['alumno']['nombre'] ?></td>
		</tr>
		<tr>
			<td class="sepa">sexo</td>
			<td class="datos"><?php echo $params['alumno']['sexo'] ?></td>
		</tr>
		<tr>
			<td class="sepa">Direccion</td>
			<td class="datos"><?php echo $params['alumno']['direccion'] ?></td>
		</tr>
		<tr>
			<td class="sepa">Correo</td>
			<td class="datos"><?php echo $params['alumno']['correo'] ?></td>
		</tr>
		<tr>
			<td class="sepa">Nacionalidad</td>
			<td class="datos"><?php echo $params['alumno']['nacionalidad'] ?></td>
		</tr>
		<tr>
			<td class="sepa">Fecha Nacimiento</td>
			<td class="datos"><?php echo $params['alumno']['fecha'] ?></td>
		</tr>
		<tr>
			<th class="sepa">Educacion y Formacion</th>
			<td class="datos"></td>
		</tr>
		<tr>
			<td class="sepa">Titulos</td>
			<td class="datos"><?php echo $params['alumno']['titulos'] ?></td>
		</tr>
		<tr>
			<td class="sepa">Idiomas</td>
			<td class="datos"><?php echo $params['alumno']['idiomas'] ?></td>
		</tr>
		<tr>
			<td class="sepa">Experiencia</td>
			<td class="datos"><?php echo $params['alumno']['experiencia'] ?></td>
		</tr>
		<tr>
			<td class="sepa">Transporte Propio</td>
			<td class="datos"><?php echo $params['alumno']['transporte'] ?></td>
		</tr>
		<tr>
			<td class="sepa">Otras informaciones<br></td>
			<td class="datos"><?php echo $params['alumno']['otros'] ?><br></td>
		</tr>
	</table>
</div>

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>