<?php
session_start();

if (isset($_SESSION['user-id'])){
    header('Location: dashboard.php');
}
require 'controller/connection.php';
if (!empty($_POST['user']) && !empty($_POST['password'])){
    $query= $conn->prepare('SELECT idUsuarios,nombreUsuario,correo,contra FROM usuarios WHERE usuarios.nombreUsuario = :userF OR usuarios.correo= :userF');
    $query->bindParam(':userF',$_POST['user']);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    $mensaje= '';
    if ($_POST['user']== $result['nombreUsuario'] || $_POST['user']== $result['correo']){

        if (password_verify($_POST['password'], $result['contra'])){
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
	<?php require 'layouts/head-files.php'?>
	<title>LogIn</title>
</head>
<body>
<nav class="navbar navbar-light bg-light shadow mb-5">
    <div class="navbar-brand">
        <h2>GüeroApp</h2>
    </div>
</nav>
<?php if (!empty($mensaje)){
    echo '<div class="alert alert-warning wdt-50 m-auto" role="alert"><p class="d-inline">'.$mensaje. '</p> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
}?>
<div class="container">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-xl-6">
            <div class="card bg-light shadow-sm p-2" style="margin: 100px auto;">
                <h2>Iniciar sesión</h2>
                <form action="login.php" method="POST" class="needs-validation">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <label for="user" class="sr-only">Usuario o correo</label>
                            <input type="text" class="form-control" name="user" placeholder="Usuario o correo" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <label class="sr-only">Contraseña</label>
                            <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-warning btn-block">LogIn</button>
                    <p>Crea una cuenta dando clic <a href="signUp.php">aquí</a></p>
                    <p>¿Olvidaste tu contraseña? <a href="changePass.php">Cambiar contraseña</a></p>

                    <!-- esta etiqueta es solo temporal, despues la quito, es para evitar el logueo -->
                    <!-- <a href="dashboard.php">ir a dashboard</a> -->
                </form>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>

</body>
</html>