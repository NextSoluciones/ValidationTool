<?php
$error = filter_input(INPUT_GET, 'error', $filter = FILTER_SANITIZE_STRING); 
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Login error">
    <meta name="author" content="Arturo Martinez">
    <link rel="icon" href="custom/favicon-error.ico">
    
    <title>Secure Login: Error</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="custom/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="custom/sticky-footer.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="custom/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    
    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>Error de Autenticaci&oacute;n</h1>
      </div>
      <p class="lead"><?php if ($error == 1) : ?>
        Usuario o clave incorrectos
        <?php else : 
                if (!$error) :
                    echo "Ocurrió un error desconocido";
                else:
                    echo 'Error: '.$error; 
                endif;
            endif; ?> 
        </p>
      <p><a href="login.php">Reintentar</a></p>
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted">Enapp Server Mail</p>
      </div>
    </footer>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="custom/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>