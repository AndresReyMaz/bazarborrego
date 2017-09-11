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
			$id_aBorrar = $_POST['id_residencia'];
			$q = "DELETE FROM residencia WHERE id_residencia = '$id_aBorrar'";
			$r = @mysqli_query ($dbc, $q);
			if($r)
				header("Location: departamento_eliminado.php");
			else echo 'failure';
		}
		else{
			header("Location: index.php");
		}
	}
?>