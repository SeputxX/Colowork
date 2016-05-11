<?php 
 require_once dirname(__FILE__).'/../web/libs/html2pdf/vendor/autoload.php';
            use Spipu\Html2Pdf\Html2Pdf;
            use Spipu\Html2Pdf\Exception\Html2PdfException;
            use Spipu\Html2Pdf\Exception\ExceptionFormatter;
class Controller{

     public function inicio(){

         $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                         Config::$pro_bd_clave, Config::$pro_bd_hostname);

         $of=$m->todasOfertas();

         $params = array(
             'mensaje' => 	'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
             'fecha' => date('d-m-y'),
             'ofertas' => $of
         );
         require __DIR__ . '/templates/inicio.php';
     }
     public function modificarPerfil(){

        if(isset($_SESSION['iduser'])){

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                             Config::$pro_bd_clave, Config::$pro_bd_hostname);

                if($_SESSION['rol']=='centro'){

                    $result=$m->modificarCentro($_POST['user'],$_POST['id'],$_POST['nombre'], $_POST['apellidos'],
                                                 $_POST['correo'], $_POST['ocupacion']);

                }elseif($_SESSION['rol']=='empresa'){

                    $insert=0;

                   $nombre = $m->dameEmpresa($_SESSION['id'])['nombre'];

                    if($_SESSION['user']==$_POST['user'] && $nombre==$_POST['nombre']){

                        $insert=1;
                    }                

                    if($_SESSION['user']!=$_POST['user'] && $nombre!=$_POST['nombre']){

                        if(!$m->comprobarUser($_POST['user'])){

                            if(!$m->comprobarEmpresa($_POST['nombre'])){

                                $insert=1;

                            }else{ $mensaje="Ya existe una empresa con ese nombrea";}
                        }else{ $mensaje="Ya existe un usuario con ese nombre";}

                    }

                    if($_SESSION['user']!=$_POST['user'] && $nombre==$_POST['nombre']){

                        if(!$m->comprobarUser($_POST['user'])){
                            $insert=1;
                        }else{$mensaje="Ya existe una empresa con ese nombres";}

                    }

                    if($_SESSION['user']==$_POST['user'] && $nombre!=$_POST['nombre']){

                        if(!$m->comprobarEmpresa($_POST['nombre'])){
                            $insert=1;
                        }else{$mensaje="Ya existe una empresa con ese nombrew";}

                    }
                    if($insert){

                        $result=$m->modificarEmpresa($_POST['id'],$_POST['nombre'],$_POST['actividad'],$_POST['idfiscal'],$_POST['razon'], 
                                    $_POST['direccion'],$_POST['poblacion'],$_POST['pais'],$_POST['provincia'],
                                    $_POST['codpostal'],$_POST['telefono'],$_POST['fax'],$_POST['user'],$_POST['correo']);
                        
                    }else{


                        $params = array(
                            'mensaje'=>$mensaje,
                            'user'=>$_SESSION['user'],
                            'datos'=> $m->dameEmpresa($_SESSION['id']),
                            'id'=>$m->getIdUser($_SESSION['user']),
                            'opact'=> $m->dameActividades(),
                            );

                        require __DIR__ . '/templates/modificarEmpresa.php';

                    }
                }elseif($_SESSION['rol']=='alumno') {

                    if($_SESSION['user']!=$_POST['user']){
                        if(!$m->comprobarUser($_POST['user'])){

                                $result=$m->modificarAlumno(
                                    $_POST['user'],
                                    $_POST['nombre'],
                                    $_POST['apellidos'],
                                    $_POST['direccion'],
                                    $_POST['correo'],
                                    $_POST['nacionalidad'],
                                    $_POST['fecha'],
                                    $_POST['sexo'],
                                    $_POST['titulos'],
                                    $_POST['idiomas'],
                                    $_POST['estado'],
                                    $_POST['transporte'],
                                    $_POST['experiencia'],
                                    $_POST['otros']
                                    );
                      
                        }else{
                            $mensaje="Ya existe ese usuario";

                            $titulos=$m->dameTitulosAlu($_SESSION['id']);
                            
                            $params = array(
                            'user'=>$_SESSION['user'],
                            'mensaje'=>'',
                            'tipo'=> $_SESSION['rol'],
                            'datos'=> $m->dameAlumno($_SESSION['id']),
                            'id'=>$_SESSION['id'],
                            'titulos'=>$m->dameTitulosIDAlu($_SESSION['id']),
                            'opctitulos'=> $m->dameTitulos(),
                            'mensaje'=>$mensaje

                            );

                        require __DIR__ . '/templates/modificarAlumno.php';

                        } 
                    }else{
                        
                             $result=$m->modificarAlumno(
                                $_POST['user'],
                                $_POST['nombre'],
                                $_POST['apellidos'],
                                $_POST['direccion'],
                                $_POST['correo'],
                                $_POST['nacionalidad'],
                                $_POST['fecha'],
                                $_POST['sexo'],
                                $_POST['titulos'],
                                $_POST['idiomas'],
                                $_POST['estado'],
                                $_POST['transporte'],
                                $_POST['experiencia'],
                                $_POST['otros']
                                );
                                     
                    }            
                    
                }elseif($_SESSION['rol']=='admin'){
                    $mensaje="Tio te lo he dicho antes eres admin no tienes perfil asique que quieres modificar xD";
                }
                if($result){
                    $mensaje="Modificado con exito";
                    $_SESSION['user']=$_POST['user'];
                }
                if(!isset($mensaje)) $mensaje="Error en la insercion en la BD";
                //var_dump($result);
                $params =array(
                    'mensaje'=>$mensaje
                    );
                require __DIR__ . '/templates/mensaje.php';
            }else{


                if(isset($_SESSION)){


                    $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                             Config::$pro_bd_clave, Config::$pro_bd_hostname);

                    $datos=array();
                    $rol="";

                    $params = array(
                        'mensaje'=>'',
                        'tipo'=> $rol,
                        'datos'=> $datos,
                        );


                    if ($_SESSION['rol']=='empresa') {

                        $params = array(
                        'mensaje'=>'',
                        'user'=>$_SESSION['user'],
                        'datos'=> $m->dameEmpresa($_SESSION['id']),
                        'id'=>$m->getIdUser($_SESSION['user']),
                        'opact'=> $m->dameActividades(),
                        );

                    require __DIR__ . '/templates/modificarEmpresa.php';

                        
                    }elseif($_SESSION['rol']=='alumno'){

                        $titulos=$m->dameTitulosAlu($_SESSION['id']);
                        
                        $params = array(
                        'user'=>$_SESSION['user'],
                        'mensaje'=>'',
                        'tipo'=> $_SESSION['rol'],
                        'datos'=> $m->dameAlumno($_SESSION['id']),
                        'id'=>$_SESSION['id'],
                        'titulos'=>$m->dameTitulosIDAlu($_SESSION['id']),
                        'opctitulos'=> $m->dameTitulos()
                        );

                    require __DIR__ . '/templates/modificarAlumno.php';

                    }elseif ($_SESSION['rol']=='centro') {

                        $datos = $m->dameProfesor($m->getIdUser($_SESSION['user']));
                        $rol = $_SESSION['rol'];

                        $params = array(
                        'mensaje'=>'',
                        'tipo'=> $rol,
                        'datos'=> $datos,
                        'id'=>$m->getIdUser($_SESSION['user'])
                        );

                    require __DIR__ . '/templates/modificarCentro.php';

                    }elseif ($_SESSION['rol']=="admin") {
                        $mensaje="Tus has creado esta pagina deberias saber que no tienes perfil";
                        $params = array(
                        'mensaje'=>$mensaje,
                        'tipo'=> $rol,
                        'datos'=> $datos,
                        );
                        require __DIR__ . '/templates/mensaje.php';
                    }          

                }else{ $mensaje = "No estas conectado";}
            }

        }else{header("Location: index.php?ctl=login");}

     }
 
     public function login(){

        $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                     Config::$pro_bd_clave, Config::$pro_bd_hostname);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $result=$m->login($_POST['user'],$_POST['pass']);


            if ($result) { 
                
                $_SESSION['user']=$_POST['user'];
                $datos=$m->datosUsuario($_POST['user']);                               
                $_SESSION['rol']=$datos['rol'];
                $_SESSION['id']=$datos['iduser'];

                if($datos['rol']=="empresa"){
                    
                    $_SESSION['ofertas']=$m->getAct($_SESSION['id']);

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

            if(!$m->comprobarUser($_POST['user'])){
                if (!$m->comprobarEmpresa($_POST['nombre'])){
             
                echo "hola";
                $ofertas="no";

                $result=$m->insertarEmpresa( $_POST['nombre'],$_POST['actividad'],$_POST['idfiscal'],$_POST['razon'], 
                                        $_POST['direccion'],$_POST['poblacion'],$_POST['pais'],$_POST['provincia'],
                                        $_POST['codpostal'],$_POST['telefono'],$_POST['fax'],$_POST['user'],
                                        $_POST['pass'],$_POST['rol'],$_POST['correo'],$ofertas);
                //echo "fuera";
                //var_dump($result);
                if($result){

                    $mensaje=$m->correoAEmpresa();
                    
            }else{ $mensaje ='datos validados pero no se puede insertar'; }
            }else{ $mensaje='No se ha podido Registrar su empresa. Revisa el formulario, y asegurate de no haber Introducido un nombre de empresa, Id Fiscal o usuario que ya exista.';}
            }else{ $mensaje="No se pudo dar de alta su empresa. Usuario ya existe. ";}

                $params = array(
                    'nombre' => $_POST['nombre'],'actividad' => $_POST['actividad'],'idfiscal' => $_POST['idfiscal'],
                    'razon' => $_POST['razon'],'direccion' => $_POST['direccion'],'poblacion' => $_POST['poblacion'],
                    'pais' => $_POST['pais'],'provincia' => $_POST['provincia'],
                    'codpostal' => $_POST['codpostal'],'telefono' => $_POST['telefono'],'fax' => $_POST['fax'],
                    'user' => $_POST['user'],'pass' => $_POST['pass'],'rol' => $_POST['rol'],'correo' =>$_POST['correo'],
                    'opact'=> $m->dameActividades(),
                    'mensaje'=>$mensaje,
                    );            
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
             'mensaje'=>"Solo se mostaran aquellas ofertas que tengan alguna oferta activa."
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
     public function buscarGeneral(){

         if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if(!empty($_POST['buscarGeneral'])){

                $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                     Config::$pro_bd_clave, Config::$pro_bd_hostname);

                $resultados=$m->buscarGeneral($_POST['buscarGeneral']);
                $mensaje="";

                if(empty($resultados)) {
                    $mensaje="Su busqueda no arrojo ningun resultado";
                }               

                $params = array(
                    'mensaje'=>$mensaje,
                 'resultados'=>$resultados,
                 );
                

                require __DIR__ . '/templates/buscarGeneral.php';                

            }else{
                $params = array(
                 'mensaje' => 'No has buscado nada tio...',
             );
                require __DIR__ . '/templates/mensaje.php';
            }
            
            
        }else{

            $params = array(
                 'mensaje' => 'Usa la barra de busqueda deja de navegar por url xD',
             );
            require __DIR__ . '/templates/mensaje.php';
        }

        
     }

     
     public function verProfesores(){

        $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                     Config::$pro_bd_clave, Config::$pro_bd_hostname);

        $params = array(
             'profesores' => $m->dameProfesores()
         );

         require __DIR__ . '/templates/verProfesores.php';

     }
     public function verPerfil(){
        if (!isset($_SESSION['rol'])) {
             throw new Exception('No estas conectado.Por Favor Logeate.');
         }         

         $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                     Config::$pro_bd_clave, Config::$pro_bd_hostname);


         if($_SESSION['rol']=="empresa"){
        
             $empresa = $m->dameEmpresa($_SESSION['id']);
             $ofertas = $m->dameOfertas($_SESSION['id']);

             $params = array(
                'empresa' => $empresa,
                'ofertas'=> $ofertas
                );
             require __DIR__ . '/templates/verEmpresa.php';
         }
         if($_SESSION['rol']=="alumno"){
             
             $alumno = $m->dameAlumno($_SESSION['id']);
             $com=$m->dameCompetenciasAlu($_SESSION['id']);
             $curriculum=$m->dameURL()."app/templates/verCurriculum.php?id=".$_SESSION['id'];

             $params = array(
                'alumno' => $alumno,
                'competencias'=>$com,
                'curriculum'=>$curriculum,              
                );
             require __DIR__ . '/templates/verAlumno.php';
         }
         if($_SESSION['rol']=="centro"){

             //var_dump($_SESSION['id']);
             $id=$m->getIdUser($_SESSION['user']);
             $profesor = $m->dameProfesor($id);   
             //var_dump($_SESSION['id']);        

             $params = array(
                'profesor' => $profesor
                );
             require __DIR__ . '/templates/verProfesor.php';
         }
         if($_SESSION['rol']=='admin'){
            $params = array(                
                'mensaje'=> "Eres administrador no tienes ningun tipo de perfil publico"
                );
             require __DIR__ . '/templates/mensaje.php';
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

                        $params = array('titulo' => '','descripcion' => '','contrato' => '',
                        'jornada' => '','salario' => '','opccompe' => $m->todasCompetencias()
                        );      

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                            $result= $m->insertarOferta($_POST['zona'],$_POST['titulo'],$_POST['descripcion'],
                                                $_POST['contrato'],$_POST['jornada'],$_POST['salario'],
                                                $_SESSION['id'],$_POST['competencias']); 

                        if ($result){
                            $mensaje=$m->correoSOferta();                                
                        }else{

                            $params = array(
                            'titulo' => $_POST['titulo'],
                            'descripcion' => $_POST['descripcion'],
                            'contrato' => $_POST['contrato'],
                            'jornada' => $_POST['jornada'],
                            'salario' => $_POST['salario'],
                            'zona'=> $_POST['zona'],
                            'opccompe' => $m->todasCompetencias()                   
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
            
            $params = array(
                 'ofertas' => $of
             );
            if(empty($of)){
                $params['mensaje']="Esa busqueda no arrojo ningun resultado";
            }

        }else{
            
            $of=$m->todasOfertas();
            
            $params = array(
                 'ofertas' => $of
             );
        }

        require __DIR__ . '/templates/verOfertas.php';
     }
     public function altaAlumno(){

        $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                     Config::$pro_bd_clave, Config::$pro_bd_hostname);

         $params = array(
             'user'=>'',
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
             'titulos'=>array(),
             'trasporte' =>'',
             'otros' =>'',
             'estado_laboral' => '',
             'opctitulos'=> $m->dameTitulos()
         );        

         if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if($m->comprobarCodigo($_POST['codigo'])!=0){
                if(!$m->comprobarUser($_POST['user'])){
                    if($_FILES['foto']['name'] != ""){
                        $url_foto=$m->comprobarFoto();
                    }elseif($_POST['sexo']=="Hombre"){
                        $url_foto="/colowork/web/img/users/default_male.jpg";
                    }elseif($_POST['sexo']=="Mujer"){
                        $url_foto="/colowork/web/img/users/rsz_default_female.jpg";
                    }
                        if($url_foto!=false){
                        $m->insertarAlumno(
                                $_POST['user'],
                                $_POST['pass'],
                                $_POST['nombre'],
                                $_POST['apellidos'],
                                $_POST['sexo'],
                                $_POST['direccion'],
                                $_POST['correo'],
                                $_POST['nacionalidad'],
                                $_POST['fecha'], 
                                $_POST['estado_laboral'],
                                $_POST['transporte'],
                                $_POST['rol'],
                                $_POST['titulos'],
                                $_POST['idiomas'],
                                $_POST['n_hablado'],
                                $_POST['n_escrito'],
                                $_POST['descripcion'],
                                $_POST['finicio'],
                                $_POST['ffinal'],
                                $_POST['fechat'],
                                $_POST['otros'],
                                $url_foto       
                                );
                        $mensaje="Error Insert";
                    }else{$mensaje="La foto no es un archivo valido";}
                }else{ $mensaje="No se pudo dar de alta el alumno. Nombre de usuario ya existe";}
            }else{ $mensaje="No se pudo dar de alta el alumno. Comprueba el codigo del centro";}
                $params = array(
                     'user' => $_POST['user'],
                     'pass' => $_POST['pass'],
                     'nombre' => $_POST['nombre'],
                     'apellidos' => $_POST['apellidos'],
                     'fecha' => $_POST['fecha'],
                     'direccion' => $_POST['direccion'],
                     'estado_laboral' => $_POST['estado_laboral'],
                     'transporte' => $_POST['transporte'],
                     'titulos'=>$_POST['titulos'],
                     'correo'=>$_POST['correo'],
                     'nacionalidad'=> $_POST['nacionalidad'],
                     'idiomas'=>$_POST['idiomas'],
                     'n_escrito'=>$_POST['n_escrito'],
                     'n_hablado'=>$_POST['n_hablado'],
                     'fechat'=> $_POST['fechat'],
                     'descripcion'=>$_POST['descripcion'],
                     'finicio'=>$_POST['finicio'],
                     'ffinal'=>$_POST['ffinal'],
                     'opctitulos'=> $m->dameTitulos(),
                     'otros'=> $_POST['otros'],
                     'codigo'=> $_POST['codigo']
                 );
                 $params['mensaje'] = $mensaje;        
     }
     require __DIR__ . '/templates/altaAlumno.php';
 }

     public function verAlumnos(){

        $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                     Config::$pro_bd_clave, Config::$pro_bd_hostname);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $buscar=$_POST['buscar'];

            $alu=$m->buscarAlumnos($buscar);
            
            $params = array(
                 'alumnos' => $alu
             );
            if(empty($alu)){
                $params['mensaje']="Esa busqueda no arrojo ningun resultado";
            }

        }else{
            
            $params = array(
             'alumnos' => $m->dameAlumnos(),
            );

        }       

         require __DIR__ . '/templates/verAlumnos.php';

     }

     public function verAlumno(){
         if (!isset($_GET['id'])) {
             throw new Exception('Ese id no corresponde a ningun alumno.');
         }

         $id = $_GET['id'];

         $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                     Config::$pro_bd_clave, Config::$pro_bd_hostname);

         $alumno = $m->dameAlumno($id);
         $com=$m->dameCompetenciasAlu($id);
         $curriculum=$m->dameURL()."app/templates/verCurriculum.php?id=".$id;
         
         $params = array(
            'alumno' => $alumno,
            'competencias'=>$com,
            'curriculum' => $curriculum
            //'ofertas'=> $ofertas
            );
         require __DIR__ . '/templates/verAlumno.php';
     }

     public function altaCentro(){


        $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                         Config::$pro_bd_clave, Config::$pro_bd_hostname);

             $params = array(
                 'user'=>'',
                 'nombre' => '',
                 'pass' => '',
                 'ocupacion' =>'',
                 'correo' => '',
                 'apellidos' => ''            
             );  


             if ($_SERVER['REQUEST_METHOD'] == 'POST') {


                if($m->comprobarUser($_POST['user'])==0){
                    $m->insertarCentro(
                            $_POST['user'],
                            $_POST['nombre'],
                            $_POST['apellidos'],
                            $_POST['correo'],
                            $_POST['pass'],
                            $_POST['ocupacion'],                            
                            $_POST['rol']      
                            );

               // header('Location: index.php?ctl=verProfesores');
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

    public function borrarPerfil(){

            $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                         Config::$pro_bd_clave, Config::$pro_bd_hostname);
             var_dump($_SESSION['id']);
            $result=$m->borrarPerfil($_SESSION['id']);
            var_dump($_SESSION);

            if(!$result){

                $params = array(
                     'mensaje' => "No se pudo borrar de la BD",         
                 );

                 require __DIR__ . '/templates/mensaje.php';  
            }else{ $this->logout(); }

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
    public function verCiclo(){

        $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                     Config::$pro_bd_clave, Config::$pro_bd_hostname);
        if(isset($_GET['id'])){

            $ciclo=$m->dameCiclo($_GET['id']);
            if($ciclo){
                $params = array(
                     'ciclo' => $ciclo,
                );
            }else{
                $params['mensaje']="Ese id no corresponde a ningun ciclo";
            }
        }else{

            $params['mensaje']="No Introdujiste el id del ciclo";

        }

         require __DIR__ . '/templates/verCiclo.php';

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

        $empresa=$m->dameEmpresa($_GET['ide']);
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
    public function verCurriculum(){

        if(!isset($_GET['id'])){

            header("Location: ../app/templates/verCurriculum.php?id=$id");
        }

    }

    public function aptos(){

        $com=$_GET['url'];
        if(!empty($com)){

            $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                         Config::$pro_bd_clave, Config::$pro_bd_hostname);
            $alumnos=$m->cantidadAlumnos($com);
            echo $alumnos;
        }else{ echo "0";}
    }

    public function modificarFoto(){

        $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                         Config::$pro_bd_clave, Config::$pro_bd_hostname);
        $params=array(
            'url' => $m->dameUrlFoto($_SESSION['id'])
            );
        require __DIR__ . '/templates/modificarFoto.php';

    }
    public function conLeg(){
        require __DIR__ . '/templates/avisoLegal.php';
    }

    public function notfound(){


        $m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                         Config::$pro_bd_clave, Config::$pro_bd_hostname);
        $params=array(
            'tablero'=>$m->tablero(),
            'tablero_aux'=>$m->tablero_aux(),
            );
        require __DIR__ . '/templates/juegodelavida.php';
    }


}


