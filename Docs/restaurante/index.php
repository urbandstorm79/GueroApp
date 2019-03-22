<?php 

session_start();
require 'conexionBD.php';

if (!empty($_POST['correoU']) && !empty($_POST['contraU'])) {

	$records = $conn->prepare('SELECT IDusuario,correo,contrasenaU FROM usuarios WHERE correo=:email');

	$records->bindParam(':email',$_POST['correoU']);

	$records->execute();

	$results = $records->fetch(PDO::FETCH_ASSOC);
		//echo $results['IDusuario'];
	$message = '';

	if (count($results) > 0 && $_POST['contraU']==$results['contrasenaU']) {

		$_SESSION['usuario_id'] = $results['IDusuario'];
		header('Location: pedido.php');
		
	}
	else{

		$message = '<h4>Tu contraseña o usuario no coinciden, intentelo de nuevo</h4>.';
	}
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Restaurante</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>

	<?php if(!empty($message)): ?>
		<p> <?= $message ?> </p>
	<?php endif; ?>

	<div class="container">
		
	
		<form action="index.php" method="post" class="loginPanel">
			<h2>Iniciar sesión</h2>
			<div class="">
				<labe for= "correo">Correo</labe>
				<input class="form-control" type="email" placeholder="correo@hotmail.com" name="correoU">

				<labe for= "Contraseña">Contraseña</labe>
				<input class="form-control" type="password" placeholder="contraseña" name="contraU">

				<input class="btn btn-primary btn-block" type="submit" value="Entrar">

			<p>si aún no tienes usuario, registrate <a href="registro.php
				">aquí</a></p>
			</div>
		</form>
	</div>
	
</body>
</html>