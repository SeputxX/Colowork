<?php ob_start() ?>
<?php if(isset($params['mensaje'])) :?>
<b><span style="color: red;"><?php echo $params['mensaje'] ?></span></b>
<?php endif; ?>
<div class="menubusc">
	<form class="navbar-form navbar-left busofe" action="index.php?ctl=verOfertas" method="POST" role="search">
	    <div class="form-group">
	      <input type="text" name="buscar" class="form-control" placeholder="Buscar Ofertas">
	    </div>
	    <button type="submit" class="btn btn-default">Buscar</button>
	</form>
</div>
<div class="ofertas">
		
				<?php foreach ($params['ofertas'] as $oferta) :?>
					<div class="oferta">
						<div class="titOfe">
							Oferta de<a href="index.php?ctl=verEmpresa&id=<?php echo $oferta['iduser'] ?>"> <?php echo $oferta['nombre'] ?></a>
						</div>
						<div class="endOfe">
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
						</div>
					</div>
						
				<?php endforeach; ?>
	
</div>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>