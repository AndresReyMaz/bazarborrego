<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require ('../../mysqli_connect.php'); // Connect to the db.
        
    $errors = array(); // Initialize an error array.

    // Check for a student ID:
    if (empty($_POST['matricula'])) {
        $errors[] = 'You forgot to enter your student ID.';
    } else {
        $mat = mysqli_real_escape_string($dbc, trim($_POST['matricula']));
    }
    
    // Check for a first name:
    if (empty($_POST['nombre'])) {
        $errors[] = 'You forgot to enter your first name.';
    } else {
        $fn = mysqli_real_escape_string($dbc, trim($_POST['nombre']));
    }
    
    // Check for a last name:
    if (empty($_POST['apellido'])) {
        $errors[] = 'You forgot to enter your last name.';
    } else {
        $ln = mysqli_real_escape_string($dbc, trim($_POST['apellido']));
    }
    
    // Check for an email address:
    if (empty($_POST['email'])) {
        $errors[] = 'You forgot to enter your email address.';
    } else {
        $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
    }
    
    // Check for a password and match against the confirmed password:
    if (!empty($_POST['pass1'])) {
        if ($_POST['pass1'] != $_POST['pass2']) {
            $errors[] = 'Your password did not match the confirmed password.';
        } else {
            $p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
        }
    } else {
        $errors[] = 'You forgot to enter your password.';
    }
    
    if (empty($errors)) { // If everything's OK.
    
        // Register the user in the database...
        
        // Make the query:
        $q = "INSERT INTO usuario(id_usuario, nombre, apellido, email, password) VALUES ('$mat','$fn', '$ln', '$e', SHA1('$p'))";        
        $r = @mysqli_query ($dbc, $q); // Run the query.
        if ($r) { // If it ran OK.
        
        header('Location: ../login/login.php');
        exit();
        
        } else { // If it did not run OK.
            
            // Public message:
            echo '<h1>System Error</h1>
            <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
            
            // Debugging message:
            echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
                        
        } // End of if ($r) IF.
        
        mysqli_close($dbc); // Close the database connection.

        // Include the footer and quit the script:
        exit();
        
    } else { // Report the errors.
    
        echo '<h1>Error!</h1>
        <p class="error">The following error(s) occurred:<br />';
        foreach ($errors as $msg) { // Print each error.
            echo " - $msg<br />\n";
        }
        echo '</p><p>Please try again.</p><p><br /></p>';
        
    } // End of if (empty($errors)) IF.
    
    mysqli_close($dbc); // Close the database connection.

} // End of the main Submit conditional.

?>

    

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registro - Bazar Borrego</title>

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
        <script src = "js/bootstrap.min.js"></script>

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
                            <a href="../index.php"><strong>Bazar Borrego.</strong></a> 
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
                        <div class="col-sm-7 text">
                            <h1><strong>Registro</strong> Bazar Borrego</h1>
                            <div class="description">
                                <p>
                                    Aquí es donde puedes registrarte en  
                                     <a href="../index.php"><strong>BAZAR BORREGO</strong></a>. Solo llena el <br> siguiente formulario con tus datos.
                                </p>
                            </div>
                            <div class="top-big-link">
                            </div>
                        </div>
                        <div class="col-sm-5 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>¡Regístrate ahora!</h3>
                                    <p>Llena el formulario para tener acceso inmediato.</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-pencil"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form role="form" action="registro.php" method="post" class="registration-form">
                                    <div class="form-group">
                                        <label class="sr-only" for="form-matricula">Matricula</label>
                                        <input type="text" name="matricula" placeholder="Matrícula..." minlength="9" maxlength="9" class="form-matricula form-control" value="<?php if(isset($_POST['matricula'])) echo $_POST['matricula'];?>" id="form-matricula">
                                    </div>                                
                                    <div class="form-group">
                                        <label class="sr-only" for="form-first-name">First name</label>
                                        <input type="text" name="nombre" placeholder="Nombre..." maxlength="30"  class="form-first-name form-control" value="<?php if(isset($_POST['nombre'])) echo $_POST['nombre'];?>" id="form-first-name">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-last-name">Last name</label>
                                        <input type="text" name="apellido" placeholder="Apellido..." maxlength="30" class="form-last-name form-control" value="<?php if(isset($_POST['apellido'])) echo $_POST['apellido'];?>" id="form-last-name">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-email">Email</label>
                                        <input type="text" name="email" placeholder="Email..." maxlength="100" class="form-email form-control" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" id="form-email">                               
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="pass1" placeholder="Contraseña..." maxlength="40"  class="form-password form-control" value="<?php if(isset($_POST['pass1'])) echo $_POST['pass1'];?>" id="form-password">
                                    </div>  
                                     <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="pass2" placeholder="Vuelva a escribir la contraseña..." maxlength="40"  class="form-password form-control" value="<?php if(isset($_POST['pass2'])) echo $_POST['pass2'];?>" id="form-password2">
                                    </div>                                                                
                                    <button type="submit" class="btn">Regístrame</button>
                                </form>
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
    </body>
</html>