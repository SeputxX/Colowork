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

     public function login(){

        $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                     Config::$pro_bd_clave, Config::$pro_bd_hostname);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($m->login($_POST['user'],$_POST['pass'])) { 

                $_SESSION['user']=$_POST['user'];

                $datos=$m->datosUsuario($_POST['user']);                
                $_SESSION['rol']=$datos['rol'];
                $_SESSION['id']=$datos['iduser'];
                
                header('Location: index.php?ctl=inicio');

            }else{
                $params = array(
                     'user' => $_POST['user'],
                     'pass' => $_POST['pass']
                 );
                 $params['mensaje'] = 'Contraseña o Nombre Incorrectos.';
            }            
         }
        require __DIR__ . '/templates/login.php';
     }

    public function logout(){
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }


        session_destroy();
        header('Location: index.php?ctl=inicio');
    }

    public function regEmpresa(){

        $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                     Config::$pro_bd_clave, Config::$pro_bd_hostname);

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
             'user' => '',
             'pass' => '',
             'rol' => '',
             'opact'=> $m->dameActividades()
         );        

         if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($m->validarDatos(
                        $_POST['nombre'],
                        $_POST['idfiscal'], 
                        $_POST['user'],
                        $_POST['rol'])==0) {           

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
                        $_POST['fax'],
                        $_POST['user'],
                        $_POST['pass'],
                        $_POST['rol']                
                        );
            //header('Location: index.php?ctl=listarEmpresas');
            }else{
                $params = array(
                     'nombre' => $_POST['nombre'],
                     'actividad' => $_POST['actividad'],
                     'idfiscal' => $_POST['idfiscal'],
                     'razon' => $_POST['razon'],
                     'direccion' => $_POST['direccion'],
                     'poblacion' => $_POST['poblacion'],
                     'pais' => $_POST['pais'],
                     'provincia' => $_POST['provincia'],
                     'codpostal' => $_POST['codpostal'],
                     'telefono' => $_POST['telefono'],
                     'fax' => $_POST['fax'],
                     'user' => $_POST['user'],
                     'pass' => $_POST['pass'],
                     'rol' => $_POST['rol']
                 );
                 $params['mensaje'] = 'No se ha podido Registrar su empresa. Revisa el formulario, y asegurate de no haber Introducido un nombre de empresa, Id Fiscal o usuario que ya exista.';
            }            
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
     public function verEmpresa(){
         if (!isset($_GET['id'])) {
             throw new Exception('Ese id no corresponde a ninguna empresa.');
         }

         $id = $_GET['id'];

         $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                     Config::$pro_bd_clave, Config::$pro_bd_hostname);

         $empresa = $m->dameEmpresa($id);
         $ofertas = $m->dameOfertas($id);

         $params = array(
            'empresa' => $empresa,
            'ofertas'=> $ofertas
            );

         require __DIR__ . '/templates/verEmpresa.php';
     }
     public function verPerfil(){
        if (!isset($_SESSION['rol'])) {
             throw new Exception('No estas conectado.Por Favor Logeate.');
         }
         

         $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                     Config::$pro_bd_clave, Config::$pro_bd_hostname);


         if($_SESSION['rol']=="empresa"){
             $id=$m->getIdEmpresa($_SESSION['user']);
             $empresa = $m->dameEmpresa($id);
             $ofertas = $m->dameOfertas($id);

             $params = array(
                'empresa' => $empresa,
                'ofertas'=> $ofertas
                );
             require __DIR__ . '/templates/verEmpresa.php';
         }
         if($_SESSION['rol']=="alumno"){
             $empresa = $m->dameAlumno($id);

             $params = array(
                'empresa' => $empresa,
                'ofertas'=> $ofertas
                );
             require __DIR__ . '/templates/verAlumno.php';
         }
     }

     public function  crearOferta(){

        $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                     Config::$pro_bd_clave, Config::$pro_bd_hostname);

         $params = array(
             'titulo' => '',
             'descripcion' => '',
             'ubicacion' => '',
             'contrato' => '',
             'jornada' => '',
             'salario' => '',
             'opccontrato'=> $m->dameContratos(),
             'opcjornada'=> $m->dameJornadas(),
             'opcsalario'=> $m->dameSalarios(),
             'idempresa'=> $m->getIdEmpresa($_SESSION['user'])
         );        

         if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($m->insertarOferta(
                    $_POST['titulo'],
                    $_POST['descripcion'],
                    $_POST['ubicacion'], 
                    $_POST['contrato'], 
                    $_POST['jornada'],
                    $_POST['salario'],
                    $_POST['idempresa']                                     
                    )){
            //header('Location: index.php?ctl=listarEmpresas');
            }else{
                $params = array(
                     'titulo' => $_POST['titulo'],
                     'descripcion' => $_POST['descripcion'],
                     'ubicacion' => $_POST['ubicacion'],
                     'contrato' => $_POST['contrato'],
                     'jornada' => $_POST['jornada'],
                     'salario' => $_POST['salario']                     
                 );
                 $params['mensaje'] = 'No se ha podido Registrar su oferta. Revisa el formulario.';
            }            
         }


        require __DIR__ . '/templates/crearOferta.php';
     }

     public function verOfertas(){

        $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                     Config::$pro_bd_clave, Config::$pro_bd_hostname);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $buscar=$_POST['buscar'];

            $of=$m->buscarOfertas($buscar);
            $ofertas=array();
            foreach ($of as $oferta) :
                $idempresa=$oferta['idempresa'];
                $nombreEmpresa=$m->getNombreEmpresa($idempresa);
                $oferta['nombreEmp']=$nombreEmpresa;
                $ofertas[]=$oferta;
            endforeach; 

            $params = array(
                 'ofertas' => $ofertas
             );

        }else{
            
            $of=$m->todasOfertas();
            $ofertas=array();
            foreach ($of as $oferta) :
                $idempresa=$oferta['idempresa'];
                $nombreEmpresa=$m->getNombreEmpresa($idempresa);
                $oferta['nombreEmp']=$nombreEmpresa;
                $ofertas[]=$oferta;
            endforeach; 

            $params = array(
                 'ofertas' => $ofertas
             );
        }

        require __DIR__ . '/templates/verOfertas.php';
     }


}
