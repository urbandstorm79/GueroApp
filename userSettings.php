<?php  require 'controller/sessionUser.php';
require 'controller/updateUser.php';
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Configuracion de usuario</title>
	<?php require 'layouts/head-files.php'?>
</head>
<body>
<?php
require 'layouts/menu-nav.php';
require 'layouts/side-nav.php';
if (!empty($msj)){
    echo '
    <h3 class="mensaje">'.$msj.'</h3>
    ';
}
?>

<div class="formulario">
	<h2>Configuracion de usuarios</h2>
	<form action="userSettings.php" method="post">
		<div class="formulario-flex">
			<div class="wdt-50">
				<input type="text" name="name" placeholder="Nombre">
				<label>Nombre</label>
			</div>
			<div class="wdt-50">
				<input type="text" name="lastName" placeholder="Apellidos">
				<label for="LastName">Apellidos</label>
			</div>
			<div class="wdt-100">
				<input type="email" name="mail" placeholder="Correo electronico">
				<label for="mail">Correo electronico</label>
			</div>
			<div class="wdt-40">
				<input type="text" name="user" placeholder="Nombre de usuario">
				<label for="user">Nombre de usuario</label>
			</div>

			<div class="wdt-60">
				<input type="password" name="pass" placeholder="Contraseña">
				<label for="pass">Contraseña</label>
			</div>
			<div class="wdt-100">
				<input type="tel" name="tel" placeholder="Telefono">
				<label for="tel">Telefono</label>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Modificar datos</button>
		</div>
	</form>
</div>
</body>
</html>
