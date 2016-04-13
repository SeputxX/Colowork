<?php ob_start() ?>
<?php if(isset($params['mensaje'])) :?>
<b><span style="color: red;"><?php echo $params['mensaje'] ?></span></b>
<?php endif; ?>
<br/>
<form method="POST" action="index.php?ctl=crearOferta">

<table>
	<tr>
		<th>Titulo</th>
		<td><input type="text" name="titulo" pattern="([a-zA-Z]|\s){2,50}" required/>(Solo letras. Max 50)</td>
	</tr>
	<tr>
		<th>Desripcion</th>
		<td><input type="text" name="descripcion" pattern="([a-zA-Z]|\s){2,50}" required/>(Solo letras. Max 250)</td>
	</tr>
	<tr>
		<th>Ubicacion</th>
		<td><input type="text" name="ubicacion" pattern="([a-zA-Z]|\s){2,50}" required/>(Solo letras. Max 50)</td>
	</tr>
	<tr>
		<th>Contrato</th>
		<td>
			<select class="actividad" name="contrato" required>
				<?php foreach ($params['opccontrato'] as $contrato) : ?> 
		            <option value="<?php echo $contrato['nombre'] ?>"><?php echo $contrato['nombre'] ?></option>
		        <?php  endforeach; ?>
	        </select>
		</td>
	</tr>
	<tr>
		<th>Jornada</th>
		<td>
			<select class="actividad" name="jornada" required>
			<?php foreach ($params['opcjornada'] as $jornada) : ?> 
	            <option value="<?php echo $jornada['nombre'] ?>"><?php echo $jornada['nombre'] ?></option>
	        <?php  endforeach; ?>
        	</select>
		</td>
	</tr>
	<tr>
		<th>Salario</th>
		<td>
			<select class="actividad" name="salario" required>
			<?php foreach ($params['opcsalario'] as $salario) : ?> 
	            <option value="<?php echo $salario['nombre'] ?>"><?php echo $salario['nombre'] ?></option>
	        <?php  endforeach; ?>
        </select>
		</td>
	</tr>
	<tr>
           <td></td><td><input type="hidden" name="idempresa" value="<?php echo $params['idempresa'] ?>"/></td>
        </tr>
    </table>
    <input type="submit" value="insertar" name="insertar" />
</table>
	
</form>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>