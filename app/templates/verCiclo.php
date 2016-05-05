<?php ob_start() ?>
<?php if(isset($params['mensaje'])) :?>
<b><span style="color: red;"><?php echo $params['mensaje'] ?></span></b>
<?php endif; ?>
<?php if(isset($params['ciclo'])) :?>
<table class="ciclo">
<tr>
	<th><?php echo $params['ciclo']['abreviatura'] ?></th>
</tr>
<tr>
	<td><?php echo $params['ciclo']['descripcion'] ?></td>
</tr>
<tr>
	<td>
		<ul><?php foreach ($params['ciclo']['competencias'] as $competencia) :
			echo "<li>".$competencia."</li>";
			endforeach;?>
		</ul>
	</td>
</tr>
</table>
<?php endif; ?>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>