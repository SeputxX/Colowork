<?php 
require_once dirname(__FILE__).'/../../web/libs/html2pdf/vendor/autoload.php';
require_once __DIR__ . '/../Config.php';
require_once __DIR__ . '/../Model.php';
require_once __DIR__ . '/../Controller.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

function doPDF($path='',$content='',$body=false,$style='',$mode=false,$paper_1='P',$paper_2='A4')
{    
    if( $body!=true and $body!=false ) $body=false;
    if( $mode!=true and $mode!=false ) $mode=false;

    if( $body == true )
    {
        $content='
        <!doctype html>
        <html>
        <head>
        <style>
            '.$style.'
        </style>
        </head>
        <body>'
            .$content.
        '</body>
        </html>';
    }

    if( $content!='' )
    {
        ob_start();
        
        echo '<page>'.$content.'</page>';
        
        //Añadimos la extensión del archivo. Si está vacío el nombre lo creamos
        $path!='' ? $path .='.pdf' : $path = crearNombre(10);  
            
        $content = ob_get_clean(); 
        require_once('../../web/libs/html2pdf/vendor/autoload.php'); 
        
        //Orientación / formato del pdf y el idioma.
        $pdf = new HTML2PDF($paper_1,$paper_2,'es'/*, array(10, 10, 10, 10) /*márgenes*/); //los márgenes también pueden definirse en <page> ver documentación
        
        $pdf->WriteHTML($content);
        ob_end_clean();
        
        if($mode==false)
        {
            //El pdf es creado "al vuelo", el nombre del archivo aparecerá predeterminado cuando le demos a guardar
            $pdf->Output($path); // mostrar
            $pdf->Output($path, 'D');  //forzar descarga

        }
        else
        {
            $pdf->Output($path, 'D'); //guardar archivo ( ¡ojo! si ya existe lo sobreescribe )
            // header('Location: '.$path); // abrir
        }
    
    }

}

function crearNombre($length)
{
    if( ! isset($length) or ! is_numeric($length) ) $length=6;
    
    $str  = "0123456789abcdefghijklmnopqrstuvwxyz";
    $path = '';
    
    for($i=1 ; $i<$length ; $i++)
      $path .= $str{rand(0,strlen($str)-1)};

    return $path.'_'.date("d-m-Y_H-i-s").'.pdf';    
}
$m = new Model(Config::$pro_bd_nombre, Config::$pro_bd_usuario,
                     Config::$pro_bd_clave, Config::$pro_bd_hostname);
//Aquí pondriamos por ejemplo la consulta
$id=$_GET['id'];
$alumno=$m->dameAlumno($id);
$url=$m->dameUrl();


$html="
<div class='ficha'>
      <h1>CURRICULUM VITAE</h1>
      <table class='curriculum'>
            <tr>
                  <th class='sepa' ><b>Formato europeo <br> para el <br> Curriculum <br></b><img class='bandera' src='../../web/img/bandera-europa.png'></th>
                  <td class='datos'>
                  <img src='".$url.$alumno['url']."'></td>
            </tr>
             <tr>
                  <th class='sepa'>Datos</th>
                  <td class='datos'></td>
            </tr>
             <tr>
                  <td class='sepa' >Apellidos/Nombre</td>
                  <td class='datos'>".$alumno['apellidos']." ".$alumno['nombre']."</td>
            </tr>
             <tr>
                  <td class='sepa' >Sexo</td>
                  <td class='datos'>".$alumno['sexo']."</td>
            </tr>
             <tr>
                  <td class='sepa' >Direccion</td>
                  <td class='datos'>".$alumno['direccion']."</td>
            </tr>
             <tr>
                  <td class='sepa' >Correo</td>
                  <td class='datos'>".$alumno['correo']."</td>
            </tr>
             <tr>
                  <td class='sepa' >Nacionalidad</td>
                  <td class='datos'>".$alumno['nacionalidad']."</td>
            </tr>
             <tr>
                  <td class='sepa' >Fecha de nacimiento</td>
                  <td class='datos'>".$alumno['fecha']."</td>
            </tr>
             <tr>
                  <td class='sepa' >Títulos</td>
                  <td class='datos'>".$alumno['titulos']."</td>
            </tr>
            <tr>
                  <td class='sepa' ><b>Idiomas</b></td>
            </tr>";
            foreach ($alumno['idiomas'] as $idioma) {
            
            $html.= "<tr>
                        <td class='sepa'> ".$idioma['nombre']."</td>
                        <td class='datos'>Nivel Hablado: ".$idioma['nivel_hablado']." Nivel Escrito: ".$idioma['nivel_escrito']." Fecha Titulacion: ".$idioma['fecha']."</td>
                    </tr>";
            }
            $html .="<tr>
                      <td class='sepa'>
                        <b>Experiencia</b>
                      </td>
                    </tr>";
            foreach ($alumno['experiencia'] as $trabajo) {
            
            $html.= "<tr>
                        <td class='sepa'></td>
                        <td class='datos'> ".$trabajo['descripcion']." ".$trabajo['finicio']." - ".$trabajo['ffinal']."</td>
                    </tr>";
            }
            $html.="
            <tr>
                  <td class='sepa' >Transporte Propio </td>
                  <td class='datos'>".$alumno['transporte']."</td>
            </tr>
            <tr>
                  <th class='sepa' >Otras Informaciones</th >
                  <td class='datos'></td>
            </tr>
            <tr>
                  <td class='sepa' ></td>
                  <td class='datos'>".$alumno['otros']."</td>
            </tr>
      </table>
</div>
";
?>

<?php
$style="
.sepa{
  border-right: 1px solid;
  text-align: right;
  width: 100px;

}
.ficha{
      text-align: center;
}
table{
      text-align: left;
}

.bandera{
width: 40px;
  height: 20px;
}
.datos{
  width:400px;
}
.curriculum td, .curriculum th{
padding-left: 20px;
padding-right: 10px;
min-height: 20px;
}
.curriculum{
  width: 80%;
  margin:auto;
  border-left: 1px solid black;
  border-right: 1px solid black;
  margin-top: 10px;
  margin-bottom: 20px;
  border-collapse: collapse;
}
.perfil{
  height: 90px;
  width: 70px;
}
";


//doPDF('curriculum',$content=$html,$body=false,$style='dasda',$mode=false,$paper_1='P',$paper_2='A4');

doPDF('Curriculum',$html,true,$style,false);
?>