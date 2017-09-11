<?php
	session_start();
	//echo "todo bien... creo";
	include("connection.php");

	$error = "";
	if(isset($_POST["submit"]))
	{
		if(empty($_POST["username"]) || empty($_POST["password"]))
		{
			$error = "Se requieren ambos campos.";
		}else
		{
			$username=$_POST['username'];
			$password=$_POST['password'];

			
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysqli_real_escape_string($db, $username);
			$password = mysqli_real_escape_string($db, $password);
			$password = md5($password);
			
			$sql="SELECT matricula FROM users WHERE matricula='$username' and password='$password'";
			$result=mysqli_query($db,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);


			if(mysqli_num_rows($result) == 1)
			{
				$error = "OK";
				$_SESSION['username'] = $username; 
				header("location: home.php"); 
			}else
			{
				$error = "No se encontró ningún registro para esta contraseña y usuario.";
			}
		}
	}
?>