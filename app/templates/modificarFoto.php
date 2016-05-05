<?php ob_start() ?>
<img class="perfil" src="<?php echo $params['url'] ?>">
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>