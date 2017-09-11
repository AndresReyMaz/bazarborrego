<!doctype html>
<html lang="en" class="no-js">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="theme-color" content="#3e454c">
  
  <title>Editar Producto - Bazar Borrego</title>

  <!-- Font awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Sandstone Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Bootstrap Datatables -->
  <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
  <!-- Bootstrap social button library -->
  <link rel="stylesheet" href="css/bootstrap-social.css">
  <!-- Bootstrap select -->
  <link rel="stylesheet" href="css/bootstrap-select.css">
  <!-- Bootstrap file input -->
  <link rel="stylesheet" href="css/fileinput.min.css">
  <!-- Awesome Bootstrap checkbox -->
  <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
  <!-- Admin Stye -->
  <link rel="stylesheet" href="css/style.css">

  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

    </head>
    <body>
      <?php include('include/userdropdown.html'); ?>

      <div class="ts-main-content">
        <nav class="ts-sidebar">
          <ul class="ts-sidebar-menu">
            <li class="ts-label">Menú de opciones</li>
            <li><a href="index.php"><i></i>Página Principal</a></li>
            <li><a href="busqueda_departamentos.php"><i></i>Búsqueda de Departamentos</a></li>
            <li><a href="busqueda_productos.php"><i></i> Búsqueda de Productos</a></li>
            <li><a href="agregar_departamentos.php"><i></i> Agregar Departamentos</a></li>
            <li class="open"><a href="agregar_productos.php"><i></i> Agregar Productos</a></li>
            <li><a href="mis_departamentos.php"><i></i> Ver Mis Departamentos</a></li>
            <li><a href="mis_productos.php"><i></i> Ver Mis Productos</a></li>

            <!-- Account from above -->
            <ul class="ts-profile-nav">
              <li><a href="#">Help</a></li>
              <li><a href="#">Settings</a></li>
              <li class="ts-account">
                <a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
                <ul>
                  <li><a href="#">My Account</a></li>
                  <li><a href="#">Edit Account</a></li>
                  <li><a href="#">Logout</a></li>
                </ul>
              </li>
            </ul>

          </ul>
        </nav>
        <div class="content-wrapper">
          <div class="container-fluid">

            <div class="row">
              <div class="col-md-12">

                <?php

require ('../../mysqli_connect.php'); // Connect to the db.

session_start();

if (!isset($_SESSION['id_usuario'])) {

    // Need the functions:
  header("Location: ../login/login.php");
  exit();  

}

$id_dep = null;
if(!empty($_GET['id_dep'])){
  $id_dep = $_REQUEST['id_dep'];
}
if( null==$id_dep ){
  header("Location: mis_productos.php");
  exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nombre_us = $_SESSION['nombre'];
    $errors = array(); // Initialize an error array.
    $mat=$_SESSION['id_usuario'];

    // Check for a student ID:
    if (empty($_POST['nombre_producto'])) {
      $errors[] = 'Olvidaste introducir un nombre.';
    } else {
      $nom = mysqli_real_escape_string($dbc, trim($_POST['nombre_producto']));
    }

    if ( isset($_POST['ref_categoria']) && filter_var($_POST['ref_categoria'], FILTER_VALIDATE_INT, array('min_range' => 1))  ) {
      $cat = $_POST['ref_categoria'];
    } else { // No artist selected.
      $errors[] = 'Por favor, selecciona una categoría';
    }
    
    // Check for a last name:
    if (empty($_POST['marca'])) {
      $errors[] = 'Olvidaste introducir una marca';
    } else {
      $mar = mysqli_real_escape_string($dbc, trim($_POST['marca']));
    }
    
    // Check for an email address:
    if (empty($_POST['precio'])) {
      $errors[] = 'Olvidaste introducir el precio de tu producto.';
    } else {
      $prec= mysqli_real_escape_string($dbc, trim($_POST['precio']));
    }
    if (empty($_POST['estado'])) {
      $errors[] = 'No seleccionaste el estado de tu producto';
    } else {
      $est = mysqli_real_escape_string($dbc, trim($_POST['estado']));
    }
    if (empty($_POST['cantidad'])) {
      $errors[] = 'No pusiste una cantidad';
    } else {
      $cant = mysqli_real_escape_string($dbc, trim($_POST['cantidad']));
    }
    if (empty($_POST['descripcion'])) {
      $errors[] = 'Escribe una breve descripcion de tu producto';
    } else {
      $desc = mysqli_real_escape_string($dbc, trim($_POST['descripcion']));
    }

    
    if (empty($errors)) { // If everything's OK.
    
        // Register the user in the database...

        // Make the query:
    $q = "UPDATE producto SET nombre_producto = '$nom', precio = '$prec', estado = '$est', cantidad = '$cant', ref_categoria = '$cat' , descripcion = '$desc', marca = '$mar' WHERE id_producto = '$id_dep'";        
        $r = @mysqli_query ($dbc, $q); // Run the query.
        if ($r) { // If it ran OK.

          header('Location: producto_agregado.php');
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


    
} // End of the main Submit conditional.
else{
  $q = "SELECT * FROM producto, categoria WHERE ref_categoria = id_categoria AND id_producto = '$id_dep'";
  $r = @mysqli_query ($dbc, $q); // Run the query.
  if (mysqli_num_rows($r) == 1) { // Good to go!
    $row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
    $nom = $row['nombre_producto'];
    $cat = $row['ref_categoria'];
    $desc = $row['descripcion'];
    $cant = $row['cantidad'];
    $est = $row['estado'];
    $mar = $row['marca'];
    $prec = $row['precio'];
    $mat = $row['ref_usuario'];
    if($mat!=$_SESSION['id_usuario']){
      header("Location: mis_productos.php");
      exit();
    }
  }
  else{
    echo "error";
  }
}
?>


<h2 class="page-title">Editar un producto</h2>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">¡Vende tus productos!</div>
      <div class="panel-body">
        <form method="post" action="" class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-2 control-label">Nombre</label>
            <div class="col-sm-10">
              <input name="nombre_producto" type="text" class="form-control" maxlength="140" value="<?php echo !empty($nom)?$nom:'';?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Marca o Autor</label>
            <div class="col-sm-10">
              <input name="marca" type="text" class="form-control" value="<?php echo !empty($mar)?$mar:'';?>">
            </div>
          </div>
          <div class="hr-dashed"></div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Precio</label>
            <div class="col-sm-10">
              <input name="precio" type="number" class="form-control" value="<?php echo !empty($prec)?$prec:'';?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">
              Estado
              <br>
            </label>
            <div class="col-sm-10">
              <div class="radio radio-info radio-inline">
                <input type="radio" id="inlineRadio1" value="nuevo" name="estado"  <?php if(!empty($est)) echo ($est=='nuevo')?'checked':'';?>>
                <label for="inlineRadio1"> Nuevo </label>
              </div>
              <div class="radio radio-inline">
                <input type="radio" id="inlineRadio2" value="seminuevo" name="estado" <?php if(!empty($est)) echo ($est=='seminuevo')?'checked':'';?>>
                <label for="inlineRadio2"> Seminuevo </label>
              </div>
            </div>
          </div>
          <div class="hr-dashed"></div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Cantidad</label>
            <div class="col-sm-10">
              <input name="cantidad" type="number" min = "1" max ="99" class="form-control" value="<?php echo !empty($cant)?$cant:'';?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Categoría</label>
            <div class="col-sm-10">
              <select name="ref_categoria" class="form-control"><option>Selecciona una categoría</option>
                                        <?php // Retrieve all the categories and add to the pull-down menu.
                                        $q = "SELECT id_categoria, nombre_categoria FROM categoria ORDER BY nombre_categoria ASC";        
                                        $r = mysqli_query ($dbc, $q);
                                        if (mysqli_num_rows($r) > 0) {
                                          while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) {
                                            if ($row['id_categoria']==$cat)
                                              echo "<option selected value='" . $row['id_categoria'] . "'>" . $row['nombre_categoria'] . "</option>";
                                            else
                                              echo "<option value='" . $row['id_categoria'] . "'>" . $row['nombre_categoria'] . "</option>";
                                          }
                                        } else {
                                          echo '<option>Primero agrega una categoria.</option>';
                                        }
                                        mysqli_close($dbc); // Close the database connection.
                                        ?>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-sm-2 control-label">Descripción</label>
                                    <div class="col-sm-10">
                                      <textarea name="descripcion" class="form-control" rows="3" maxlength = "1500" ><?php echo !empty($desc)?$desc:'';?></textarea>
                                    </div>
                                  </div>
                                  <br>
                                  <div class="col-sm-8 col-sm-offset-2">
                                    <center>
                                      <button class="btn btn-primary" type="submit">Agregar</button>
                                    </center>
                                  </div>
                                </form>
                                <br>
                              </div>
                            </div>
                          </div>
                          <br>
                        </div>
                        <br>
                        <br>

                      </div>
                    </div>
                  </div>

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Loading Scripts -->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap-select.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.dataTables.min.js"></script>
      <script src="js/dataTables.bootstrap.min.js"></script>
      <script src="js/Chart.min.js"></script>
      <script src="js/fileinput.js"></script>
      <script src="js/chartData.js"></script>
      <script src="js/main.js"></script>

    </body>

    </html>