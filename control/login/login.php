<?php
  
include_once 'includes/db_connect.php';
include_once 'includes/functions.php'; 
sec_session_start();
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="login">
    <meta name="author" content="Arturo Martinez">
    <link rel="icon" href="custom/favicon.ico">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="custom/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="custom/signin.css" rel="stylesheet">

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

    <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
    ?> 

    <div class="container">

      <form class="form-signin" action="process_login.php" method="post" name="login_form">
        <h2 class="form-signin-heading">Login</h2>
        <label for="inputEmail" class="sr-only">Correo</label>
        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Correo" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
        <!--div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Recordar
          </label>
        </div-->
        
        <button class="btn btn-lg btn-primary btn-block" type="submit" onclick="formhash(this.form, this.form.inputPassword);">Iniciar Sesi&oacute;n</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="custom/ie10-viewport-bug-workaround.js"></script>

	<!-- ADD1: jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- ADD1: Fin --> 

	<!-- ADD0: Script js del login seguro -->
	<script type="text/JavaScript" src="js/sha512.js"></script> 
	<script type="text/JavaScript" src="js/forms.js"></script>
  	<!-- ADD0: Fin --> 

  </body>
</html>
