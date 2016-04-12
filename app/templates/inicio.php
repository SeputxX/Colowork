 <?php ob_start() ?>
<img class="imgini" src="../web/img/conferencia.jpg">
 <h1>Bienvenido a ColoWork</h1>
 <h3> Fecha: <?php echo $params['fecha'] ?></h3>
 
 <?php echo $params['mensaje'] ?>

 <?php $contenido = ob_get_clean() ?>
 <?php include 'layout.php' ?>