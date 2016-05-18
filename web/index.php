<?php
session_start(); 
 // web/index.php

 // carga del modelo y los controladores
 require_once __DIR__ . '/../app/Config.php';
 require_once __DIR__ . '/../app/Model.php';
 require_once __DIR__ . '/../app/Controller.php';
 require_once dirname(__FILE__).'/libs/html2pdf/vendor/autoload.php';
    use Spipu\Html2Pdf\Html2Pdf;
    use Spipu\Html2Pdf\Exception\Html2PdfException;
    use Spipu\Html2Pdf\Exception\ExceptionFormatter;

 // enrutamiento

if(isset($_SESSION['user'])){
    if($_SESSION['rol']=='admin'){
         $map = array(
             'inicio' => array('controller' =>'Controller', 'action' =>'inicio'),
             'logout' => array('controller' =>'Controller', 'action' =>'logout'),
             'regEmpresa' => array('controller' =>'Controller', 'action' =>'regEmpresa'),
             'listarEmpresas' => array('controller' =>'Controller', 'action' =>'listarEmpresas'),
             'insertarEmpresa' => array('controller' =>'Controller', 'action' =>'insertarEmpresa'),
             'verEmpresa' => array('controller' =>'Controller', 'action' =>'verEmpresa'),
             'verPerfil' => array('controller' =>'Controller', 'action' =>'verPerfil'),
             'crearOferta' => array('controller' =>'Controller', 'action' =>'crearOferta'),
             'verOfertas' => array('controller' =>'Controller', 'action' =>'verOfertas'),
             'altaAlumno' => array('controller' =>'Controller', 'action' =>'altaAlumno'),
             'verAlumnos' => array('controller' =>'Controller', 'action' =>'verAlumnos'),
             'verAlumno' => array('controller' =>'Controller', 'action' =>'verAlumno'),
             'altaCentro' => array('controller' =>'Controller', 'action' =>'altaCentro'),
             'altaCiclo' => array('controller' =>'Controller', 'action' =>'altaCiclo'),
             'verCiclos' => array('controller' =>'Controller', 'action' =>'verCiclos'),
             'verCiclo' => array('controller' =>'Controller', 'action' =>'verCiclo'),
             'activarEmpresa' => array('controller' =>'Controller', 'action' =>'activarEmpresa'),
             'activarOferta' => array('controller' =>'Controller', 'action' =>'activarOferta'),
             'enviarCurriculum' => array ('controller' =>'Controller', 'action'=>'enviarCurriculum'),
             'verCurriculum' => array ('controller' =>'Controller', 'action'=>'verCurriculum'),
             'verProfesores' => array ('controller' =>'Controller', 'action'=>'verProfesores'),
             'modificarPerfil' => array ('controller' =>'Controller', 'action'=>'modificarPerfil'),
             'modificarFoto' => array ('controller' =>'Controller', 'action'=>'modificarFoto'),
             'aptos' => array('controller' =>'Controller', 'action' =>'aptos'),
             'buscar' => array('controller' =>'Controller', 'action' =>'buscarGeneral'),
             'borrarPerfil' => array ('controller' =>'Controller', 'action'=>'borrarPerfil'),
             'conLeg' => array ('controller' =>'Controller', 'action'=>'conLeg'),
             'notfound' => array ('controller' =>'Controller', 'action'=>'notfound'),
         );
 
    }elseif($_SESSION['rol']=='alumno'){
         $map = array(
             'inicio' => array('controller' =>'Controller', 'action' =>'inicio'),
             'logout' => array('controller' =>'Controller', 'action' =>'logout'),
             'listarEmpresas' => array('controller' =>'Controller', 'action' =>'listarEmpresas'),
             'verEmpresa' => array('controller' =>'Controller', 'action' =>'verEmpresa'),
             'verPerfil' => array('controller' =>'Controller', 'action' =>'verPerfil'),
             'verOfertas' => array('controller' =>'Controller', 'action' =>'verOfertas'),
             'verAlumnos' => array('controller' =>'Controller', 'action' =>'verAlumnos'),
             'verAlumno' => array('controller' =>'Controller', 'action' =>'verAlumno'),
             'verCiclos' => array('controller' =>'Controller', 'action' =>'verCiclos'),
             'verCiclo' => array('controller' =>'Controller', 'action' =>'verCiclo'),
             'enviarCurriculum' => array ('controller' =>'Controller', 'action'=>'enviarCurriculum'),
             'verCurriculum' => array ('controller' =>'Controller', 'action'=>'verCurriculum'),
             'verProfesores' => array ('controller' =>'Controller', 'action'=>'verProfesores'),
             'modificarPerfil' => array ('controller' =>'Controller', 'action'=>'modificarPerfil'),
             'modificarFoto' => array ('controller' =>'Controller', 'action'=>'modificarFoto'),
             'buscar' => array('controller' =>'Controller', 'action' =>'buscarGeneral'),
             'borrarPerfil' => array ('controller' =>'Controller', 'action'=>'borrarPerfil'),
             'conLeg' => array ('controller' =>'Controller', 'action'=>'conLeg'),
             'notfound' => array ('controller' =>'Controller', 'action'=>'notfound'),
         );

    }elseif($_SESSION['rol']=='empresa'){
         $map = array(
             'inicio' => array('controller' =>'Controller', 'action' =>'inicio'),
             'logout' => array('controller' =>'Controller', 'action' =>'logout'),
             'listarEmpresas' => array('controller' =>'Controller', 'action' =>'listarEmpresas'),
             'verEmpresa' => array('controller' =>'Controller', 'action' =>'verEmpresa'),
             'verPerfil' => array('controller' =>'Controller', 'action' =>'verPerfil'),
             'crearOferta' => array('controller' =>'Controller', 'action' =>'crearOferta'),
             'verOfertas' => array('controller' =>'Controller', 'action' =>'verOfertas'),
             'verAlumnos' => array('controller' =>'Controller', 'action' =>'verAlumnos'),
             'verAlumno' => array('controller' =>'Controller', 'action' =>'verAlumno'),
             'verCiclos' => array('controller' =>'Controller', 'action' =>'verCiclos'),
             'verCiclo' => array('controller' =>'Controller', 'action' =>'verCiclo'),
             'verCurriculum' => array ('controller' =>'Controller', 'action'=>'verCurriculum'),
             'verProfesores' => array ('controller' =>'Controller', 'action'=>'verProfesores'),
             'modificarPerfil' => array ('controller' =>'Controller', 'action'=>'modificarPerfil'),
             'modificarFoto' => array ('controller' =>'Controller', 'action'=>'modificarFoto'),
             'aptos' => array('controller' =>'Controller', 'action' =>'aptos'),
             'buscar' => array('controller' =>'Controller', 'action' =>'buscarGeneral'),
             'borrarPerfil' => array ('controller' =>'Controller', 'action'=>'borrarPerfil'),
             'conLeg' => array ('controller' =>'Controller', 'action'=>'conLeg'),
             'notfound' => array ('controller' =>'Controller', 'action'=>'notfound'),
         );
    }elseif($_SESSION['rol']=='centro'){
         $map = array(
             'inicio' => array('controller' =>'Controller', 'action' =>'inicio'),
             'logout' => array('controller' =>'Controller', 'action' =>'logout'),
             'listarEmpresas' => array('controller' =>'Controller', 'action' =>'listarEmpresas'),
             'verEmpresa' => array('controller' =>'Controller', 'action' =>'verEmpresa'),
             'verPerfil' => array('controller' =>'Controller', 'action' =>'verPerfil'),
             'verOfertas' => array('controller' =>'Controller', 'action' =>'verOfertas'),
             'verAlumnos' => array('controller' =>'Controller', 'action' =>'verAlumnos'),
             'verAlumno' => array('controller' =>'Controller', 'action' =>'verAlumno'),
             'altaCiclo' => array('controller' =>'Controller', 'action' =>'altaCiclo'),
             'verCiclos' => array('controller' =>'Controller', 'action' =>'verCiclos'),
             'verCiclo' => array('controller' =>'Controller', 'action' =>'verCiclo'),
             'activarEmpresa' => array('controller' =>'Controller', 'action' =>'activarEmpresa'),
             'activarOferta' => array('controller' =>'Controller', 'action' =>'activarOferta'),
             'verCurriculum' => array ('controller' =>'Controller', 'action'=>'verCurriculum'),
             'verProfesores' => array ('controller' =>'Controller', 'action'=>'verProfesores'),
             'modificarPerfil' => array ('controller' =>'Controller', 'action'=>'modificarPerfil'),
             'buscar' => array('controller' =>'Controller', 'action' =>'buscarGeneral'),
             'borrarPerfil' => array ('controller' =>'Controller', 'action'=>'borrarPerfil'),
             'conLeg' => array ('controller' =>'Controller', 'action'=>'conLeg'),
             'notfound' => array ('controller' =>'Controller', 'action'=>'notfound'),
         );

    }
}else{
    $map = array(
     'inicio' => array('controller' =>'Controller', 'action' =>'inicio'),
     'login' => array('controller' =>'Controller', 'action' =>'login'),
     'regEmpresa' => array('controller' =>'Controller', 'action' =>'regEmpresa'),
     'listarEmpresas' => array('controller' =>'Controller', 'action' =>'listarEmpresas'),
     'verOfertas' => array('controller' =>'Controller', 'action' =>'verOfertas'),
     'altaAlumno' => array('controller' =>'Controller', 'action' =>'altaAlumno'),
     'verCiclos' => array('controller' =>'Controller', 'action' =>'verCiclos'),
     'verCiclo' => array('controller' =>'Controller', 'action' =>'verCiclo'),
     'buscar' => array('controller' =>'Controller', 'action' =>'buscarGeneral'),
     'conLeg' => array ('controller' =>'Controller', 'action'=>'conLeg'),
     'notfound' => array ('controller' =>'Controller', 'action'=>'notfound'),
     'verPerfil' => array('controller' =>'Controller', 'action' =>'verPerfil'),
     'verEmpresa' => array('controller' =>'Controller', 'action' =>'verEmpresa'),
     'logout' => array('controller' =>'Controller', 'action' =>'logout'),
 );

}

 // Parseo de la ruta
 if (isset($_GET['ctl'])) {
     if (isset($map[$_GET['ctl']])) {
         $ruta = $_GET['ctl'];
     } else {    
         header('Location: index.php?ctl=notfound');
         exit;
     }
 } else {
     $ruta = 'inicio';
 }

 $controlador = $map[$ruta];
 // Ejecución del controlador asociado a la ruta

 if (method_exists($controlador['controller'],$controlador['action'])) {
     call_user_func(array(new $controlador['controller'], $controlador['action']));
 } else {

     header('Status: 404 Not Found');
     echo '<html><body><h1>Error 404: El controlador <i>' .
             $controlador['controller'] .
             '->' .
             $controlador['action'] .
             '</i> no existe</h1></body></html>';
 }