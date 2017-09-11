<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
                            <a href="http://127.0.0.1/"><strong>Bazar Borrego.</strong></a> 
                            <span class="li-text">
                            </span> 
                            <span class="li-social">
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Inicia Sesión</h3>
                            		<p>¡Inicia sesión con tus datos para acceder a Bazar Borrego!</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="login.php" method="post" class="registration-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-first-name">Matricula</label>
			                        	<input type="text" name="matricula" placeholder="Matrícula" class="form-first-name form-control" id="form-first-name">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-last-name">Contraseña</label>
			                        	<input type="password" name="pass" placeholder="Contraseña" class="form-last-name form-control" id="form-last-name">
			                        </div>
			                        <button type="submit" class="btn">Iniciar Sesión</button>
			                    </form>
		                    </div>
                        </div>
                            <div class="col-sm-7 text">
                            <h1><strong>Inicio de Sesión</strong> Bazar Borrego</h1>
                            <div class="description">
                                <p>                               
                                ¡Aquí podras iniciar sesión en nuestro sitio para obtener acceso a todas nuestras herramientas!
                                </p>
                            </div>
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