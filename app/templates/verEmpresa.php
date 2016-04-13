<?php ob_start() ?>
<div class="container col-xs-12 col-sm-4 col-lg-4 col-md-4">
	<table class="empresa">
		<tr><th class="ttabla">ID Empresa:</th><td><?php echo $params['empresa']['idempresa'] ?></td></tr>
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
	</table>
</div>
<div class="container col-xs-12 col-sm-8 col-lg-8 col-md-8">
	<table>
		<tr><th class="ttabla">Ofertas de <?php echo $params['empresa']['nombre'] ?></th></tr>
			<?php foreach ($params['ofertas'] as $oferta) :?>
				<tr class="endOfe">
					<td>
						<h3><?php echo $oferta['titulo'] ?></h3>
						<b><?php echo $oferta['ubicacion'] ?></b>
						<p class="descof"><?php echo $oferta['descripcion'] ?></p>
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