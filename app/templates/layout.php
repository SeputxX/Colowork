
<!DOCTYPE html>
<html>
  <head>
    <title>ColoWork</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="<?php echo 'css/'.Config::$pro_vis_css ?>" />
    <link rel="shortcut icon" href="../web/img/favico/favicon.ico" type="image/x-icon"/>
    <link href="../web/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  </head>
  <body >
    <!-- <div id="cabecera">
      
    </div> -->
    <div id="menu">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>            
            <a class="navbar-brand"  href="index.php?ctl=inicio"><img class="logo" src="../web/img/logos/1_Primary_logo_on_transparent_197x75.png"></a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            <li><a href="index.php?ctl=listarEmpresas">Empresas</a></li>
            <li><a href="index.php?ctl=verOfertas">Ofertas</a></li>
            <?php if(isset($_SESSION['user'])){ ?>

              <li><a href="index.php?ctl=verAlumnos">Alumnos</a></li>
              <li><a href="index.php?ctl=verProfesores">Profesores</a></li>               

              <?php if($_SESSION['rol']=="centro" || $_SESSION['rol']=="admin"){ ?>
              <li><a href="index.php?ctl=verCiclos">Ciclos Formativos</a></li>

              <?php } ?>
            <?php } ?>

              
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <form class="navbar-form navbar-left" method="POST" action="index.php?ctl=buscar" role="search">
                <div class="form-group"> 
                  <input type="text" name="buscarGeneral" class="form-control" placeholder="Buscar...">
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>
              </form>

              <?php if(isset($_SESSION['user'])){ ?>

              <li class="dropdown">
              <a href="index.php?ctl=login" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hola, <?php echo $_SESSION['user'] ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <?php if($_SESSION['rol']!="admin"){ ?>        
                  <li><a href="index.php?ctl=verPerfil">Ver Perfil</a></li> 
                  <?php } ?>                
                 
                 <?php if($_SESSION['rol']=="admin"){ ?>
                 <li><a href="index.php?ctl=altaCentro">Alta Usuario Centro</a></li>
                 <?php } ?>
                 <?php if($_SESSION['rol']=="centro" || $_SESSION['rol']=="admin"){ ?>

                 <li><a href="index.php?ctl=altaCiclo">Alta Ciclo Formativo</a></li>
                 <li><a href="index.php?ctl=altaActividad">Alta Actividad</a></li>

                 <?php } ?>

                 <?php if($_SESSION['rol']=="empresa" && $_SESSION['ofertas']=="si"){ ?>

                  <li><a href="index.php?ctl=crearOferta">Crear Oferta</a></li>                  

                  <?php } ?>



                  
                  <li><a href="index.php?ctl=logout">Cerrar Sesion</a></li>
                </ul>                
              </li>

              <?php }else{ ?>

              <li><a href="index.php?ctl=login">Login</a></li>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registro<span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="index.php?ctl=regEmpresa">Empresa</a></li>
                                <li><a href="index.php?ctl=altaAlumno">Alumno</a></li>
                              </ul>

              <?php } ?>

            </ul>
            </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
          <hr/>
        </div>
        <div id="contenido">
          <?php echo $contenido ?>
        </div>
        <div id="pie">
          <div align="center">
            <nav class="navbar navbar-default navbar-fixed-bottom ">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#footer" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse " id="footer">
                  <ul class="nav navbar-nav">
                    <li><a href="index.php?ctl=conLeg">Aviso Legal</a></li>
                    <li><a href="index.php?ctl=cookies">Politica de Cookies</a></li>
                    <li><a href="index.php?ctl=contacto">Contacto</a></li>
                  </ul>
                  </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
              </div>
            </div>
            <div id="barraaceptacion" style="display: none;">
                <div class="inner">
                    Este sitio web hace uso de cookies, Si continúa navegando consideramos que acepta el uso de cookies
                    <a href="javascript:void(0);" class="ok" onclick="PonerCookie();"><b>OK</b></a> | 
                    <a href="index.php?ctl=cookies" target="_blank" class="info">Más información</a>
                </div>
            </div>
            <!-- Bootstrap core JavaScript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="../web/js/bootstrap.min.js"></script>
          </body>
        </html>