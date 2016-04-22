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

                if($datos['rol']=="empresa"){
                    $idempresa=$m->getIdEmpresa($_SESSION['user']);
                    $_SESSION['ofertas']=$m->getAct($idempresa);
                }
                
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
             'opact'=> $m->dameActividades(),
             'correo' =>''
         );        

         if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($m->validarDatos($_POST['nombre'],$_POST['idfiscal'],$_POST['user'],$_POST['rol'])==0){
             

                $ofertas="no";

                if($m->insertarEmpresa( $_POST['nombre'],$_POST['actividad'],$_POST['idfiscal'],$_POST['razon'], 
                                        $_POST['direccion'],$_POST['poblacion'],$_POST['pais'],$_POST['provincia'],
                                        $_POST['codpostal'],$_POST['telefono'],$_POST['fax'],$_POST['user'],
                                        $_POST['pass'],$_POST['rol'],$_POST['correo'],$ofertas)==true){

                    $params['mensaje']=$m->correoAEmpresa();
                    
                 }else{ $mensaje ='datos validados pero no se puede insertar'; }
            }else{                    
                $params = array(
                    'nombre' => $_POST['nombre'],'actividad' => $_POST['actividad'],'idfiscal' => $_POST['idfiscal'],
                    'razon' => $_POST['razon'],'direccion' => $_POST['direccion'],'poblacion' => $_POST['poblacion'],
                    'pais' => $_POST['pais'],                    'provincia' => $_POST['provincia'],
                    'codpostal' => $_POST['codpostal'],'telefono' => $_POST['telefono'],'fax' => $_POST['fax'],
                    'user' => $_POST['user'],'pass' => $_POST['pass'],'rol' => $_POST['rol'],'correo' =>$_POST['correo'],
                    'opact'=> $m->dameActividades()
                 );
                
                    $params['mensaje'] = 'No se ha podido Registrar su empresa. Revisa el formulario, y asegurate de no haber Introducido un nombre de empresa, Id Fiscal o usuario que ya exista.';
                    
                }
                         
            }
             
         require __DIR__ . '/templates/regEmpresa.php';
     }
    public function activarEmpresa(){           
                
        if(isset($_GET['id'])){

        $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
             Config::$pro_bd_clave, Config::$pro_bd_hostname);

            if($m->activarEmpresa()){
                $mensaje="Empresa acivada con exito.";
            }else{
                $mensaje="Ese codigo no pertenece a ninguna empresa";
            }  
        }else{ $mensaje= "No se ha especificado ID";} 

        $params = array(
             'mensaje' =>$mensaje,
         );

         require __DIR__ . '/templates/mensaje.php';

     }

    public function listarEmpresas(){

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
            $id=$m->getIdAlummno($_SESSION['user']);
             $alumno = $m->dameAlumno($id);

             $params = array(
                'alumno' => $alumno                
                );
             require __DIR__ . '/templates/verAlumno.php';
         }
     }

    public function  crearOferta(){

        if(!isset($_SESSION['ofertas'])){    
            $params = array(
            'mensaje' => "No tienes permitido el acceso a este sitio, no eres una empresa"
            );
            require __DIR__ . '/templates/mensaje.php';
        }else{
                if($_SESSION['ofertas']=="si"){
                        $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                        Config::$pro_bd_clave, Config::$pro_bd_hostname);

                        $params = array('titulo' => '','descripcion' => '','ubicacion' => '','contrato' => '',
                        'jornada' => '','salario' => '','opccontrato'=> $m->dameContratos(),'opcjornada'=> $m->dameJornadas(),
                        'opcsalario'=> $m->dameSalarios(),'opccompe' => $m->todasCompetencias(),'idempresa'=> $m->getIdEmpresa($_SESSION['user']));        

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        if ($m->insertarOferta($_POST['titulo'],$_POST['descripcion'],$_POST['ubicacion'], 
                                                $_POST['contrato'],$_POST['jornada'],$_POST['salario'],
                                                $_POST['idempresa'],$_POST['competencias']                                  
                        )){                               
                            $mensaje=$m->correoSOferta();
                                
                        }else{
                            $params = array(
                            'titulo' => $_POST['titulo'],
                            'descripcion' => $_POST['descripcion'],
                            'ubicacion' => $_POST['ubicacion'],
                            'contrato' => $_POST['contrato'],
                            'jornada' => $_POST['jornada'],
                            'salario' => $_POST['salario'],
                            'opccontrato'=> $m->dameContratos(),
                            'opcjornada'=> $m->dameJornadas(),
                            'opcsalario'=> $m->dameSalarios(),
                            'opccompe' => $m->todasCompetencias(),
                            'idempresa'=> $m->getIdEmpresa($_SESSION['user'])                    
                            );
                             $mensaje = 'No se ha podido Registrar su oferta. Revisa el formulario.';
                        }
                        $params['mensaje']=$mensaje;            
                        }
                        require __DIR__ . '/templates/crearOferta.php';
                }else{
                    $params = array(
                    'mensaje' => "No tienes permitido el acceso a este sitio espera que activen tu cuenta"
                    );
                    require __DIR__ . '/templates/mensaje.php';
                }
        }

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
     public function altaAlumno(){

        $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                     Config::$pro_bd_clave, Config::$pro_bd_hostname);

         $params = array(
             'nombre' => '',
             'pass' => '',
             'apellidos' =>'',
             'sexo' => '',
             'direccion' => '',
             'correo' => '',
             'nacionalidad' => '',
             'fecha' => '',
             'titulos' => '',
             'idiomas' => '',
             'experiencia' =>'',
             'codigo' =>'',
             'trasporte' =>'',
             'otros' =>'',
             'estado_laboral' => '',
             'opctitulos'=> $m->dameTitulos()
         );        

         if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if($m->comprobarCodigo($_POST['codigo'])!=0){

                $m->insertarAlumno(
                        $_POST['nombre'],
                        $_POST['pass'],
                        $_POST['apellidos'],
                        $_POST['sexo'],
                        $_POST['direccion'],
                        $_POST['correo'],
                        $_POST['nacionalidad'],
                        $_POST['fecha'], 
                        $_POST['estado_laboral'],
                        $_POST['transporte'],
                        $_POST['experiencia'],
                        $_POST['rol'],
                        $_POST['titulos'],
                        $_POST['idiomas'],
                        $_POST['otros']       
                        );

            //header('Location: index.php?ctl=listarEmpresas');
            }else{
                $params = array(
                     'nombre' => $_POST['nombre'],
                     'pass' => $_POST['pass'],
                     'apellidos' => $_POST['apellidos'],
                     'fecha' => $_POST['fecha'],
                     'direccion' => $_POST['direccion'],
                     'estado_laboral' => $_POST['estado_laboral'],
                     'transporte' => $_POST['transporte'],
                     'opctitulos'=> $m->dameTitulos(),
                     'otitulos'=> $_POST['otitulos'],
                     'codigo'=> $_POST['codigo'],
                     'experiencia' => $_POST['experiencia']
                 );
                 $params['mensaje'] = 'No se pudo dar de alta el alumno. Comprueba el codigo del centro';
            }            
         }

        require __DIR__ . '/templates/altaAlumno.php';
     }

     public function verAlumnos(){

        $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                     Config::$pro_bd_clave, Config::$pro_bd_hostname);

        $params = array(
             'alumnos' => $m->dameAlumnos(),
         );

         require __DIR__ . '/templates/verAlumnos.php';

     }

     public function verAlumno(){
         if (!isset($_GET['id'])) {
             throw new Exception('Ese id no corresponde a ningun alumno.');
         }

         $id = $_GET['id'];

         $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                     Config::$pro_bd_clave, Config::$pro_bd_hostname);

         $empresa = $m->dameAlumno($id);
         //$ofertas = $m->dameOfertas($id);

         $params = array(
            'alumno' => $empresa
            //'ofertas'=> $ofertas
            );
         require __DIR__ . '/templates/verAlumno.php';
     }

     public function altaCentro(){


        $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                         Config::$pro_bd_clave, Config::$pro_bd_hostname);

             $params = array(
                 'nombre' => '',
                 'pass' => '',
                 'ocupacion' =>'',
                 'correo' => '',
                 'apellidos' => ''            
             );  


             if ($_SERVER['REQUEST_METHOD'] == 'POST') {


                if($m->comprobarUser($_POST['nombre'], $_POST['rol'])==0){
                    $m->insertarCentro(
                            $_POST['nombre'],
                            $_POST['apellidos'],
                            $_POST['correo'],
                            $_POST['pass'],
                            $_POST['ocupacion'],                            
                            $_POST['rol']      
                            );

                //header('Location: index.php?ctl=listarEmpresas');
                }else{
                    
                    $params = array(
                         'nombre' => $_POST['nombre'],
                         'pass' => $_POST['pass'],
                         'ocupacion' => $_POST['ocupacion'],
                         'correo' => $_POST['correo'],
                         'apellidos' => $_POST['apellidos']
                     );
                     $params['mensaje'] = 'El usuario que intentas crear ya existe.';
                 }       
            }
        require __DIR__ . '/templates/altaCentro.php';     
    }

    public function altaCiclo(){

        $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                         Config::$pro_bd_clave, Config::$pro_bd_hostname);

             $params = array(
                 'nombre' => '',
                 'abreviatura' => '',
                 'descripcion' =>'',
                 'competencias' => ''           
             );  


             if ($_SERVER['REQUEST_METHOD'] == 'POST') {


                if($m->insertarCiclo(
                            $_POST['nombre'],
                            $_POST['abreviatura'],
                            $_POST['descripcion'],
                            $_POST['competencias']    
                            )){
                    

                //header('Location: index.php?ctl=listarEmpresas');
                }else{
                    
                    $params = array(
                         'nombre' => $_POST['nombre'],
                         'abreviatura' => $_POST['abreviatura'],
                         'descripcion' => $_POST['descripcion'],
                         'competencias' => $_POST['competencias'],
                         
                     );
                     $params['mensaje'] = 'No se puede dar de alta el curso.';
                 }       
            }
        require __DIR__ . '/templates/altaCiclo.php';  


    }

    public function verCiclos(){

        $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                     Config::$pro_bd_clave, Config::$pro_bd_hostname);

        $params = array(
             'ciclos' => $m->dameCiclos(),
         );

         require __DIR__ . '/templates/verCiclos.php';

    }

    public function activarOferta(){

        if(isset($_GET['id'])){

         $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                     Config::$pro_bd_clave, Config::$pro_bd_hostname);

            if($m->activarOferta()){

                $mensaje=$m->correoEAlumnos();
                
            }else{
                $mensaje="No se correspondea ningun id";
            }
        }else{ $mensaje="No se ha especificado ID";}


        $params = array(
             'mensaje' =>$mensaje,
         );

         require __DIR__ . '/templates/mensaje.php';

    }

    public function enviarCurriculum() {

        if(isset($_GET['ide']) && isset($_GET['ida'])){

         $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                     Config::$pro_bd_clave, Config::$pro_bd_hostname);

        $empresa=$m->dameempresa($_GET['ide']);
        $alumno=$m->dameempresa($_GET['ida']);

        require("libs/PHPMailer-master/PHPMailerAutoload.php");
            $mail = new PHPMailer();
            $mail->IsHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "ssl";
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465;
            $mail->Username = "ColoWorkDAW@gmail.com";
            $mail->Password = "colowork1";                                                
            $mail->From = $alumno['correo'];
            $mail->FromName = $alumno['nombre'];
            $mail->Subject = "Estoy interesado en la Oferta de trabajo";
            $mail->AddAddress($empresa['correo'],$empresa['nombre']);                                            
            $body  = "La Empresa <b>".$nombreEmpresa."</b><br>";
            $body  .= "Esta intentando dar de alta una oferta con las siguientes caractesiticas<br>";
            $body  .= "Titulo <b>".$_POST['titulo']."</b><br>";
            $body  .= "Descripcion <b>".$_POST['descripcion']."</b><br>";
            $competencias=implode(".", $_POST['competencias']);
            $body  .= "Competencias <b>".$competencias."</b><br>";
            $body  .= "Si quiere pasarsela a sus alumnos haga click en el siguiente enlace:<br>";
            $body .= Config::$pro_vis_url."?ctl=activarOferta&id=".$idoferta;
            $mail->Body = $body;

            //$mail->Send();
            if(!$mail->Send()) {
                  echo "Error: " . $mail->ErrorInfo;
            } else {
                  echo "Enviado!";
            }



        }else{$mensaje="No se ha especificado la empresa o alumno";}

            $params = array(
                         'mensaje' =>$mensaje,
             );
        require __DIR__ . '/templates/mensaje.php';

    }


}


