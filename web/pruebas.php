<?php 
 require_once __DIR__ . '/../app/Config.php';
 require_once __DIR__ . '/../app/Model.php';
 require_once __DIR__ . '/../app/Controller.php';
$m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,Config::$pro_bd_clave, Config::$pro_bd_hostname);

require('fpdf.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'¡Hola, Mundo!');
$pdf->Output();



















/*$m->alumnosCumpleCompe(8);*/
/*function dameURL(){
//$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
$url="http://".$_SERVER['HTTP_HOST'];
return $url;
}
echo dameURL();*/

/*SELECT col_competencias.nombre FROM col_alumnos JOIN col_alum_ciclo ON col_alumnos.idalumno=col_alum_ciclo.idalumno JOIN col_competencias ON col_alum_ciclo.idciclo=col_competencias.idciclo WHERE col_competencias.nombre='Realizar operaciones auxiliares de montaje de equipos microinformáticos' OR col_competencias.nombre=' Realizar operaciones auxiliares de mantenimiento de sistemas microinformáticos' OR col_competencias.nombre=' Aplicar técnicas y procedimientos relacionados con la seguridad en sistemas, servicios y aplicaciones, cumpliendo el plan de seguridad' OR col_competencias.nombre=' Desarrollar aplicaciones web con acceso a bases de datos utilizando lenguajes, objetos de acceso y herramientas de mapeo adecuados a las especificaciones' OR col_competencias.nombre=' Integrar contenidos en la lógica de una aplicación web, desarrollando componentes de acceso a datos adecuados a las especificaciones' OR col_competencias.nombre=' Reparar y ampliar el equipamiento informático'*/
 ?>