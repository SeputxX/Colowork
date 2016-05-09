<?php 

$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890~!@#$%^&*()_-+={}[]\|:;\"'<>,.?/";
$c= strlen($str);
$t=$c+$c^2+$c^3+$c^4+$c^5+$c^6+$c^7+$c^8;
$tt=$c+$c^2+$c^3+$c^4+$c^5+$c^6+$c^7+$c^8+$c^9;
$ttt=$c+$c^2+$c^3+$c^4+$c^5+$c^6+$c^7+$c^8+$c^9+$c^10;
$tttt=$c+$c^2+$c^3+$c^4+$c^5+$c^6+$c^7+$c^8+$c^9+$c^10+$c^11;
$ttttt=$c+$c^2+$c^3+$c^4+$c^5+$c^6+$c^7+$c^8+$c^9+$c^10+$c^11+$c^12;

$total=$t+$tt+$ttt+$tttt+$ttttt;

echo number_format(423146257173757444437400);





/*$equipos=array('madrid','barsa','sevilla','betis','miraflor','orcasur');
$partidos=array();
for($i=0;$i<count($equipos);$i++){
  for($j=$i+1;$j<count($equipos);$j++){
    $partido=array(
    'id'=>$i+$j*rand(),
    'casa'=>$equipos[$i],
    'visitante'=>$equipos[$j],
    );
    $partidos[]=$partido;
    //echo $equipos[$i]." - ".$equipos[$j]."<br>";
  }
}
$tpartidos=6*5/2;
$jugados=array();

for($i=0;count($jugados)<15;$i++){
  $partido=array_rand($partidos,1);

  if(!in_array($partido,$jugados)){
    echo "Partido: ".count($jugados)." ".$partidos[$partido]['casa']." - ".$partidos[$partido]['visitante'];
    echo "<br>";
    $jugados[]=$partido;
  }  
}
//var_dump($jugados);*/
 ?>
