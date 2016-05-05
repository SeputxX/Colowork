<?php ob_start() ?>
<?php if(isset($params['mensaje'])) :?>
<b><span style="color: red;"><?php echo $params['mensaje']?></span></b>
<?php endif; ?>
<?php if(!empty($params['resultados']['alumnos'])){ ?>
<h2>Alumnos</h2>
<div class="container">	
	<?php foreach ($params['resultados']['alumnos'] as $alumno) :?>
			<table class="alumno">
					<tr>
						<td><img src="../web/img/logo.png" class="perfil"></td>
						<th>
						
						<b>Nombre: </b><?php echo $alumno['nombre']?>&nbsp<?php echo $alumno['apellidos']?><br>
								
						</th>
					</tr>	
					<tr>
						<td colspan="2">
							<b>Direccion: </b><?php echo $alumno['direccion']?><br>
							<b>Fecha Nacimiento: </b><?php echo $alumno['fecha']?><br>
							<b>Estado: </b><?php echo $alumno['estado']?><br>
							<b>Transporte Propio:</b><?php echo $alumno['transporte']?><br>
							<b>Titulos: </b><?php echo $alumno['titulos']?>.<br>
							<a href="index.php?ctl=verAlumno&id=<?php echo $alumno['iduser'] ?>">Ver Perfil</a>
						</td>
					</tr>						
					</table>
	<?php endforeach; ?>
</div>
<?php } ?>
<?php if(!empty($params['resultados']['profesores'])){ ?>
<h2>Profesores</h2>
<div class="container">
  <?php foreach ($params['resultados']['profesores'] as $profe) :?>
    <table class="profesor">
      <tr>
        <th>Nombre</th><td><?php echo $profe['nombre'] ?></td>
      </tr>
      <tr>
        <th>Apellidos</th><td><?php echo $profe['apellidos'] ?></td>
      </tr>
      <tr>
        <th>Correo</th><td><?php echo $profe['correo'] ?></td>
      </tr>
      <tr>
        <th>Campo</th><td><?php echo $profe['ocupacion'] ?></td>
      </tr>
    </table>
  <?php endforeach; ?>
</div>
<?php } ?>
<?php if(!empty($params['resultados']['empresas'])){ ?>
<h2>Empresas</h2>
<div class="container">
<table>
     <tr>
         <th>Nombre</th>
         <th>Actividad</th>
         <th>Razon social</th>
         <th>País</th>
         <th>Provincia</th>
         <th>Ofertas Activas</th>         
     </tr>  
  <?php foreach ($params['resultados']['empresas'] as $empresa) :?>
    <tr>
         <td><a href="index.php?ctl=verEmpresa&id=<?php echo $empresa['iduser']?>"><?php echo $empresa['nombre'] ?></a></td>
         <td><?php echo $empresa['actividad']?></td>
         <td><?php echo $empresa['razon']?></td>
         <td><?php echo $empresa['pais']?></td>
         <td><?php echo $empresa['provincia']?></td>
         <td><?php echo $empresa['numofe']?> <a href="index.php?ctl=verEmpresa&id=<?php echo $empresa['iduser']?>">Ver Ofertas</a></td>
     </tr>
  <?php endforeach; ?>
  </table>
</div>
<?php } ?>
<?php if(!empty($params['resultados']['ofertas'])){ ?>
<h2>Ofertas</h2>
<div class="ofertas">
  
  <?php foreach ($params['resultados']['ofertas'] as $oferta) :?>
  	<table>
    <tr><th class="ttabla">Oferta de<a href="index.php?ctl=verEmpresa&id=<?php echo $oferta['iduser'] ?>"> <?php echo $oferta['nombre'] ?></a></th></tr>
          <tr class="endOfe">
            <td>
              <h3><?php echo $oferta['titulo'] ?></h3>
              <b><?php echo $oferta['zona'] ?></b>
              <p class="descof"><?php echo $oferta['descripcion'] ?></p>
              <b>Competencias exigidas</b>
              <p class="descof"><ul><li><?php echo $oferta['competencias'] ?></ul></p>
              <ul>
                <b>
	                <li class="divider"><?php echo $oferta['contrato'] ?></li>
	                <li class="divider"><?php echo $oferta['jornada'] ?></li> 
	                <li class="divider"><?php echo $oferta['salario'] ?></li>
                </b>
              </ul>
            </td>
          </tr>
  	</table>
  <?php endforeach; ?>
</div>
<?php } ?>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>