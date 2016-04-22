<?php
class Model {
  protected $conexion;

  public function __construct($dbname,$dbuser,$dbpass,$dbhost){

    $pro_bd_conexion = mysql_connect($dbhost, $dbuser, $dbpass);

    if (!$pro_bd_conexion) {
      die('No ha sido posible realizar la conexión con la base de datos: ' . mysql_error());
    }
    mysql_select_db($dbname, $pro_bd_conexion);

    mysql_set_charset('utf8');

    $this->conexion = $pro_bd_conexion;
  }
  public function bd_conexion() {

  }

  public function login($user,$pass){

    $query="SELECT count(*) AS coin FROM col_usuarios where user='$user' AND pass='$pass';";

    $result = mysql_query($query, $this->conexion);
    $row = mysql_fetch_assoc($result);

    return $row['coin'];

  }
  public function getAct($id){
    $query="SELECT ofertas FROM col_empresas where idempresa='$id';";

    $result = mysql_query($query, $this->conexion);
    $row = mysql_fetch_assoc($result);

    return $row['ofertas'];
  }
  public function datosUsuario($user){
    $query="SELECT iduser,rol FROM col_usuarios WHERE user='$user';";

    $result = mysql_query($query, $this->conexion);
    $row = mysql_fetch_assoc($result);

    return $row;
  }

  public function dameAlumnos(){
      $sql = "select * from col_alumnos order by nombre asc";

      $result = mysql_query($sql, $this->conexion);

      $alumnos = array();
      while ($row = mysql_fetch_assoc($result)){
        $alumnos[] = $row;
      }
      return $alumnos;
    }

  public function dameEmpresas(){
      $sql = "select * from col_empresas order by nombre asc";

      $result = mysql_query($sql, $this->conexion);

      $empresas = array();
      $solu=array();
      while ($row = mysql_fetch_assoc($result)){
        $empresas[] = $row;
      }
      foreach ($empresas as $empresa) :

        $count = $empresa['idempresa'];
        $sql2 = "SELECT count(*) as numofe from col_ofertas WHERE idempresa=$count";
        $result2 = mysql_query($sql2, $this->conexion);
        $row2 = mysql_fetch_assoc($result2);
        $empresa['numofe']=$row2['numofe'];
        $solu[]=$empresa;
      endforeach;
    
      return $solu;
  }
  public function insertarEmpresa($n, $a, $idf, $r, $d, $p, $pais, $pro, $cod, $tel, $fax,$user,$pass,$rol,$correo,$es){
    
         $n = htmlspecialchars($n);
         $a = htmlspecialchars($a);
         $idf = htmlspecialchars($idf);         
         $r = htmlspecialchars($r);
         $d = htmlspecialchars($d);
         $p = htmlspecialchars($p);
         $pais = htmlspecialchars($pais);
         $pro = htmlspecialchars($pro);
         $cod = htmlspecialchars($cod);
         $tel = htmlspecialchars($tel);
         $fax = htmlspecialchars($fax);
         $user = htmlspecialchars($user);
         $pass= htmlspecialchars($pass);
         $rol=htmlspecialchars($rol);
         $es=htmlspecialchars($es);
         $correo=htmlspecialchars($correo);

          // echo $n." ".$a." ".$idf." ".$r." ".$d." ".$p." ".$pais." ".$pro." ".$cod." ".$tel." ".$fax." ".$user." ".$pass." ".$rol;

         $cod_act=$this->genera_random(20);
         $query= "INSERT INTO `col_empresas`(`nombre`, `actividad`, `idfiscal`, `razon`, `direccion`, `poblacion`, `pais`, `provincia`, `codpostal`, `telefono`, `fax`,`user`,`ofertas`,`correo`,`cod_act`)
         VALUES ('$n','$a','$idf','$r','$d','$p','$pais','$pro',$cod,$tel,$fax,'$user','$es','$correo','$cod_act');";
         $result = mysql_query($query, $this->conexion);
         $result1=false;
         if ($result) {
          $query1="INSERT INTO `col_usuarios`(`user`,`pass`,`rol`) VALUES('$user','$pass','$rol')";
          $result1 = mysql_query($query1, $this->conexion);
         }
         return $result1;

     }
     public function activarEmpresa(){

        $cod_act=$_GET['id'];

        $query="UPDATE `col_empresas` SET `ofertas`='si' WHERE `cod_act`='$cod_act'";
        $result=mysql_query($query);

        return $result;
     }
     public function activarOferta(){

        $cod_act=$_GET['id'];

        $query="UPDATE `col_ofertas` SET `activa`='si' WHERE `idoferta`='$cod_act'";
        $result=mysql_query($query);

        return $result;
     }

     public function validarDatos($n,$idf,$user,$rol){
      if($rol=="empresa"){
        $query="SELECT COUNT(*) as coin FROM `col_empresas` WHERE `nombre`='$n' OR `idfiscal`=$idf OR `user`='$user';";
        $result = mysql_query($query, $this->conexion);
        $fila = mysql_fetch_assoc($result);
      }
      return $fila['coin'];
     }

     public function dameEmpresa($id){

       $query="SELECT * FROM col_empresas where idempresa=$id";

       $result = mysql_query($query, $this->conexion);

       $row = mysql_fetch_assoc($result);

       return $row;

     }
     public function dameAlumno($id){

       $query="SELECT * FROM col_alumnos where idalumno=$id";

       $result = mysql_query($query, $this->conexion);

       $row = mysql_fetch_assoc($result);

       return $row;

     }
     public function getIdAlummno($nombre){

      $query="SELECT idalumno FROM col_alumnos where nombre='$nombre'";

       $result = mysql_query($query, $this->conexion);

       $row = mysql_fetch_assoc($result)['idalumno'];        

       return $row;


     }
     public function getIdCompetencia($nombre){

      $query="SELECT idcompetencia FROM col_competencias where nombre='$nombre'";

       $result = mysql_query($query, $this->conexion);

       $row = mysql_fetch_assoc($result)['idcompetencia'];        

       return $row;


     }
      public function getIdOferta(){

      $query="SELECT max(idoferta) as id FROM col_ofertas";

       $result = mysql_query($query, $this->conexion);

       $row = mysql_fetch_assoc($result)['id'];        

       return $row;


     }
     public function dameOfertas($id){

       $query="SELECT * FROM col_ofertas where idempresa=$id";

       $result = mysql_query($query, $this->conexion);

       $ofertas = array();
         while ($row = mysql_fetch_assoc($result))
         {
             $ofertas[] = $row;
         }

       return $ofertas;

     }
     public function dameActividades(){

       $query="SELECT nombre FROM col_actividades";

       $result = mysql_query($query, $this->conexion);
       $actividades = array();
       while ($row = mysql_fetch_assoc($result))
         {
             $actividades[] = $row;
         }

         return $actividades;
     }
      public function getIdEmpresa($user){

        $query="SELECT idempresa FROM col_empresas where user='$user'";

       $result = mysql_query($query, $this->conexion);

       $row = mysql_fetch_assoc($result)['idempresa'];        

       return $row;

      }
      public function getNombreEmpresa($id){

        $query="SELECT nombre FROM col_empresas where idempresa=$id";

       $result = mysql_query($query, $this->conexion);

       $row = mysql_fetch_assoc($result)['nombre'];        

       return $row;

      }
      public function dameContratos(){

        $query="SELECT nombre FROM col_contratos";

        $result = mysql_query($query, $this->conexion);
        $contratos=array();
        while($row = mysql_fetch_assoc($result)){
          $contratos[]=$row;
        }
          return $contratos;
      }
      public function dameJornadas(){

        $query="SELECT nombre FROM col_jornadas";

        $result = mysql_query($query, $this->conexion);
        $jornadas=array();
        while($row = mysql_fetch_assoc($result)){
          $jornadas[]=$row;
        }
          return $jornadas;

      }
      public function dameSalarios(){

        $query="SELECT nombre FROM col_salarios";

        $result = mysql_query($query, $this->conexion);
        $salarios=array();
        while($row = mysql_fetch_assoc($result)){
          $salarios[]=$row;
        }
          return $salarios;

      }
      public function insertarOferta($t,$d,$u,$c,$j,$s,$ide,$compe) {

         $t = htmlspecialchars($t);
         $d = htmlspecialchars($d);
         $u = htmlspecialchars($u);         
         $c = htmlspecialchars($c);
         $j = htmlspecialchars($j);
         $s = htmlspecialchars($s);
         $ide = htmlspecialchars($ide);

         $cod_act=$this->genera_random(20);

         $competencias=implode(".", $compe);
         $query= "INSERT INTO `col_ofertas`(`titulo`, `descripcion`, `ubicacion`, `contrato`, `jornada`, `salario`, `idempresa`, `competencias`,`activa`,`cod_act`)
          VALUES ('$t','$d','$u','$c','$j','$s','$ide','$competencias','no','$cod_act')";
         if($result = mysql_query($query, $this->conexion)){

          for($i=0;$i<count($compe);$i++){
            $ido=$this->getIdOferta(); 
            $idc=$this->getIdCompetencia($compe[$i]);
            $query= "INSERT INTO `col_oferta_competencia`(`idoferta`, `idcompetencia`)
                        VALUES($ido,$idc) ";
                        $result = mysql_query($query, $this->conexion);
          }
        }

          return $result;
         
      }   
      public function todasOfertas(){

       $query="SELECT * FROM col_ofertas WHERE activa='si'";

       $result = mysql_query($query, $this->conexion);

       $ofertas = array();
         while ($row = mysql_fetch_assoc($result))
         {
             $ofertas[] = $row;
         }

       return $ofertas;

      }

      public function buscarOfertas($buscar){

       $query="SELECT * FROM col_ofertas WHERE titulo LIKE '%".$buscar."%' OR ubicacion LIKE '%".$buscar."%' OR descripcion LIKE '%".$buscar."%' OR contrato LIKE '%".$buscar."%' OR jornada LIKE '%".$buscar."%' ";

       $result = mysql_query($query, $this->conexion);

       $ofertas = array();
         while ($row = mysql_fetch_assoc($result))
         {
             $ofertas[] = $row;
         }

       return $ofertas;

      }

      public function dameTitulos(){

       $query="SELECT abreviatura FROM col_ciclos";

       $result = mysql_query($query, $this->conexion);
       //$return=array();
       $titulos = array();
       while ($row = mysql_fetch_assoc($result))
         {
             $titulos[] = $row;
         }
       //$return[]=$titulos;
         return $titulos;
      }

      public function comprobarCodigo($codigo){

        $query="SELECT count(*) as coin FROM `col_codigos` WHERE codigo='$codigo'";
        $result = mysql_query($query, $this->conexion);
        $row = mysql_fetch_assoc($result)['coin'];


        return $row;
      }

      public function insertarAlumno($n,$pass,$a,$sx,$d,$co,$na,$fe,$es,$tr,$ex,$rol,$ti,$id,$o){ 

        $n=htmlspecialchars($n);
        $pass=htmlspecialchars($pass);
        $a=htmlspecialchars($a);
        $sx=htmlspecialchars($sx);
        $d=htmlspecialchars($d);
        $co=htmlspecialchars($co);
        $na=htmlspecialchars($na);
        $fe=htmlspecialchars($fe);
        $es=htmlspecialchars($es);
        $tr=htmlspecialchars($tr);
        $ex=htmlspecialchars($ex);
        $rol=htmlspecialchars($rol);
        $id=htmlspecialchars($id);
        $o=htmlspecialchars($o);

          $query1="INSERT INTO `col_usuarios`(`user`,`pass`,`rol`) VALUES('$n','$pass','$rol')";
          $result1 = mysql_query($query1, $this->conexion);

          $titulos = implode(".", $ti);

          $query="INSERT INTO `col_alumnos`(`nombre`, `apellidos`, `sexo`, `direccion`, `correo`,
           `nacionalidad`, `fecha`, `estado`, `transporte`, `experiencia`, `titulos`, `idiomas`, `otros`) 
          VALUES ('$n','$a','$sx','$d','$co','$na','$fe','$es','$tr','$ex','$titulos','$id','$o');";
          $result= mysql_query($query, $this->conexion);
          $idal=$this->getIdAlummno($n);
          foreach($ti as $titulo=>$valor){
            $idti=$this->getIdTitulo($valor);
            
            $query="INSERT INTO col_alum_ciclo VALUES('$idal','$idti');";
            $result= mysql_query($query, $this->conexion);
          }         

      }
      public function getIdTitulo($nombre){

      $query="SELECT idciclo FROM col_ciclos where abreviatura='$nombre'";

       $result = mysql_query($query, $this->conexion);

       $row = mysql_fetch_assoc($result)['idciclo'];        

       return $row;


     }
      public function comprobarUser($nombre, $rol){

        if($rol=='empresa'){
          $query="SELECT COUNT(*) AS coin FROM `col_empresas` WHERE nombre='$nombre'";
          $result= mysql_query($query, $this->conexion);
          $row=mysql_fetch_assoc($result)['coin'];
          
        }else{
          $query="SELECT COUNT(*) AS coin FROM `col_usuarios` WHERE user='$nombre'";
          $result= mysql_query($query, $this->conexion);
          $row=mysql_fetch_assoc($result)['coin'];
        }        
        
        return $row;
      }
      public function insertarCentro($n,$p,$c,$ap,$o,$r){

        $n=htmlspecialchars($n);
        $p=htmlspecialchars($p);
        $ap=htmlspecialchars($ap);
        $c=htmlspecialchars($c);
        $o=htmlspecialchars($o);
        $r=htmlspecialchars($r);        

        $query="INSERT INTO `col_usuarios`(`user`, `pass`, `rol`) VALUES ('$n','$p','$r')";
        $result= mysql_query($query, $this->conexion);             

        $query="INSERT INTO col_profesores(nombre,apellidos, correo, ocupacion) VALUES('$n','$ap','$c','$o')";
        $result= mysql_query($query, $this->conexion);
       

        return $result;

      }

      public function insertarCiclo($n,$ab,$d,$c){
        $n=htmlspecialchars($n);
        $ab=htmlspecialchars($ab);
        $d=htmlspecialchars($d);
        $c=htmlspecialchars($c);

        $competencias=explode(".", $c);

        $query="INSERT INTO `col_ciclos`(`nombre`, `abreviatura`, `descripcion`) VALUES ('$n','$ab','$d')";
        $result= mysql_query($query, $this->conexion);
        if($result){
          $query="SELECT idciclo FROM col_ciclos WHERE nombre='$n'";
          $result= mysql_query($query, $this->conexion);
          $id = mysql_fetch_assoc($result)['idciclo'];
          for($i=0;$i<count($competencias);$i++){
             $query="INSERT INTO `col_competencias`(`nombre`, `idciclo`) VALUES ('$competencias[$i]','$id')";
             $result= mysql_query($query, $this->conexion);
          }
        }
        return $result;
      }

      public function dameCompetencias($ciclo){

      $query="select col_competencias.nombre as competencia from col_ciclos 
                  join col_competencias on col_ciclos.idciclo=col_competencias.idciclo 
                    WHERE col_ciclos.abreviatura='".$ciclo."' 
                      order by col_ciclos.nombre asc;";
      $result = mysql_query($query, $this->conexion);
      $competencias=array();

      while ($row = mysql_fetch_assoc($result)){
        $competencias[]=$row['competencia'];
        
      }
      return $competencias;

    }
    public function todasCompetencias(){

      $query="select nombre as competencia from col_competencias";
      $result = mysql_query($query, $this->conexion);
      $competencias=array();

      while ($row = mysql_fetch_assoc($result)){
        $competencias[]=$row;
        
      }
      return $competencias;

    }

      public function dameCiclos(){

      $sql = "select * from col_ciclos order by nombre asc";

      $result = mysql_query($sql, $this->conexion);

      $ciclos = array();
      $i=0;
      while ($row = mysql_fetch_assoc($result)){
        $ciclos[] = $row;
        $ciclos[$i]['competencias']=$this->dameCompetencias($ciclos[$i]['abreviatura']);
        $i++;
      }
      return $ciclos;
    }
    public function dameOferta($cod_act,$id){

      if($id=="0"){
        $query="SELECT * FROM col_ofertas WHERE cod_act='$cod_act'";
        $result=mysql_query($query);
        $oferta=mysql_fetch_assoc($result);

        return $oferta;
      }else{
        
        $query="SELECT * FROM col_ofertas WHERE idoferta='$id'";
        $result=mysql_query($query);
        $oferta=mysql_fetch_assoc($result);

        return $oferta;
      }

    }

    public function alumnosCumpleCompe($id){

      $query="SELECT * FROM col_oferta_competencia WHERE idoferta='$id'";
      $result = mysql_query($query, $this->conexion);    

      while ($row = mysql_fetch_assoc($result)['idcompetencia']){
        $competencias[]=$row;
      }    
     
     $cant=count($competencias);    

     $query="SELECT col_alumnos.idalumno, col_alumnos.correo, col_alumnos.nombre, col_competencias.idcompetencia, COUNT(*) as cantidad
              FROM col_alumnos 
                JOIN col_alum_ciclo ON col_alumnos.idalumno=col_alum_ciclo.idalumno 
                  JOIN col_competencias ON col_alum_ciclo.idciclo=col_competencias.idciclo 
                     WHERE col_competencias.idcompetencia=".$competencias[0];
     for($i=1;$i<$cant;$i++){
      $query=$query." OR col_competencias.idcompetencia='".$competencias[$i]."'";
     }
     $query=$query." GROUP BY col_alumnos.idalumno;";
     $result = mysql_query($query, $this->conexion);
     $alumnos=array();
     
      while ($row = mysql_fetch_assoc($result)){
      
      if($row['cantidad']==$cant){
        $alumnos[]=$row;
      }
    } 
    return $alumnos;
    }

    function dameURL(){
      //$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
      $url="http://".$_SERVER['HTTP_HOST'];
      return $url;
    }

    function genera_random($longitud){  
      $exp_reg="[^A-Z0-9]";  
      return substr(eregi_replace($exp_reg, "", md5(rand())) .  
         eregi_replace($exp_reg, "", md5(rand())) .  
         eregi_replace($exp_reg, "", md5(rand())),  
         0, $longitud);  
    }

    // CORREOS //

    public function correoAEmpresa(){
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
          $mail->From = "ColoWorkDAW@gmail.com";
          $mail->FromName = "ColoWork";
          $mail->Subject = "Activar Empresa";
          $mail->AddAddress("ColoWorkDAW@gmail.com","Sergio");
          //$mail->AddAddress("travian-arnoll@hotmail.com","Sergio"); 
          $idempresa=$this->getIdEmpresa($_POST['user']);
          $cod_act=$this->dameEmpresa($idempresa)['cod_act'];                                              
          $body  = "La Empresa <b>".$_POST['nombre']."</b><br>";
          $body  .= "Con los siguientes datos:<br>";
          $body  .= "Se dedica a <b>".$_POST['actividad']."</b><br>";
          $body  .= "Con correo <b>".$_POST['correo']."</b><br>";
          $body  .= "Numero telefono <b>".$_POST['telefono']."</b><br>";
          $body  .= "Direccion <b>".$_POST['direccion']."</b><br>";
          $body  .= "Id Fiscal <b>".$_POST['idfiscal']."</b><br>";

          $body .= "Se ha registrado para permitirle la creacion de ofertas<br>";
          $body .= "Debes activarla en el siguiente link: <br>";
          $url=$this->dameURL();
          //Config::$pro_vis_url
          $body .= $url."/tikka/ColoWork/web/index.php?ctl=activarEmpresa&id=".$cod_act;

          $mail->Body = $body;
                
          $mail->Send();
          // if(!$mail->Send()) {
          //       echo "Error: " . $mail->ErrorInfo;
          // } else {
          //       echo "Enviado!";
          // }
          $mensaje = 'Se ha registrado con exito.Necesitamos confirmacion del administrador para que usted pueda crear oferta, tenga paciencia'; 
      
      return $mensaje;
    }

    public function correoSOferta(){
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
      $mail->From = "ColoWorkDAW@gmail.com";
      $mail->FromName = "ColoWork";
      $mail->Subject = "Activar Oferta";
      $mail->AddAddress("ColoWorkDAW@gmail.com","Sergio");
      $idoferta=$this->getIdOferta();
      $cod_act=$this->dameOferta("0",$idoferta)['cod_act'];
      $url=$this->dameURL();
      $nombreEmpresa=$this->getNombreEmpresa($this->getIdEmpresa($_SESSION['user']));                                            
      $body  = "La Empresa <b>".$nombreEmpresa."</b><br>";
      $body  .= "Esta intentando dar de alta una oferta con las siguientes caractesiticas<br>";
      $body  .= "Titulo <b>".$_POST['titulo']."</b><br>";
      $body  .= "Descripcion <b>".$_POST['descripcion']."</b><br>";
      $competencias=implode(".", $_POST['competencias']);
      $body  .= "Competencias <b>".$competencias."</b><br>";

      $body  .= "Si quiere pasarsela a sus alumnos haga click en el siguiente enlace:<br>";
      $body .= $url."/tikka/ColoWork/web/index.php?ctl=activarOferta&id=".$cod_act;
      $mail->Body = $body;

      /*$mail->Send();*/
      if(!$mail->Send()) {
          $mensaje = "Error: " . $mail->ErrorInfo;
      } else {
            $mensaje="Solicitud de Oferta creada con exito, se ha enviado un mensaje al adminsitrador";
      }
      return $mensaje;
    }

    public function correoEAlumnos(){
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
      $mail->From = "ColoWorkDAW@gmail.com";
      $mail->FromName = "ColoWork";
      $mail->Subject = "Nueva Oferta";
      $cod_act=$_GET['id'];
      $oferta=$this->dameOferta($cod_act,"0");
      
      $alumnos=$this->alumnosCumpleCompe($oferta['idoferta']);
      for($i=0;$i<count($alumnos);$i++){
          $mail->AddAddress($alumnos[$i]['correo'],$alumnos[$i]['nombre']);
          echo $alumnos[$i]['correo']."<br>";
      }     
                                              
      $body  = "Hola,<br>";
      $body  .= "Le informamos de la nueva oferta que acabamos de recibir, quizas pueda interesarte:<br>";
      $body  .= "Titulo <b>".$oferta['titulo']."</b><br>";
      $body  .= "Descripcion <b>".$oferta['descripcion']."</b><br>";
      $body  .= "Ubicacion <b>".$oferta['ubicacion']."</b><br>";
      $body  .= "Contrato <b>".$oferta['contrato']."</b><br>";
      $body  .= "Jornada <b>".$oferta['jornada']."</b><br>";
      $body  .= "Salario <b>".$oferta['salario']."</b><br>";
      $body  .= "Si quiere ver informacion de la empresa haga click en el siguiente enlace:<br>";
      $body .= Config::$pro_vis_url."?ctl=verEmpresa&id=".$oferta['idempresa'];
      $mail->Body = $body;            
      /*$mail->Send();*/
      if(!$mail->Send()) {
            $mensaje="Error: " . $mail->ErrorInfo;
      } else {
            $mensaje="Oferta Enviada a los alumnos con exito.";
      }
      return $mensaje;
    }

}
