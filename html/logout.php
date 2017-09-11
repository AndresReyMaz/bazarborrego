<?php 
// Pagina de logout de usuario. STATUS: COMPLETE

session_start();
require ('login/include/login_functions.inc.php');
// If no session variable exists, redirect the user:
if (!isset($_SESSION['id_usuario'])) {
	redirect_user();	
	
} else {

	$_SESSION = array();
	session_destroy();
	setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0);

}
$page_title = 'Logged Out!';
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sesion Terminada - Bazar Borrego</title>
    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>
 <!-- Top menu -->
  <nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
    <div class="container">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="top-navbar-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <span class="li-text">
                        Volver al sitio web de
                    </span> 
                    <a href="http://localhost/registro/html"><strong>Bazar Borrego.</strong></a> 
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Top content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            
	<div class="col-sm-12 text">
    	<h1><strong>Tu sesión ha sido terminada exitosamente.</strong> </h1>
   	 <div class="description">
    	    <p>                               
        	    Gracias por utilizar Bazar Borrego.
       	 </p>
  	  </div>
</div>
</div>
</div>
</div>



<!-- Javascript -->
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="assets/js/retina-1.1.0.min.js"></script>
<script src="assets/js/scripts.js"></script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
            <![endif]-->

        </body>
        </html>