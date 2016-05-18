<?php ob_start() ?>
<?php if(isset($params['mensaje'])) :?>
<b><span style="color: red;"><?php echo $params['mensaje']?></span></b>
<?php endif; ?>
<?php if(!empty($params['resultados']['alumnos'])){ ?>
<h2 class="aviso">Alumnos</h2>
<div class="container">	
	<?php foreach ($params['resultados']['alumnos'] as $alumno) :?>
			<div class="alumno2">                     
            <div class="info3">
              <b>Nombre: </b><?php echo $alumno['nombre']?><br><b>Apellidos:</b> <?php echo $alumno['apellidos']?><br>
              <b>Direccion: </b><?php echo $alumno['direccion']?><br>
              <b>Fecha Nacimiento: </b><?php echo $alumno['fecha']?><br>
              <b>Estado: </b><?php echo $alumno['estado']?><br>
              <b>Transporte Propio: </b><?php echo $alumno['transporte']?><br>
              <b>Titulos: </b>
              <ul>
              <?php foreach ($alumno['titulos'] as $titulo) : ?>
              <li><?php echo $titulo ?>.</li>
              <?php endforeach; ?>
              </ul>             
            </div>
            <div class="controles">
                <a href="index.php?ctl=verAlumno&id=<?php echo $alumno['iduser'] ?>">Ver Perfil</a>
            </div>
      </div>
	<?php endforeach; ?>
</div>
<?php } ?>
<?php if(!empty($params['resultados']['profesores'])){ ?>
<h2 class="aviso">Profesores</h2>
<div class="container">
  <?php foreach ($params['resultados']['profesores'] as $profe) :?>
    <div class="profesor">
      <div class="imgD"><img class="imgP"  src="../<?php echo $alumno['url'] ?>" class="perfil"></div>
      <div class="info2">
        <b>Nombre: </b><?php echo $profe['nombre'] ?><br>
        <b>Apellidos: </b><?php echo $profe['apellidos'] ?><br> 
        <b>Correo: </b><?php echo $profe['correo'] ?><br>
        <b>Campo: </b><?php echo $profe['ocupacion'] ?><br>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<?php } ?>
<?php if(!empty($params['resultados']['empresas'])){ ?>
<h2 class="aviso">Empresas</h2>
  <div class="empresas">
  <?php foreach ($params['resultados']['empresas'] as $empresa) :?>
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

<?php } ?>
<?php if(!empty($params['resultados']['ofertas'])){ ?>
<h2 class="aviso">Ofertas</h2>
<div class="ofertas">
  
  <?php foreach ($params['resultados']['ofertas'] as $oferta) :?>
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
<?php } ?>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>