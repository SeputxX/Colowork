 <?php ob_start() ?>
<h1 style="text-align: center; margin-top:5px;">Bienvenido a ColoWork</h1>
<img class="imgini" src="../web/img/conferencia.jpg">
<br>
<h3 style="text-align: center; margin-top:20px !important">¿Qué es ColoWork?</h3>
<p class="intro">	
	Es una Aplicación Web destinada al acercamiento de alumnos, tanto que recién obtienen su titulación,
	como aquellos antiguos alumnos que lo obtuvieron tiempo atrás, a las empresas que optan	por la
	contratación de gente joven, a la que formar e instruir en el ámbito laboral.
</p>
 <?php $contenido = ob_get_clean() ?>
 <?php include 'layout.php' ?>