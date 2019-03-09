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
	<title>Registrar usuario</title>
</head>
<body>

<nav class="nav">
	<div class="    ">
		<h2 class="">GüeroApp</h2>
	</div>
</nav>

<?php if (!empty($mensaje)){
    echo '<h3 class="mensaje">'.$mensaje.'</h3>';
}?>

<div class="formulario">
	<h2>Create an Account</h2>
	<form action="signUp.php" method="POST">
		<input type="text" name="name" placeholder="Nombre" >
		<label for="name">Nombre</label>
		<input type="text" name="lastName" placeholder="Apellido" >
		<label>Apellido</label>
		<input type="date" name="date">
		<label for="date">Fecha de nacimiento</label> <!-- falta agregar -->
		<input type="email" name="mail" placeholder="Correo eléctronico"> <!-- falta agregar -->
		<label for="mail">Correo eléctronico</label>
		<input type="text" name="userName" placeholder="Nombre de usuario" >
		<label>Nombre de usuario</label>
		<input type="password" name="password" placeholder="Contraseña">
		<label>Contraseña</label>
		<input type="tel" name="tel" placeholder="Numero de teléfono">
		<label>Numero de teléfono</label>
		<button type="submit" class="btn btn-primary btn-block">Registrar</button>
	</form>
	<p>Ya tienes una cuenta? Inicia sesión <a href="login.php">aquí</a></p>
</div>
</body>
</html>