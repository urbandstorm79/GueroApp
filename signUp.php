<?php
require 'connection.php';
$mensaje ="";

if (!empty($_POST['name']) && !empty($_POST['lastName']) && !empty($_POST['userName']) && !empty($_POST['password'])){
	$query = "INSERT INTO usuarios (nombre, apellido, nombreUsuario, contra, telefono) VALUES (:nombre,:lastN, :usuario, :pass, :tel)";
	$state = $conn->prepare($query);
	$state->bindParam(':nombre', $_POST['name']);
	$state->bindParam(':lastN',$_POST['lastName']);
	$state->bindParam(':usuario',$_POST['userName']);
	$state->bindParam(':pass',$_POST['password']);
	$state->bindParam(':tel',$_POST['tel']);

	if ($state->execute()){
		$titulo= 'Usuario Creado';
		$mensaje= 'Ya puedes iniciar sesion';
		// echo $mensaje;
	}else{
		$titulo= 'Error';
		$mensaje= 'Ocurrio algo inesperado';
		//echo $mensaje;
	}

}else{
	echo 'Vacio';
}

?>

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="stylesheet" href="css/style.css">
	<title>Sign Up</title>
</head>
<body>

<nav class="nav">
	<div class="    ">
		<h2 class="">GüeroApp</h2>
		<?php if (!empty($mensaje)){
			echo '<p>'.$mensaje.'</p>';
		} else{
			echo 'Mal';
		}?>
	</div>
</nav>

<div class="formulario">
	<h2>Create an Account</h2>
	<form action="signUp.php" method="POST">
		<input type="text" name="name" placeholder="Name" >
		<label for="name">Name</label>
		<input type="text" name="lastName" placeholder="Last name" >
		<label>Last name</label>
		<input type="text" name="userName" placeholder="User name" >
		<label>User Name</label>
		<input type="password" name="password" placeholder="Password">
		<label>Password</label>
		<input type="tel" name="tel" placeholder="Phone number">
		<label>Phone number</label>
		<button type="submit" class="btn btn-primary btn-block">SignUp</button>
	</form>
	<p>You already have an account? LogIn <a href="login.php">here</a></p>
</div>
</body>
</html>