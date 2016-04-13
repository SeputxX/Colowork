
<!DOCTYPE html>
<html>
  <head>
    <title>ColoWork</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo 'css/'.Config::$pro_vis_css ?>" />
    <link href="../web/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <!-- <div id="cabecera">
      
    </div> -->
    <div id="menu">
      <hr/>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>            
            <a class="navbar-brand"  href="index.php?ctl=inicio"><img class="logo" src="../web/img/logo.png"></a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="index.php?ctl=listarEmpresas">Empresas</a></li>
              <li><a href="index.php?ctl=buscar">buscar por nombre</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Buscar...">
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>
              </form>
              <?php if(isset($_SESSION['user'])){ ?>
              <li class="dropdown">
              <a href="index.php?ctl=login" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hola, <?php echo $_SESSION['user'] ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="index.php?ctl=verPerfil">Ver Perfil</a></li>
                  <li><a href="index.php?ctl=crearOferta">Crear Oferta</a></li>
                  <li><a href="index.php?ctl=logout">Cerrar Sesion</a></li>
                </ul>                
              </li>
              <?php }else{ ?>
              <li><a href="index.php?ctl=login">Login</a></li>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registro<span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="index.php?ctl=regEmpresa">Empresa</a></li>
                                <li><a href="#">Alumno</a></li>
                              </ul>

              <?php } ?>
            </ul>
            </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
          <!--
          |
          <a href="index.php?ctl=insertar">insertar alimento</a> |
          <a href="index.php?ctl=buscar">buscar por nombre</a> |
          <a href="index.php?ctl=buscarAlimentosPorEnergia">buscar por energia</a> |
          <a href="index.php?ctl=buscarAlimentosCombinada">búsqueda combinada</a>
          <a href="index.php?ctl=verwiki">Enlaces Wiki</a> -->
          <hr/>
        </div>
        <div id="contenido">
          <?php echo $contenido ?>
        </div>
        <div id="pie">
          <hr/>
          <div align="center">
            <nav class="navbar navbar-default ">
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
                <div class="collapse navbar-collapse" id="footer">
                  <ul class="nav navbar-nav">
                    <li><a href="index.php?ctl=conleg">Condiciones Legales</a></li>
                    <li><a href="index.php?ctl=cookies">Politica de Cookies</a></li>
                    <li><a href="index.php?ctl=contacto">Contacto</a></li>
                  </ul>
                  </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
              </div>
              <hr/>
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