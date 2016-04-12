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

  public function dameEmpresas(){
      $sql = "select * from empresas order by nombre asc";

      $result = mysql_query($sql, $this->conexion);

      $empresas = array();
      while ($row = mysql_fetch_assoc($result)){
        $empresas[] = $row;
      }
      return $empresas;
  }
  public function insertarEmpresa($n, $a, $idf, $r, $d, $p, $pais, $pro, $cod, $tel, $fax){
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

         $query= "INSERT INTO `empresas`(`nombre`, `actividad`, `idfiscal`, `razon`, `direccion`, `poblacion`, `pais`, `provincia`, `codpostal`, `telefono`, `fax`)
         VALUES (".$n.",".$a.",".$idf.",".$r.",".$d.",".$p.",".$pais.",".$pro.",".$cod.",".$tel.",".$fax.")";
         $result = mysql_query($query, $this->conexion);

         return $result;
     }
}