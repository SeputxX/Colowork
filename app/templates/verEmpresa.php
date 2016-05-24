<?php ob_start() ?>
<div class="grupo">
	<div class="empresa1">
		<legend>Datos Empresa</legend>
		<b>ID Empresa: </b><?php echo $params['empresa']['iduser'] ?><br>
		<b>Nombre: </b><?php echo $params['empresa']['nombre'] ?><br>
		<b>Actividad: </b><?php echo $params['empresa']['actividad'] ?><br>
		<b>ID Fiscal: </b><?php echo $params['empresa']['idfiscal'] ?><br>
		<b>Razon: </b><?php echo $params['empresa']['razon'] ?><br>		
	</div>
	<div class="empresa1">
		<legend>Datos Ubicacion: </legend>
		<b>Pais: </b><?php echo $params['empresa']['pais'] ?><br>
		<b>Provincia: </b><?php echo $params['empresa']['provincia'] ?><br>
		<b>Codigo Postal: </b><?php echo $params['empresa']['codpostal'] ?><br>
		<b>Poblacion: </b><?php echo $params['empresa']['poblacion'] ?><br>
		<b>Direccion: </b><?php echo $params['empresa']['direccion'] ?><br>		
	</div>
	<div class="empresa1">
		<legend>Datos Contacto </legend>
		<b>Telefono: </b><?php echo $params['empresa']['telefono'] ?><br>
		<b>Fax: </b><?php echo $params['empresa']['fax'] ?><br>
	</div>
		<?php if(isset($_SESSION['id'])){
		
				if($_SESSION['id']== $params['empresa']['iduser']){					
		 ?>
		 	<div class="empresa1">
		 	<legend> Panel de Control </legend>
				 <button class="btn"><a href="index.php?ctl=modificarPerfil">Modificar</a></button>
				 <form name="form_hidden" method="POST" action="index.php?ctl=borrarPerfil">
					<input type="hidden" name="valor1" value="<?php echo $_SESSION['id'] ?>">
					<button class="btn" type="button" value="Borrar" onClick="avisarBorrado()">Borrar</button>
				</form>
			</div>


		 
		<?php 	}
			  } ?>
</div>

<div class="zona3">
	<div class="ofertas2">	
			<?php foreach ($params['ofertas'] as $oferta) :?>
				<div class="endOfe">
					<td>
						<h3><?php echo $oferta['titulo'] ?></h3>
						<b><?php echo $oferta['zona'] ?></b>
						<p class="descof"><?php echo $oferta['descripcion'] ?></p>
						<b>Competencias exigidas</b>
						<p class="descof"><ul><li><?php echo $oferta['competencias'] ?></li></ul></p>
						<ul>
							<li class="divider"><?php echo $oferta['contrato'] ?></li>
							<li class="divider"><?php echo $oferta['jornada'] ?></li> 
							<li class="divider"><?php echo $oferta['salario'] ?></li>
						</ul>
					</td>
				</div>
			<?php endforeach; ?>
	</div>
</div>
<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>