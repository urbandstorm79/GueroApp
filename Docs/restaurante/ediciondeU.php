<?php 
session_start();
require 'conexionBD.php';
if (isset($_SESSION['usuario_id'])) {
	
	$records = $conn->prepare('SELECT IDusuario,nombreU,correo,contrasenaU FROM usuarios WHERE IDusuario = :id');
	$records->bindParam(':id',$_SESSION['usuario_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = null;

	if (count($results)> 0) {
		$user = $results;
	}
}



 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Datos del usuario</title>

 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
 </head>
 <body>
 	 <?php if (!empty($user)):
require 'partials/navBar.php';
 	?>
	

	

<?php endif ?>

<div class="container">
	

	<div class="panel">
			<h2>Modifica tus datos</h2>
		<form action="actualizarDatos.php" method="post" class=" form-group">

				<labe for= "usuario">Nombre de usuario
				</labe>
				<input class ="form-control" type="text" placeholder="Machuca023" name="nombreU">

				<labe for= "Contraseña">Nueva contraseña</labe>

				<input class="form-control" type="password" placeholder="contraseña" name="contraU">

				<input class="btn btn-success btn-block" type="submit" value="Modificar">
			
		</form>
	</div>
	</div>
 	
 </body>
 </html>