<?php ob_start() ?>

 <table>
     <tr>
         <th>Nombre</th>
         <th>Actividad</th>
         <th>Razon social</th>
         <th>País</th>
         <th>Provincia</th>
         <th>Ofertas Activas</th>
         
     </tr>
     <?php foreach ($params['empresas'] as $empresa) :?>
     <tr>
         <td><a href="index.php?ctl=verEmpresa&id=<?php echo $empresa['idempresa']?>"><?php echo $empresa['nombre'] ?></a></td>
         <td><?php echo $empresa['actividad']?></td>
         <td><?php echo $empresa['razon']?></td>
         <td><?php echo $empresa['pais']?></td>
         <td><?php echo $empresa['provincia']?></td>
         <td><?php echo $empresa['numofe']?> <a href="index.php?ctl=verEmpresa&id=<?php echo $empresa['idempresa']?>">Ver Ofertas</a></td>
     </tr>
     <?php endforeach; ?>

 </table>
 


 <?php $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>