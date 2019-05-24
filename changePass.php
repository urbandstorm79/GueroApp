<?php
/**
 * Created by PhpStorm.
 * User: urban
 * Date: 24/05/2019
 * Time: 01:15 PM
 */
require 'controller/connection.php';
$mensaje="";
if (!empty($_POST['correo'])&&!empty($_POST['pass'])){
	$stmnt= $conn->prepare('UPDATE usuarios SET contra=:passwd WHERE correo=:mail');
	$pasword= password_hash($_POST['pass'], PASSWORD_BCRYPT);
	$stmnt->bindParam(':passwd', $pasword);
	$stmnt->bindParam(':mail', $_POST['correo']);
	if ($stmnt->execute()){
		$mensaje="Se actualizo correctamente";
	}else{
		$mensaje="Ocurrio Algo inesperdado";
	}
}
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Cambair contraseña</title>
	<?php require 'layouts/head-files.php'?>
</head>
<body>
<nav class="navbar navbar-light bg-light shadow mb-5">
	<div class="navbar-brand">
		<h2>GüeroApp</h2>
	</div>
</nav>
<div class="container">
	<div class="row"></div>
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8">
			<?php
			if (!empty($mensaje)){
				echo '<div class="alert alert-success" role="alert">
					<strong>'.$mensaje.'</strong>
					<a href="login.php">Volver a inicio de sesion</a>
				</div>';
			}
			?>

			<div class="alert alert-info text-center" role="alert">
				<strong class="">Por favor, ingresa tu correo y tu nueva contrseña</strong>
			</div>
			<div class="card">

				<div class="card-body">
					<h4 class="card-title">Cambiar contraseña</h4>
					<form action="changePass.php" method="post">
						<div class="form-group">
							<div class="input-group">
								<label for="" class="sr-only">Correo electronico</label>
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-at"></i></span>
								</div>

								<input type="email" class="form-control" placeholder="Correo Electronico" name="correo">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<label for="" class="sr-only"> Nueva contraseña</label>

								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="password" placeholder="Contrseña" class="form-control" name="pass">
							</div>
						</div>

						<button class="btn btn-warning" type="submit">Cambiar contraseña</button>
						<a href="login.php" class="btn btn-info">Volver a inicio de sesion</a>
					</form>
				</div>
			</div>
		</div>
		<div class="col-lg-2"></div>
	</div>
	<div class="row"></div>
</div>

</body>
</html>
