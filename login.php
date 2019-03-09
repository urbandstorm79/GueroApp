<?php
session_start();

if (isset($_SESSION['user-id'])){
    header('Location: dashboard.php');
}
require 'connection.php';
if (!empty($_POST['user']) && !empty($_POST['password'])){
    $query= $conn->prepare('SELECT idUsuarios,nombreUsuario,contra FROM usuarios WHERE usuarios.nombreUsuario = :userF');
    $query->bindParam(':userF',$_POST['user']);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    $mensaje= '';
    if ($_POST['user']== $result['nombreUsuario']){
        if ( $_POST['password'] == $result['contra']){
			$_SESSION['user-id'] = $result['idUsuarios'];
			echo 'Todo va relativamente bien';
			header('Location: dashboard.php');
        }else{
			$titulo = 'Tenemos un problema';
			$mensaje= 'El usuario o la contraseña no coinciden';
        }

    }else{
		$titulo = 'Lo sentimos';
		$mensaje= 'Este usuario no esta registrado';
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
	<link rel="stylesheet" href="css/style.css">
	<title>LogIn</title>
</head>
<body>

<header class="nav">
	<nav class="">
		<h2>GüeroApp</h2>
	</nav>
</header>
<?php if (!empty($mensaje)){
    echo '<h3 class="mensaje">'.$mensaje.'</h3>';
}?>
<div class="formulario">
	<h2>SignIn</h2>
	<form action="login.php" method="POST">

		<div class="row">
			<input type="text" name="user" placeholder="Usuario" required>
			<label for="user">Usuario</label>
		</div>

		<input type="password" name="password" placeholder="Contraseña" required>
		<label>Contraseña</label>
		<button type="submit" class="btn btn-primary btn-block">LogIn</button>
		<p>Crea una cuenta dando clic <a href="signUp.php">aquí</a></p>

		<!-- esta etiquta es solo temporal, despues la quito, es para evitar el logueo -->
        <a href="dashboard.php">ir a dashboard</a>
	</form>
</div>
</body>
</html>