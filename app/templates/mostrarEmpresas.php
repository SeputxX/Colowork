<?php ob_start() ?>
<div class="empresas">
<?php if(isset($params['mensaje'])) :?>
    <b><span style="color: red;"><?php echo $params['mensaje'] ?></span></b>
<?php endif; ?>
     <?php foreach ($params['empresas'] as $empresa) :?>
        <div class="empresa">
        <div class="imgEmpresa">
            <img src="../web/img/empresas/3_White_logo_on_color1_75x87.png">
        </div>
        <div class="datosEmpresa">
             <b>Nombre: </b><a href="index.php?ctl=verEmpresa&id=<?php echo $empresa['iduser']?>"><?php echo $empresa['nombre'] ?></a><br>
             <b>Campo:</b> <?php echo $empresa['actividad']?></br>
             <b>Razon:</b> <?php echo $empresa['razon']?></br>
             <b>País:</b> <?php echo $empresa['pais']?></br>
             <b>Provincia:</b> <?php echo $empresa['provincia']?></br>
         </div>
        </div>
     
     <?php endforeach; ?>
 </div>

 <?php $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>