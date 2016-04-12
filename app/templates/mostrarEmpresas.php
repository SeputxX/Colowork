<?php ob_start() ?>

 <table>
     <tr>
         <th>Nombre de la Empresa *</th>
         <th>Actividad de Empresa *</th>
         <th>Codigo Id. Fiscal *</th>
         <th>Razon social</th>
         <th>Dirección *</th>
         <th>Población</th>
         <th>País *</th>
         <th>Provincia *</th>
         <th>Código Postal *</th>
         <th>Teléfono de empresa *</th>
         <th>Fax</th>
     </tr>
     <?php foreach ($params['empresas'] as $empresa) :?>
     <tr>
         <td><a href="index.php?ctl=ver&id=<?php echo $empresa['idempresa']?>"><?php echo $empresa['nombre'] ?></a></td>
         <td><?php echo $empresa['actividad']?></td>
         <td><?php echo $empresa['idfiscal']?></td>
         <td><?php echo $empresa['razon']?></td>
         <td><?php echo $empresa['direccion']?></td>
         <td><?php echo $empresa['poblacion']?></td>
         <td><?php echo $empresa['pais']?></td>
         <td><?php echo $empresa['provincia']?></td>
         <td><?php echo $empresa['codpostal']?></td>
         <td><?php echo $empresa['telefono']?></td>
         <td><?php echo $empresa['fax']?></td>
     </tr>
     <?php endforeach; ?>

 </table>


 <?php $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>