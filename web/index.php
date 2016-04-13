<?php
session_start(); 
 // web/index.php

 // carga del modelo y los controladores
 require_once __DIR__ . '/../app/Config.php';
 require_once __DIR__ . '/../app/Model.php';
 require_once __DIR__ . '/../app/Controller.php';

 // enrutamiento
 $map = array(
     'inicio' => array('controller' =>'Controller', 'action' =>'inicio'),
     'login' => array('controller' =>'Controller', 'action' =>'login'),
     'logout' => array('controller' =>'Controller', 'action' =>'logout'),
     'regEmpresa' => array('controller' =>'Controller', 'action' =>'regEmpresa'),
     'listarEmpresas' => array('controller' =>'Controller', 'action' =>'listarEmpresas'),
     'insertarEmpresa' => array('controller' =>'Controller', 'action' =>'insertarEmpresa'),
     'verEmpresa' => array('controller' =>'Controller', 'action' =>'verEmpresa'),
     'verPerfil' => array('controller' =>'Controller', 'action' =>'verPerfil'),
     'crearOferta' => array('controller' =>'Controller', 'action' =>'crearOferta'),
     'verOfertas' => array('controller' =>'Controller', 'action' =>'verOfertas'),
     'verwiki' => array('controller' =>'Controller', 'action' =>'wiki'),
 );

 // Parseo de la ruta
 if (isset($_GET['ctl'])) {
     if (isset($map[$_GET['ctl']])) {
         $ruta = $_GET['ctl'];
     } else {
         header('Status: 404 Not Found');
         echo '<html><body><h1>Error 404: No existe la ruta <i>' .
                 $_GET['ctl'] .
                 '</p></body></html>';
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