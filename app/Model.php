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
  public function datosUsuario($user){
    $query="SELECT iduser,rol FROM col_usuarios WHERE user='$user';";

    $result = mysql_query($query, $this->conexion);
    $row = mysql_fetch_assoc($result);

    return $row;
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
  public function insertarEmpresa($n, $a, $idf, $r, $d, $p, $pais, $pro, $cod, $tel, $fax,$user,$pass,$rol){
    
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

         //echo $n." ".$a." ".$idf." ".$r." ".$d." ".$p." ".$pais." ".$pro." ".$cod." ".$tel." ".$fax." ".$user." ".$pass." ".$rol;

         $query= "INSERT INTO `col_empresas`(`nombre`, `actividad`, `idfiscal`, `razon`, `direccion`, `poblacion`, `pais`, `provincia`, `codpostal`, `telefono`, `fax`,`user`)
         VALUES ('$n','$a','$idf','$r','$d','$p','$pais','$pro',$cod,$tel,$fax,'$user')";
         $result = mysql_query($query, $this->conexion);

         $query1="INSERT INTO `col_usuarios`(`user`,`pass`,`rol`) VALUES('$user','$pass','$rol')";
         $result1 = mysql_query($query1, $this->conexion);

         if($result==true && $result1==true){
          return true;
         }else{
          return false;
         }
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
      public function insertarOferta($t,$d,$u,$c,$j,$s,$ide) {

         $t = htmlspecialchars($t);
         $d = htmlspecialchars($d);
         $u = htmlspecialchars($u);         
         $c = htmlspecialchars($c);
         $j = htmlspecialchars($j);
         $s = htmlspecialchars($s);
         $ide = htmlspecialchars($ide);

          $query= "INSERT INTO `col_ofertas`(`titulo`, `descripcion`, `ubicacion`, `contrato`, `jornada`, `salario`, `idempresa`)
          VALUES ('$t','$d','$u','$c','$j','$s','$ide')";
          $result = mysql_query($query, $this->conexion);

          return $result;
         
      }   
      public function todasOfertas(){

       $query="SELECT * FROM col_ofertas";

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
}