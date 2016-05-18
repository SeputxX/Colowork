<?php ob_start() ?>
<?php if(isset($params['mensaje'])) :?>
<b><span style="color: red;"><?php echo $params['mensaje'] ?></span></b>
<?php endif; ?>
<?php if(isset($params['ciclo'])) :?>
	<div class="desc">
		<b><?php echo $params['ciclo']['abreviatura'] ?></b><br>
		<?php echo $params['ciclo']['descripcion'] ?>
	</div>
	<div class="compe">	
	<b>Competencias:</b>
		<ul><?php foreach ($params['ciclo']['competencias'] as $competencia) :
			echo "<li>".$competencia."</li>";
			endforeach;?>
		</ul>
	</div>
<?php endif; ?>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>