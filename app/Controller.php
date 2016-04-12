<?php 
class Controller{

     public function inicio(){
         $params = array(
             'mensaje' => 	'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
             'fecha' => date('d-m-y'),
         );
         require __DIR__ . '/templates/inicio.php';
     }

    public function regEmpresa(){

        echo "hola";

         $params = array(
             'nombre' => '',
             'actividad' => '',
             'idfiscal' => '',
             'razon' => '',
             'direccion' => '',
             'poblacion' => '',
             'pais' => '',
             'provincia' => '',
             'codpostal' => '',
             'telefono' => '',
             'fax' => '',
         );

         $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                     Config::$pro_bd_clave, Config::$pro_bd_hostname);

         if ($_SERVER['REQUEST_METHOD'] == 'POST') {

             // comprobar campos formulario
            $m->insertarEmpresa(
                $_POST['nombre'],
                $_POST['actividad'],
                $_POST['idfiscal'], 
                $_POST['razon'], 
                $_POST['direccion'],
                $_POST['poblacion'],
                $_POST['pais'],
                $_POST['provincia'],
                $_POST['codpostal'],
                $_POST['telefono'],
                $_POST['fax']);
            //header('Location: index.php?ctl=listarEmpresas');             
         }

         require __DIR__ . '/templates/regEmpresa.php';
     }

     function listarEmpresas(){

        $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                     Config::$pro_bd_clave, Config::$pro_bd_hostname);

        $params = array(
             'empresas' => $m->dameEmpresas(),
         );

         require __DIR__ . '/templates/mostrarEmpresas.php';
     }

}
