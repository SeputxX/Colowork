 <?php ob_start() ?>
<img class="imgini" src="../web/img/conferencia.jpg">
<h1 style="text-align: center">Bienvenido a ColoWork</h1> 
 <p><h1  style="text-align: center">Ofertas de trabajo IES Sacolomina <?php echo $params['fecha'] ?></h1></p>

 <div class="ofertas">
	<table>	
				<?php for($i=0; $i<5;$i++) {?>
					<tr><th class="ttabla">Oferta de<a href="index.php?ctl=verEmpresa&id=<?php echo $params['ofertas'][$i]['iduser'] ?>"> <?php echo $params['ofertas'][$i]['nombre'] ?></a></th></tr>
					<tr class="endOfe">
						<td>
							<h3><?php echo $params['ofertas'][$i]['titulo'] ?></h3>
							<b><?php echo $params['ofertas'][$i]['zona'] ?></b>
							<p class="descof"><?php echo $params['ofertas'][$i]['descripcion'] ?></p>
							<b>Competencias exigidas</b>
							<p class="descof"><?php echo $params['ofertas'][$i]['competencias'] ?></p>
							<ul>
								<li class="divider"><?php echo $params['ofertas'][$i]['contrato'] ?></li>
								<li class="divider"><?php echo $params['ofertas'][$i]['jornada'] ?></li> 
								<li class="divider"><?php echo $params['ofertas'][$i]['salario'] ?></li>
							</ul>
						</td>
					</tr>
				<?php } ?>
	</table>
</div>

 <?php $contenido = ob_get_clean() ?>
 <?php include 'layout.php' ?>