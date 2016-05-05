<?php ob_start() ?>
<?php if(isset($params['mensaje'])) :?>
<b><span style="color: red;"><?php echo $params['mensaje'] ?></span></b>
<?php endif; ?>
<br/>
<form method="POST" action="index.php?ctl=crearOferta">

<table>
	<tr>
		<th>Titulo</th>
		<td><input type="text" name="titulo"  value="<?php echo $params['titulo'] ?>" pattern="([a-zA-Z]|\s){2,50}" required/>(Solo letras. Max 50)</td>
	</tr>
	<tr>
		<th>Desripcion</th>
		<td><textarea name="descripcion" pattern="([a-zA-Z]|\s){2,50}" required><?php echo $params['descripcion'] ?></textarea>(Solo letras. Max 250)</td>
	</tr>

	<tr>
		<th>Contrato</th>
		<td>
			<select class="actividad" name="contrato" required>
	            <option value="Indefinido" <?php if(isset($_POST['contrato'])){ if($_POST['contrato']=='Indefinido'){ echo "selected";}}?>>Indefinido</option>
	            <option value="Temporal" <?php if(isset($_POST['contrato'])){ if($_POST['contrato']=='Temporal'){ echo "selected";}}?>>Temporal</option>
	            <option value="Formación" <?php if(isset($_POST['contrato'])){ if($_POST['contrato']=='Formación'){ echo "selected";}}?>>Formación</option>
	            <option value="Practicas" <?php if(isset($_POST['contrato'])){ if($_POST['contrato']=='Practicas'){ echo "selected";}}?>>Practicas</option>
		    </select>
		</td>
	</tr>
	<tr>
		<th>Jornada</th>
		<td>
			<select class="actividad" name="jornada" required>			
	            <option value="Tiempo Completo"<?php if(isset($_POST['jornada'])){ if($_POST['jornada']=='Tiempo Completo') echo "selected";} ?>>Tiempo Completo</option>
	            <option value="Tiempo Parcial"<?php if(isset($_POST['jornada'])){ if($_POST['jornada']=='Tiempo Parcial')  echo "selected";} ?>>Tiempo Parcial</option>
	            <option value="Parcial por Horas"<?php if(isset($_POST['jornada'])){ if($_POST['jornada']=='Parcial por Horas') echo "selected";} ?>>Parcial por Horas</option>
        	</select>
		</td>
	</tr>
	<tr>
		<th>Salario</th>
		<td>
			<select class="actividad" name="salario" required>
	            <option value="No Especificado" <?php if(isset($_POST['salario'])){ if($_POST['salario']=='No Especificado') echo "selected";} ?>>No Especificad</option>
	            <option value="Menos de 9.000" <?php if(isset($_POST['salario'])){ if($_POST['salario']=='Menos de 9.000') echo "selected";} ?>>Menos de 9.000</option>
	            <option value="Entre 9.000 y 15.000" <?php if(isset($_POST['salario'])){ if($_POST['salario']=='Entre 9.000 y 15.000') echo "selected";} ?>>Entre 9.000 y 15.000</option>
	            <option value="Entre 15.000 y 20.000" <?php if(isset($_POST['salario'])){ if($_POST['salario']=='Entre 15.000 y 20.000') echo "selected";} ?>>Entre 15.000 y 20.000</option>
	            <option value="Más de 20.000" <?php if(isset($_POST['salario'])){ if($_POST['salario']=='Más de 20.000') echo "selected";} ?>>Más de 20.000</option>
        	</select>
		</td>
	</tr>
	<tr>
		<th>
				Competencias exigidas
				<div class="aptos">Alumnos<br>Aptos: <br><b id="alumnos">todos</b></div>
		</th>
		<td >
		<a id="desple" onclick="desplegarCompe()">Desplegar competencias</a>
		<div id="competencias" style="display: none">
		<?php $cont=0; ?>
			<?php foreach ($params['opccompe'] as $competencia) : ?> 
				<?php $idcom=$competencia['idcompetencia']; ?>
				<?php //var_dump($params['opccompe']) ?>
				<?php if(isset($_POST['competencias'])){ ?>
				<?php 	if(in_array($competencia['competencia'],$_POST['competencias'])){ ?>
				}
				<div class="radio"><input onclick="alumnosAptos(<?php echo $cont; ?>, <?php echo $idcom ?>)" type="checkbox" name="competencias[]" value="<?php echo $competencia['competencia'] ?>" checked><?php echo $competencia['competencia'] ?></div>
					<?php }else{  ?>
					 <div class="radio"><input onclick="alumnosAptos(<?php echo $cont; ?>, <?php echo $idcom ?>)" type="checkbox" name="competencias[]" value="<?php echo $competencia['competencia'] ?>"><?php echo $competencia['competencia'] ?></div>
					<?php } ?>
				<?php }else{ ?>
	            <div class="radio"><input onclick="alumnosAptos(<?php echo $cont; ?>, <?php echo $idcom ?>)" type="checkbox" name="competencias[]" value="<?php echo $competencia['competencia'] ?>"><?php echo $competencia['competencia'] ?></div>
	        <?php } 
	        $cont++;
	        endforeach; ?>
    	</div>
    	<div class="radio" id="ocul" style="display: none"><a  onclick="ocultarCompe()" >Ocultar competencias</a><div>
		</td>
	</tr>
	<tr>
		<th>Zona</th>
		<td>
			<select name="zona">
				<option value="San Antonio Abad" <?php if(isset($_POST['zona'])){ if("San Antonio Abad"==$_POST['zona']) echo "selected";} ?>>San Antonio Abad</option>
				<option value="San Juan Bautista" <?php if(isset($_POST['zona'])){ if("San Juan Bautista"==$_POST['zona']) echo "selected";} ?>>San Juan Bautista</option>
				<option value="Santa Eularia del Río" <?php if(isset($_POST['zona'])){ if("Santa Eularia del Río"==$_POST['zona']) echo "selected";} ?>>Santa Eularia del Río</option>
				<option value="Ibiza" <?php if(isset($_POST['zona'])){ if("Ibiza"==$_POST['zona']) echo "selected";} ?>>Ibiza</option>
				<option value="San José" <?php if(isset($_POST['zona'])){ if("San José"==$_POST['zona']) echo "selected";} ?>>San José</option>
			</select>
		</td>
	</tr>
          
    </table>
    <input type="submit" value="insertar" name="insertar" />
</table>
	
</form>

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>