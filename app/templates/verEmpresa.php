<?php ob_start() ?>
<div class="container col-xs-12 col-sm-4 col-lg-4 col-md-4">
	<table class="empresa">
		<tr><th colspan="2">Perfil</th></tr>
		<tr><th class="ttabla">ID Empresa:</th><td><?php echo $params['empresa']['iduser'] ?></td></tr>
		<tr><th class="ttabla">Nombre:</th><td><?php echo $params['empresa']['nombre'] ?></td></tr>
		<tr><th class="ttabla">Actividad</th><td><?php echo $params['empresa']['actividad'] ?></td></tr>
		<tr><th class="ttabla">ID Fiscal</th><td><?php echo $params['empresa']['idfiscal'] ?></td></tr>
		<tr><th class="ttabla">Razon</th><td><?php echo $params['empresa']['razon'] ?></td></tr>
		<tr><th class="ttabla">Direccion</th><td><?php echo $params['empresa']['direccion'] ?></td></tr>
		<tr><th class="ttabla">Poblacion</th><td><?php echo $params['empresa']['poblacion'] ?></td></tr>
		<tr><th class="ttabla">Pais</th><td><?php echo $params['empresa']['pais'] ?></td></tr>
		<tr><th class="ttabla">Provincia</th><td><?php echo $params['empresa']['provincia'] ?></td></tr>
		<tr><th class="ttabla">Codigo Postal</th><td><?php echo $params['empresa']['codpostal'] ?></td></tr>
		<tr><th class="ttabla">Telefono</th><td><?php echo $params['empresa']['telefono'] ?></td></tr>
		<tr><th class="ttabla">Fax</th><td><?php echo $params['empresa']['fax'] ?></td></tr>
		<?php if(isset($_SESSION['id'])){
		
				if($_SESSION['id']== $params['empresa']['iduser']){					
		 ?>
		 <tr>
			 <th class="ttabla"><a href="index.php?ctl=modificarPerfil">Modificar</a></th>
			 <th><form name="form_hidden" method="POST" action="index.php?ctl=borrarPerfil">
			<input type="hidden" name="valor1" value="<?php echo $_SESSION['id'] ?>">
			<input type="button" value="Borrar" onClick="avisarBorrado()">
			</form></th>
		 </tr>
		<?php 	}
			  } ?>
		
	</table>
</div>

<div class="ofertas">
	<table>	
				<?php foreach ($params['ofertas'] as $oferta) :?>
					<tr class="endOfe">
						<td>
							<h3><?php echo $oferta['titulo'] ?></h3>
							<b><?php echo $oferta['zona'] ?></b>
							<p class="descof"><?php echo $oferta['descripcion'] ?></p>
							<b>Competencias exigidas</b>
							<p class="descof"><ul><li><?php echo $oferta['competencias'] ?></ul></p>
							<ul>
								<li class="divider"><?php echo $oferta['contrato'] ?></li>
								<li class="divider"><?php echo $oferta['jornada'] ?></li> 
								<li class="divider"><?php echo $oferta['salario'] ?></li>
							</ul>
						</td>
					</tr>
				<?php endforeach; ?>
	</table>
</div>
<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>