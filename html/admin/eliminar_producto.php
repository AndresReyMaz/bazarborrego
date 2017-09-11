<?php
$page_title = 'Mostrar departamentos';
require ('../../mysqli_connect.php');
session_start();
if (!isset($_SESSION['id_usuario'])) {
  echo '';
  header("Location: ../login/login.php");
  exit();  

}
	else{
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$id_aBorrar = $_POST['id_producto'];
			$q = "DELETE FROM producto WHERE id_producto = '$id_aBorrar'";
			$r = @mysqli_query ($dbc, $q);
			if($r)
				header("Location: producto_eliminado.php");
			else echo 'failure';
		}
		else{
			header("Location: index.php");
		}
	}
?>