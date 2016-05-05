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
    $query="SELECT ofertas FROM col_empresas where iduser='$id';";

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
      $sql = "select col_alumnos.fecha,col_alumnos.iduser,col_usuarios.url, col_alumnos.nombre, col_alumnos.apellidos,col_alumnos.direccion,col_alumnos.estado,col_alumnos.transporte from col_alumnos join col_usuarios on col_alumnos.iduser=col_usuarios.iduser order by nombre asc";

      $result = mysql_query($sql, $this->conexion);

      if($result){

        $alumnos = array();

        while ($row = mysql_fetch_assoc($result)){
          $iduser=$row['iduser'];
          $sql2 = "select col_ciclos.nombre from col_ciclos join col_alum_ciclo on col_alum_ciclo.idciclo=col_ciclos.idciclo where iduser=$iduser";
          $result2 = mysql_query($sql2, $this->conexion);
          $ciclos=array();
          if($result2){
            while ($row2 = mysql_fetch_assoc($result2)){
              $ciclos[]=$row2['nombre'];          
            }
            $titulos=implode('<br>', $ciclos);
            $row['titulos']=$titulos;
            $alumnos[] = $row;
          }
        }
      return $alumnos;
    }
  }

  public function dameEmpresas(){
      $sql = "SELECT col_empresas.iduser,col_empresas.nombre, col_empresas.actividad, col_empresas.idfiscal, col_empresas.razon, col_empresas.direccion, col_empresas.poblacion ,col_empresas.pais, col_empresas.provincia, col_empresas.codpostal, col_empresas.telefono, col_empresas.fax, col_empresas.ofertas,col_empresas.correo, COUNT(*) as numofe
       FROM col_empresas JOIN col_ofertas ON col_empresas.iduser=col_ofertas.iduser GROUP BY col_empresas.iduser";

      $result = mysql_query($sql, $this->conexion);

      $empresas = array();
      
      while ($row = mysql_fetch_assoc($result)){
        $empresas[] = $row;
      }    
    
      return $empresas;
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

           //echo $n." ".$a." ".$idf." ".$r." ".$d." ".$p." ".$pais." ".$pro." ".$cod." ".$tel." ".$fax." ".$user." ".$pass." ".$rol;


         $query="INSERT INTO `col_usuarios`(`user`,`pass`,`rol`) VALUES('$user','$pass','$rol')";
         $result = mysql_query($query, $this->conexion); 
                 
         
         if ($result) {
           $iduser=$this->getIdUser($user);
           $cod_act=$this->genera_random(20);
           //echo $iduser." ".$n." ".$a." ".$idf." ".$r." ".$d." ".$p." ".$pais." ".$pro." ".$cod." ".$tel." ".$fax." ".$user." ".$es." ".$correo." ".$cod_act;
           $query= "
           INSERT INTO `col_empresas`(`iduser`, `nombre`, `actividad`, `idfiscal`, `razon`, `direccion`, `poblacion`, `pais`, `provincia`, `codpostal`, `telefono`, `fax`, `ofertas`, `correo`, `cod_act`) VALUES
           ('$iduser','$n','$a','$idf','$r','$d','$p','$pais','$pro','$cod',$tel,$fax,'$es','$correo','$cod_act');";
           $result = mysql_query($query, $this->conexion);
           //var_dump($result);
         }
         return $result;

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

     

     public function dameEmpresa($id){

       $query="SELECT * FROM col_empresas where iduser=$id";

       $result = mysql_query($query, $this->conexion);

       $row = mysql_fetch_assoc($result);

       return $row;

     }
     public function cantidadAlumnos($com){

      $competencias=explode('a', $com);      

      $cant=count($competencias);

      $query="SELECT col_alumnos.iduser, col_alumnos.correo, col_alumnos.nombre, col_competencias.idcompetencia, count(*) as cantidad 
              FROM col_alumnos 
                JOIN col_alum_ciclo ON col_alumnos.iduser=col_alum_ciclo.iduser 
                  JOIN col_competencias ON col_alum_ciclo.idciclo=col_competencias.idciclo 
                     WHERE col_competencias.idcompetencia=".$competencias[0];
      for($i=1;$i<$cant-1;$i++){
        $query=$query." OR col_competencias.idcompetencia='".$competencias[$i]."'";
       }
      $query=$query." GROUP BY col_alumnos.iduser;";

      $result = mysql_query($query, $this->conexion);

      if($result){

        $alumnos=array();

        while($row = mysql_fetch_assoc($result)){
          if($row['cantidad']==$cant-1){          
            $alumnos[]=$row;
          }
        }
        //var_dump($alumnos);
        $json_string = json_encode($alumnos);
      
        return $json_string;
      }
    }
    public function dameUrlFoto($id){

        $query="SELECT url FROM col_usuarios where iduser=$id";
        $result = mysql_query($query, $this->conexion);
        $row = mysql_fetch_assoc($result)['url'];
        
        return $row;
    }
     public function dameAlumno($id){

       $query="SELECT col_alumnos.iduser,col_alumnos.nombre,col_alumnos.apellidos,col_alumnos.sexo,col_alumnos.direccion,col_alumnos.correo,col_alumnos.nacionalidad,col_alumnos.fecha,col_alumnos.estado,col_alumnos.transporte,col_alumnos.otros,col_usuarios.url FROM col_alumnos JOIN col_usuarios on col_alumnos.iduser=col_usuarios.iduser where col_alumnos.iduser=$id";

       $result = mysql_query($query, $this->conexion);

       $row = mysql_fetch_assoc($result);

       $array=$this->dameTitulosAlu($id);
       $idiomas=$this->dameIdiomasAlu($id);
       $experiencia=$this->dameexperienciaAlu($id);
       $titulos=implode("<br>", $array);
       $row['titulos']=$titulos;
       $row['idiomas']=$idiomas;
       $row['experiencia']=$experiencia;
       return $row;

     }

  public function dameIdiomasAlu($id){

    $query="select col_usuarios.iduser, col_alum_idiomas.nombre,col_alum_idiomas.fecha,col_alum_idiomas.nivel_hablado,col_alum_idiomas.nivel_escrito 
    FROM col_usuarios JOIN col_alum_idiomas ON col_usuarios.iduser=col_alum_idiomas.iduser where col_usuarios.iduser=$id";
    $result=mysql_query($query,$this->conexion);

    $idiomas=array();
       while($row = mysql_fetch_assoc($result)){
       
        $idiomas[]=$row;
       }

    return $idiomas;
  }

  public function dameexperienciaAlu($id){

    $query="select col_usuarios.iduser, col_alum_experiencia.descripcion,col_alum_experiencia.ffinal,col_alum_experiencia.finicio FROM col_usuarios JOIN col_alum_experiencia ON col_usuarios.iduser=col_alum_experiencia.iduser where col_usuarios.iduser=$id
";
    $result=mysql_query($query,$this->conexion);

    $experiencia=array();
       while($row = mysql_fetch_assoc($result)){
       
        $experiencia[]=$row;
       }

      return $experiencia;
  }     

     public function dameTitulosAlu($id){

      $query="SELECT col_ciclos.nombre FROM col_alumnos join col_alum_ciclo on col_alumnos.iduser=col_alum_ciclo.iduser join col_ciclos on col_ciclos.idciclo=col_alum_ciclo.idciclo where col_alumnos.iduser=$id";

      $result = mysql_query($query, $this->conexion);
      $titulos=array();
       while($row = mysql_fetch_assoc($result)){
       
        $titulos[]=$row['nombre'];
       }

      return $titulos;

     }
     public function dameTitulosIDAlu($id){

      $query="SELECT col_ciclos.idciclo FROM col_alumnos join col_alum_ciclo on col_alumnos.iduser=col_alum_ciclo.iduser join col_ciclos on col_ciclos.idciclo=col_alum_ciclo.idciclo where col_alumnos.iduser=$id";

      $result = mysql_query($query, $this->conexion);
      $titulos=array();
       while($row = mysql_fetch_assoc($result)){
       
        $titulos[]=$row['idciclo'];
       }

      return $titulos;

     }
      public function modificarCentro($id,$n,$a,$c,$o){
        $query="UPDATE `col_profesores` SET `nombre`='$n',`apellidos`='$a',`correo`='$c',`ocupacion`='$o' WHERE iduser=$id";
        if($result=mysql_query($query)){
          $id=$this->getIdUser($_SESSION['user']);
          
          $query="UPDATE col_usuarios SET user='$n' WHERE iduser='$id'";
          $result=mysql_query($query);
          
        }
        return $result;
      }
      public function modificarAlumno($user,$nombre,$apellidos,$direccion,$correo,$nacionalidad,$fecha,$sexo,$titulos,$idiomas,$estado,$transporte,$experiencia,$otros){
        $nombre=htmlspecialchars($nombre);        
        $user=htmlspecialchars($user);
        $apellidos=htmlspecialchars($apellidos);
        $direccion=htmlspecialchars($direccion);
        $correo=htmlspecialchars($correo);
        $nacionalidad=htmlspecialchars($nacionalidad);
        $fecha=htmlspecialchars($fecha);       
        $sexo=htmlspecialchars($sexo);

        $idiomas=htmlspecialchars($idiomas);
        $estado=htmlspecialchars($estado);
        $transporte=htmlspecialchars($transporte);
        $experiencia=htmlspecialchars($experiencia);
        $otros=htmlspecialchars($otros);  
        $id=$_SESSION['id'];
        $query="UPDATE col_alumnos 
                SET nombre='$nombre',apellidos='$apellidos',direccion='$direccion', correo='$correo', nacionalidad='$nacionalidad', fecha='$fecha', sexo='$sexo', idiomas='$idiomas', estado='$estado',transporte='$transporte', experiencia='$experiencia',otros='$otros' WHERE iduser=$id;";
        $result=mysql_query($query);
        //var_dump($result);
        if($result){          
          
          $query="UPDATE col_usuarios SET user='$user' WHERE iduser='$id'";
          $result=mysql_query($query);
          //var_dump($result);

          if($result){

            $query="DELETE FROM `col_alum_ciclo` WHERE iduser=$id";
            $result=mysql_query($query);
            //var_dump($result);

            if($result){

              foreach($titulos as $titulo=>$valor){

                $idti=$this->getIdTitulo($valor);              
                $query="INSERT INTO col_alum_ciclo(iduser,idciclo) VALUES($id,$idti);";
                $result= mysql_query($query, $this->conexion);
                //var_dump($result);
            }
          } 
          
        }
      }
        return $result;
      }
      public function modificarEmpresa($id, $n, $a, $idf, $r, $d, $p, $pais, $pro, $cod, $tel, $fax,$user,$correo){
            //echo $n." ".$a." ".$idf." ".$r." ".$d." ".$p." ".$pais." ".$pro." ".$cod." ".$tel." ".$fax." ".$user;
        $id=htmlspecialchars($id);
        $n=htmlspecialchars($n);
        $a=htmlspecialchars($a);
        $idf=htmlspecialchars($idf);
        $r=htmlspecialchars($r);
        $d=htmlspecialchars($d);
        $p=htmlspecialchars($p);
        $pais=htmlspecialchars($pais);
        $pro=htmlspecialchars($pro);
        $cod=htmlspecialchars($cod);
        $tel=htmlspecialchars($tel);
        $fax=htmlspecialchars($fax);
        $user=htmlspecialchars($user);
        $correo=htmlspecialchars($correo);        
        $query="UPDATE `col_empresas` SET `nombre`='$n',`actividad`='$a',`idfiscal`=$idf,`razon`='$r',`direccion`='$d',`poblacion`='$p',`pais`='$pais',`provincia`='$pro',`codpostal`='$cod',`telefono`=$tel,`fax`=$fax,`correo`='$correo' WHERE  iduser=$id;";
        $result=mysql_query($query);
        //var_dump($result);
        if($result){
         
          $id=$this->getIdUser($_SESSION['user']);
          
          $query="UPDATE col_usuarios SET user='$user' WHERE iduser=$id";
          $result=mysql_query($query);

        }
        return $result;
      }     
     public function dameProfesor($id){
      
       $query="SELECT * FROM col_profesores where iduser=$id";

       $result = mysql_query($query, $this->conexion);

       $row = mysql_fetch_assoc($result);

       return $row;

     }
     public function getIdUser($user){
      
       $query="SELECT iduser FROM col_usuarios where user='$user'";

       $result = mysql_query($query, $this->conexion);

       $row = mysql_fetch_assoc($result)['iduser'];

       return $row;
     }
     public function dameCompetenciasAlu($id){

      $query="SELECT iduser,idcompetencia, col_competencias.nombre 
        FROM col_alum_ciclo JOIN col_ciclos ON col_alum_ciclo.idciclo=col_ciclos.idciclo 
          JOIN col_competencias ON col_ciclos.idciclo=col_competencias.idciclo
            where iduser=$id";
      $result = mysql_query($query, $this->conexion);
      $competencias=array();
       while ($row = mysql_fetch_assoc($result))
         {
             $competencias[] = $row['nombre'];
         }
         return $competencias;

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
      
      public function getNombreEmpresa($id){

        $query="SELECT nombre FROM col_empresas where iduser=$id";

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
      
      public function insertarOferta($z,$t,$d,$c,$j,$s,$ide,$compe) {

         $t = htmlspecialchars($t);
         $d = htmlspecialchars($d);
         $z = htmlspecialchars($z);         
         $c = htmlspecialchars($c);
         $j = htmlspecialchars($j);
         $s = htmlspecialchars($s);
         $ide = htmlspecialchars($ide);

         $cod_act=$this->genera_random(20);

         $competencias=implode(".", $compe);
         //echo $t."<br> ".$d."<br> ".$u."<br> ".$c."<br> ".$j."<br> ".$s."<br> ".$ide."<br> ".$competencias."<br> "."<br>no"." <br>".$cod_act;
         $query= "INSERT INTO `col_ofertas`(`titulo`, `descripcion`, `contrato`, `jornada`, `salario`, `iduser`, `competencias`,`zona`,`activa`,`cod_act`)
          VALUES ('$t','$d','$c','$j','$s','$ide','$competencias','$z','no','$cod_act')";
          $result = mysql_query($query, $this->conexion);
          var_dump($result);
         if($result){
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
      public function buscarGeneral($buscar){

      $profesores=$this->buscarProfesores($buscar);
      $ofertas=$this->buscarOfertas($buscar);
      $empresas=$this->buscarEmpresas($buscar);
      $alumnos=$this->buscarAlumnos($buscar);

      if(!empty($profesores) || !empty($ofertas) || !empty($empresas) || !empty($alumnos)){ 

      $resultados=array(
        'profesores'=>$profesores,
        'ofertas'=>$ofertas,
        'empresas'=>$empresas,
        'alumnos'=>$alumnos
        );
      }else{
        $resultados=array();
      }

      return $resultados;

      }
      public function buscarOfertas($buscar){

       $query="SELECT idoferta, `titulo`,`descripcion`,`zona`,`contrato`,`jornada`,`salario`,col_empresas.iduser , col_empresas.nombre 
                FROM `col_ofertas` JOIN col_empresas on col_ofertas.iduser=col_empresas.iduser WHERE 
              `titulo` LIKE '%".$buscar."%' 
            OR `descripcion` LIKE '%".$buscar."%' 
            OR `contrato` LIKE '%".$buscar."%' 
            OR `jornada` LIKE '%".$buscar."%' 
            OR `salario` LIKE '%".$buscar."%' 
            OR `competencias` LIKE '%".$buscar."%' 
            OR `zona` LIKE '%".$buscar."%'";

      $result = mysql_query($query, $this->conexion);

       $ofertas = array();
       if($result){
         while ($row = mysql_fetch_assoc($result)){

          $idoferta=$row['idoferta'];
          $query2="SELECT col_competencias.nombre FROM `col_competencias` join col_oferta_competencia on col_competencias.idcompetencia=col_oferta_competencia.idcompetencia 
          WHERE col_oferta_competencia.idoferta='$idoferta'";
          $result2 = mysql_query($query2, $this->conexion);
          $compe=array();
          while ($row2 = mysql_fetch_assoc($result2)){
            $compe[] = $row2['nombre'];          
          }
          $competencias=implode('</li><li>', $compe);
          $row['competencias']=$competencias;
          $ofertas[] = $row;
        }
      }

       return $ofertas;

      }
      public function buscarProfesores($buscar){                     

       $query="SELECT * FROM `col_profesores` WHERE 
       `nombre` LIKE '%".$buscar."%' 
           OR `apellidos` LIKE '%".$buscar."%' 
           OR `correo` LIKE '%".$buscar."%' 
           OR `ocupacion` LIKE '%".$buscar."%'";

       $result = mysql_query($query, $this->conexion);

       $profesores = array();
         while ($row = mysql_fetch_assoc($result))
         {
             $profesores[] = $row;
         }

       return $profesores;

      }
      public function buscarAlumnos($buscar){

       $query="SELECT * FROM `col_alumnos` WHERE 
        `nombre` LIKE '%".$buscar."%' 
           OR `apellidos` LIKE '%".$buscar."%' 
           OR `sexo` LIKE '%".$buscar."%' 
           OR `direccion` LIKE '%".$buscar."%' 
           OR `correo`LIKE '%".$buscar."%' 
           OR `nacionalidad`LIKE '%".$buscar."%' 
           OR `fecha` LIKE '%".$buscar."%' 
           OR `estado` LIKE '%".$buscar."%' 
           OR `transporte` LIKE '%".$buscar."%' 
           OR `experiencia` LIKE '%".$buscar."%' 
           OR `idiomas` LIKE '%".$buscar."%' 
           OR `otros` LIKE '%".$buscar."%'";

       $result = mysql_query($query, $this->conexion);

       if($result){

        $alumnos = array();

        while ($row = mysql_fetch_assoc($result)){
          $iduser=$row['iduser'];
          $sql2 = "select col_ciclos.nombre from col_ciclos join col_alum_ciclo on col_alum_ciclo.idciclo=col_ciclos.idciclo where iduser=$iduser";
          $result2 = mysql_query($sql2, $this->conexion);
          $ciclos=array();
          if($result2){
            while ($row2 = mysql_fetch_assoc($result2)){
              $ciclos[]=$row2['nombre'];          
            }
            $titulos=implode('<br>', $ciclos);
            $row['titulos']=$titulos;
            $alumnos[] = $row;
          }
        }
      return $alumnos;
    }

      }
      public function buscarEmpresas($buscar){

       $query="SELECT col_empresas.iduser,col_empresas.nombre, col_empresas.actividad, col_empresas.idfiscal, col_empresas.razon, col_empresas.direccion, col_empresas.poblacion ,col_empresas.pais, col_empresas.provincia, col_empresas.codpostal, col_empresas.telefono, col_empresas.fax, col_empresas.ofertas,col_empresas.correo, COUNT(*) as numofe
       FROM col_empresas JOIN col_ofertas ON col_empresas.iduser=col_ofertas.iduser WHERE `nombre` LIKE '%".$buscar."%' 
           OR `actividad` LIKE '%".$buscar."%' 
           OR `idfiscal`LIKE '%".$buscar."%' 
           OR `razon` LIKE '%".$buscar."%' 
           OR `direccion` LIKE '%".$buscar."%' 
           OR `poblacion` LIKE '%".$buscar."%' 
           OR `pais` LIKE '%".$buscar."%' 
           OR `provincia`LIKE '%".$buscar."%' 
           OR `codpostal` LIKE '%".$buscar."%' 
           OR `correo` LIKE '%".$buscar."%'";

       $result = mysql_query($query, $this->conexion);

       $empresas = array();
         while ($row = mysql_fetch_assoc($result))
         {
             $empresas[] = $row;
         }

         if(is_null($empresas[0]['iduser'])){
          $empresas=array();
         }

       return $empresas;

      }
      public function dameOfertas($id){

       $query="SELECT * FROM col_ofertas where iduser=$id";

       $result = mysql_query($query, $this->conexion);

       $ofertas = array();
       if($result){
         while ($row = mysql_fetch_assoc($result)){

          $idoferta=$row['idoferta'];
          $query2="SELECT col_competencias.nombre FROM `col_competencias` join col_oferta_competencia on col_competencias.idcompetencia=col_oferta_competencia.idcompetencia 
          WHERE col_oferta_competencia.idoferta='$idoferta'";
          $result2 = mysql_query($query2, $this->conexion);
          $compe=array();
          while ($row2 = mysql_fetch_assoc($result2)){
            $compe[] = $row2['nombre'];          
          }
          $competencias=implode('</li><li>', $compe);
          $row['competencias']=$competencias;
          $ofertas[] = $row;
        }
      }

      return $ofertas;

     } 
      public function todasOfertas(){

       $query="SELECT zona,idoferta, `titulo`,`descripcion`,`zona`,`contrato`,`jornada`,`salario`,col_empresas.iduser , col_empresas.nombre 
                FROM `col_ofertas` JOIN col_empresas on col_ofertas.iduser=col_empresas.iduser WHERE activa='si'";

       $result = mysql_query($query, $this->conexion);

       $ofertas = array();
       if($result){
         while ($row = mysql_fetch_assoc($result)){

          $idoferta=$row['idoferta'];
          $query2="SELECT col_competencias.nombre FROM `col_competencias` join col_oferta_competencia on col_competencias.idcompetencia=col_oferta_competencia.idcompetencia 
          WHERE col_oferta_competencia.idoferta='$idoferta'";
          $result2 = mysql_query($query2, $this->conexion);
          $compe=array();
          while ($row2 = mysql_fetch_assoc($result2)){
            $compe[] = $row2['nombre'];          
          }
          $competencias=implode('</li><li>', $compe);
          $row['competencias']=$competencias;
          $ofertas[] = $row;
        }
      }

       return $ofertas;

      }

      

      public function dameTitulos(){

       $query="SELECT * FROM col_ciclos";

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
      // COMPROBACIONES

      public function comprobarUser($user){

        $query="SELECT COUNT(*) AS coin FROM `col_usuarios` WHERE user='$user'";
        $result= mysql_query($query, $this->conexion);
        $row=mysql_fetch_assoc($result)['coin'];
        
        return $row;
      }
      public function comprobarFoto(){

        // Primero, hay que validar que se trata de un JPG/GIF/PNG
        $allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "GIF", "PNG");
        $extension = end(explode(".", $_FILES["foto"]["name"]));
        if ((($_FILES["foto"]["type"] == "image/gif")
                || ($_FILES["foto"]["type"] == "image/jpeg")
                || ($_FILES["foto"]["type"] == "image/png")
                || ($_FILES["foto"]["type"] == "image/pjpeg"))
                && in_array($extension, $allowedExts)) {
            // el archivo es un JPG/GIF/PNG, entonces...
            
            $extension = end(explode('.', $_FILES['foto']['name']));
            $foto = $_POST['user'].".".$extension;
            $directorio = dirname(__FILE__)."/../web/img/users"; // directorio de tu elección
            // almacenar imagen en el servidor
            move_uploaded_file($_FILES['foto']['tmp_name'], $directorio.'/'.$foto);
            $minFoto = "user_".$foto;
            $this->resizeImagen($directorio.'/', $foto, 90, 70,$minFoto,$extension);
            //$this->resizeImagen($directorio.'/', $foto, 500, 500,$resFoto,$extension);
            //unlink($directorio.'/'.$foto);

            $path='colowork/web/img/users/'.$minFoto;
            return $path;
            
        } else { // El archivo no es JPG/GIF/PNG
            return false;
        }

      }
      function resizeImagen($ruta, $nombre, $alto, $ancho,$nombreN,$extension){
          $rutaImagenOriginal = $ruta.$nombre;
          if($extension == 'GIF' || $extension == 'gif'){
          $img_original = imagecreatefromgif($rutaImagenOriginal);
          }
          if($extension == 'jpg' || $extension == 'JPG'){
          $img_original = imagecreatefromjpeg($rutaImagenOriginal);
          }
          if($extension == 'png' || $extension == 'PNG'){
          $img_original = imagecreatefrompng($rutaImagenOriginal);
          }
          $max_ancho = $ancho;
          $max_alto = $alto;
          list($ancho,$alto)=getimagesize($rutaImagenOriginal);
          $x_ratio = $max_ancho / $ancho;
          $y_ratio = $max_alto / $alto;
          if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho 
          $ancho_final = $ancho;
          $alto_final = $alto;
        } elseif (($x_ratio * $alto) < $max_alto){
          $alto_final = ceil($x_ratio * $alto);
          $ancho_final = $max_ancho;
        } else{
          $ancho_final = ceil($y_ratio * $ancho);
          $alto_final = $max_alto;
        }
          $tmp=imagecreatetruecolor($ancho_final,$alto_final);
          imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
          imagedestroy($img_original);
          $calidad=70;
          imagejpeg($tmp,$ruta.$nombreN,$calidad);
          
      }
      public function comprobarEmpresa($n){
      
        $query="SELECT COUNT(*) as coin FROM `col_empresas` WHERE `nombre`='$n'";
        $result = mysql_query($query, $this->conexion);
        $fila = mysql_fetch_assoc($result);
      
      return $fila['coin'];
     }

      public function comprobarCodigo($codigo){

        $query="SELECT count(*) as coin FROM `col_codigo_centro` WHERE codigo='$codigo'";
        $result = mysql_query($query, $this->conexion);
        $row = mysql_fetch_assoc($result)['coin'];
        return $row;
      }

      // INSERTS

      public function insertarAlumno($user,$pass,$n,$a,$sx,$d,$co,$na,$fe,$es,$tr,$rol,$ti,$id,$nh,$ne,$des,$fi,$ff,$ft,$o,$foto){ 

        $user=htmlspecialchars($user);
        $pass=htmlspecialchars($pass);
        $n=htmlspecialchars($n);
        $a=htmlspecialchars($a);
        $sx=htmlspecialchars($sx);
        $d=htmlspecialchars($d);
        $co=htmlspecialchars($co);
        $na=htmlspecialchars($na);
        $fe=htmlspecialchars($fe);
        $es=htmlspecialchars($es);
        $tr=htmlspecialchars($tr);
        $rol=htmlspecialchars($rol);
        $o=htmlspecialchars($o);

        $query1="INSERT INTO `col_usuarios`(`user`,`pass`,`rol`,`url`) VALUES('$user','$pass','$rol','$foto')";
        $result1 = mysql_query($query1, $this->conexion);
        
        if($result1){
          $iduser=$this->getIdUser($user);
          //echo $iduser,$n,$a,$sx,$d,$co,$na,$fe,$es,$tr,$ex,$id,$o;
          $titulos = implode(".", $ti);
          $query="INSERT INTO `col_alumnos`(`iduser`, `nombre`, `apellidos`, `sexo`, `direccion`, `correo`, `nacionalidad`,
           `fecha`, `estado`, `transporte`, `otros`) 
          VALUES ('$iduser','$n','$a','$sx','$d','$co','$na','$fe','$es','$tr','$o');";
          $result= mysql_query($query, $this->conexion);          

          if($result){

            foreach($ti as $titulo=>$valor){

              $idti=$this->getIdTitulo($valor);              
              $query="INSERT INTO col_alum_ciclo VALUES('$iduser','$idti');";
              $result= mysql_query($query, $this->conexion);
            }

            if($result){
              //var_dump($result);
                for($i=0;$i<count($id);$i++){
                  $idioma=$id[$i];
                  $hablado=$nh[$i];
                  $escrito=$ne[$i];
                  $fecha=$ft[$i];
                  $query="INSERT INTO `col_alum_idiomas`( `iduser`, `nombre`, `fecha`, `nivel_hablado`, `nivel_escrito`) 
                  VALUES ($iduser,'$idioma','$fecha','$hablado','$escrito');";
                  $result= mysql_query($query, $this->conexion);
                  //var_dump($result);
                }

                if($result){
                  for($i=0;$i<count($des);$i++){
                    $descripcion=$des[$i];
                    $fini=$fi[$i];
                    $ffi=$ff[$i];
                    $query="INSERT INTO `col_alum_experiencia`(`iduser`, `finicio`, `ffinal`, `descripcion`) 
                    VALUES ($iduser,'$fini','$ffi','$descripcion')";
                    $result= mysql_query($query, $this->conexion);
                    var_dump($result);
                  }
                }
             }
          }

        }
        return $result;
      } 
      public function getIdTitulo($nombre){

      $query="SELECT idciclo FROM col_ciclos where abreviatura='$nombre'";

       $result = mysql_query($query, $this->conexion);

       $row = mysql_fetch_assoc($result)['idciclo'];        

       return $row;


     }
      public function dameProfesores(){
        $sql = "select * from col_profesores order by nombre asc";

        $result = mysql_query($sql, $this->conexion);

        $profesores = array();
        while ($row = mysql_fetch_assoc($result)){
          $profesores[] = $row;
        }
        return $profesores;

      }
      public function borrarPerfil($id){

        $query="DELETE FROM `colowork`.`col_usuarios` WHERE `col_usuarios`.`iduser` = $id";
        $result= mysql_query($query, $this->conexion);

      return $result;
      }
      public function insertarCentro($u,$n,$ap,$c,$p,$o,$r){
        $u=htmlspecialchars($u);
        $n=htmlspecialchars($n);
        $p=htmlspecialchars($p);
        $ap=htmlspecialchars($ap);
        $c=htmlspecialchars($c);
        $o=htmlspecialchars($o);
        $r=htmlspecialchars($r);        

        $query="INSERT INTO `col_usuarios`(`user`, `pass`, `rol`) VALUES ('$u','$p','$r')";
        $result= mysql_query($query, $this->conexion);

        $iduser= $this->getIdUser($u); 

        $query="INSERT INTO `col_profesores`(`iduser`, `nombre`, `apellidos`, `correo`, `ocupacion`) VALUES ('$iduser','$n','$ap','$c','$o')";          
        
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

      $query="select nombre as competencia, idcompetencia from col_competencias";
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
    public function dameCiclo($id){

      $sql = "select * from col_ciclos where idciclo=$id";

      $result = mysql_query($sql, $this->conexion);

      if($result){
     
        $ciclo = mysql_fetch_assoc($result);

        if(!empty($ciclo)){
        
          $ciclo['competencias']=$this->dameCompetencias($ciclo['abreviatura']);
          
        }
      }
       
      return $ciclo;
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


     $query="SELECT col_alumnos.iduser, col_alumnos.correo, col_alumnos.nombre, col_competencias.idcompetencia, count(*) as cantidad 
              FROM col_alumnos 
                JOIN col_alum_ciclo ON col_alumnos.iduser=col_alum_ciclo.iduser 
                  JOIN col_competencias ON col_alum_ciclo.idciclo=col_competencias.idciclo 
                     WHERE col_competencias.idcompetencia=".$competencias[0];
     for($i=1;$i<$cant;$i++){
      $query=$query." OR col_competencias.idcompetencia='".$competencias[$i]."'";
     }
     $query=$query." GROUP BY col_alumnos.iduser;";
     $result = mysql_query($query, $this->conexion);
     $alumnos=array();
     
      while ($row = mysql_fetch_assoc($result)){
      
      if($row['cantidad']==$cant){
        $alumnos[]=$row;
      }

    } 
    return $alumnos;
    }

    public function dameURL(){
      //$="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
      $url="http://".$_SERVER['HTTP_HOST']."/ColoWork/";
      return $url;
    }

    public function genera_random($longitud){  
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
          $iduser=$this->getIdUser($_POST['user']);
          $cod_act=$this->dameEmpresa($iduser)['cod_act'];                                            
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
          $body .= $url."web/index.php?ctl=activarEmpresa&id=".$cod_act;

          $mail->Body = $body;
                
          //$mail->Send();
          if(!$mail->Send()) {
                $mensaje = "Error: " . $mail->ErrorInfo;
          } else {
                 $mensaje = 'Se ha registrado con exito.Necesitamos confirmacion del administrador para que usted pueda crear oferta, tenga paciencia'; 
          }
         
      
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
      $nombreEmpresa=$this->getNombreEmpresa($_SESSION['id']);                                            
      $body  = "La Empresa <b>".$nombreEmpresa."</b><br>";
      $body  .= "Esta intentando dar de alta una oferta con las siguientes caractesiticas<br>";
      $body  .= "Titulo <b>".$_POST['titulo']."</b><br>";
      $body  .= "Descripcion <b>".$_POST['descripcion']."</b><br>";
      $competencias=implode(".", $_POST['competencias']);
      $body  .= "Competencias <b>".$competencias."</b><br>";

      $body  .= "Si quiere pasarsela a sus alumnos haga click en el siguiente enlace:<br>";
      $body .= $url."web/index.php?ctl=activarOferta&id=".$cod_act;
      $mail->Body = $body;

      /*$mail->Send();*/
      if(!$mail->Send()) {
          $mensaje = "Error: " . $mail->ErrorInfo;
      } else {
            $mensaje="Solicitud de Oferta creada con exito, se ha enviado un mensaje al administrador";
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
      if(empty($alumnos)){
        $mensaje="Ningun alumno de la base de datos cumple las competencias de esa oferta";
      }else{
        $mensaje="Oferta enviada a los alumnos:<br>";
        for($i=0;$i<count($alumnos);$i++){
            $mail->AddAddress($alumnos[$i]['correo'],$alumnos[$i]['nombre']);
            $mensaje.= $alumnos[$i]['correo']."<br>";
        }     
                                                
        $body  = "Hola,<br>";
        $body  .= "Le informamos de la nueva oferta que acabamos de recibir, quizas pueda interesarte:<br>";
        $body  .= "Titulo <b>".$oferta['titulo']."</b><br>";
        $body  .= "Descripcion <b>".$oferta['descripcion']."</b><br>";
        $body  .= "zona <b>".$oferta['zona']."</b><br>";
        $body  .= "Contrato <b>".$oferta['contrato']."</b><br>";
        $body  .= "Jornada <b>".$oferta['jornada']."</b><br>";
        $body  .= "Salario <b>".$oferta['salario']."</b><br>";
        $body  .= "Si quiere ver informacion de la empresa haga click en el siguiente enlace:<br>";
        $body .= Config::$pro_vis_url."?ctl=verEmpresa&id=".$oferta['iduser'];
        $mail->Body = $body;            
        /*$mail->Send();*/
        if(!$mail->Send()) {
              $mensaje="Error: " . $mail->ErrorInfo;
        }        
      }
      return $mensaje;
    }

}
