
<?php 
require 'conexionBD.php';

$message = '';

if (!empty($_POST['nombreU'])&& !empty($_POST['correoU'])&&!empty($_POST['contraU'])) {

	$sql = "INSERT INTO usuarios(nombreU,correo,contrasenaU) VALUES (:nombreU,:correo, :contrasenaU)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':nombreU',$_POST['nombreU']);
	$stmt->bindParam(':correo',$_POST['correoU']);

	$stmt->bindParam(':contrasenaU',$_POST['contraU']);
	
	if ($stmt->execute()) {
		$message = '<h4>Nuevo usuario creado</h4>';
	}else {

		$message = '<h4>Error al crear el ususario</h4>';
	}
   }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Restaurante Registro</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src ="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>

	<?php if(!empty($message)): ?>
		<p> <?= $message ?> </p>
	<?php endif; ?>
	
	<div class="container">

	</header>


		<form action="registro.php" method="post" class=" form-group">
			<div class="loginPanel">
				<h1>Registrate</h1>
				<labe for= "usuario">Nombre de usuario
				</labe>
				<input class ="form-control" type="text" placeholder="Machuca023" name="nombreU">
			


			
				<labe for= "correo">Correo
				</labe>
				<input class ="form-control" type="text" placeholder="correo@hotmail.com" name="correoU">
			

				
				
				<labe for= "Contraseña">Contraseña</labe>

				<input class="form-control" type="password" placeholder="contraseña" name="contraU">
			

				
				<!-- <labe for  = "Contraseña">Confirmar contraseña</labe>

				<input class="form-control" type="password" placeholder=" confirmar contraseña" name="confirmar_contraU"> -->
			
		
			
				<input class="btn btn-primary btn-block" type="submit" value="Enviar">
				<p>inicia sesión <a href="index.php">aquí</a></p>
			</div>
		</form>
	</div>
	
</body>
</html>