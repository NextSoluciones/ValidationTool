<?php 
include_once 'login/includes/db_connect.php';
include_once 'login/includes/functions.php'; 
sec_session_start();

if (login_check($mysqli) == true) : ?>	
	<!--Pagina de Contenidos -->
  <!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="herramientas de monitoreo">
    <meta name="author" content="Arturo Martinez">
    <link rel="icon" href="login/custom/favicon-control.ico">

    <title>Herramientas de Depuración</title>

    <!-- Bootstrap core CSS -->
    <link href="login/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="login/custom/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="login/custom/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="login/custom/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="login/custom/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="login/jquery/jquery.min.js"></script>

    <script type="text/javascript" src="login/bootstrap/js/bootstrap-filestyle.min.js"> </script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Next Soluciones - Herramienta de Validación</a>
        </div> 
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="login/logout.php">Cerrar Sesi&oacute;n</a></li>
          </ul>          
        </div>       
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Secuencia <span class="sr-only">(current)</span></a></li>
            <li><a href="index.php?s=1">Cargar Lista</a></li>
            <li><a href="index.php?s=2">Consultar</a></li>
            <li><a href="index.php?s=3">Descargar Resultados</a></li>
          </ul>          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">
          <?php
          $s=$_GET['s'];
          switch ($s) {
          	case 1:
          		echo "Cargar Lista</h1>";				
          		include("bin/inc/cargarLista-Form.php");
          		break;
          	case 2:
          		echo "Revisión</h1>";
				include("bin/inc/resultados.php");
          		break;
          	case 3:
          		echo "Descargar Resultados</h1>";
				include("bin/inc/gestion.php");          		
          		break;          	
          	default:
          		echo "Herramientas de Validación</h1>";
          		$url="#";
          		break;
          }
          
          ?>
          
		<?php //echo "Identificador de sesión: ".$_SESSION["user_sesion"];
?>
          <!--Aqui pongo un iframe -->
          <div class="video">
			<!--object type="text/html" data="<?=$url?>" width="602" height="250"> </object-->
<div id="content9">
<?php
//$url.="?r=eyeydr6WuB";
//apache_note('r', 'eyeydr6WuB');

//apache_setenv('PHP_ALLOW', '1');
//virtual($url);
?>
</div>
	  </div>

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="login/custom/jquery.min.js"><\/script>')</script>
    <script src="login/bootstrap/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="login/custom/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="login/custom/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

<?php else : ?>
            <!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Pagina de herramientas de monitoreo">
    <meta name="author" content="Arturo Martinez">
    <link rel="icon" href="login/custom/favicon-control.ico">

    <title>Herramientas de Validación</title>

    <!-- Bootstrap core CSS -->
    <link href="login/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="login/custom/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="login/custom/cover.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="login/custom/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

            <div class="inner cover">
            <h1 class="cover-heading">Next Soluciones - Herramienta de Validación</h1>
            <p class="lead">Es necesario iniciar sesión para acceder a esta página.</p>
            <p class="lead">
              <a href="login/login.php" class="btn btn-lg btn-default">Inicie Sesion</a>
            </p>
          </div>
          

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="login/custom/jquery.min.js"><\/script>')</script>
    <script src="login/bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="login/custom/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
<?php endif; ?>
