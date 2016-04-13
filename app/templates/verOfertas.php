<?php ob_start() ?>
<div class="menubusc">
	<form class="navbar-form navbar-left busofe" action="index.php?ctl=verOfertas" method="POST" role="search">
	    <div class="form-group">
	      <input type="text" name="buscar" class="form-control" placeholder="Buscar...">
	    </div>
	    <button type="submit" class="btn btn-default">Buscar</button>
	</form>
</div>
<div class="ofertas">
	<table>	
				<?php foreach ($params['ofertas'] as $oferta) :?>
					<tr><th class="ttabla">Oferta de<a href="index.php?ctl=verEmpresa&id=<?php echo $oferta['idempresa'] ?>"> <?php echo $oferta['nombreEmp'] ?></a></th></tr>
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