<?php
require 'controller/connection.php';
session_start();


if (isset($_SESSION['user-id'])){
	header('Location: ../../GueroApp/dashboard.php');
}else{
	$mensaje ="";

	if (!empty($_POST['name']) && !empty($_POST['lastName']) && !empty($_POST['userName']) && !empty($_POST['password']) && !empty($_POST['mail']) && !empty($_POST['date'])){
		$query = "INSERT INTO usuarios (nombre, apellido, correo, nombreUsuario, contra, fecha, telefono) VALUES (:nombre,:lastN,:email, :usuario, :pass, :datee, :tel)";
		$state = $conn->prepare($query);
		$state->bindParam(':nombre', $_POST['name']);
		$state->bindParam(':lastN',$_POST['lastName']);
		$state->bindParam(':email', $_POST['mail']);
		$state->bindParam(':usuario',$_POST['userName']);
		$password= password_hash($_POST['password'], PASSWORD_BCRYPT);
		$state->bindParam(':pass',$password);
		$state->bindParam(':datee',$_POST['date']);
		$state->bindParam(':tel',$_POST['tel']);

		if ($state->execute()){
			$titulo= 'Usuario Creado';
			$mensaje= 'Ya puedes iniciar sesion';
			header('Location: login.php');
			// echo $mensaje;
		}else{
			$titulo= 'Error';
			$mensaje= 'Ocurrio algo inesperado';
			//echo $mensaje;
		}

	}else{
		//echo 'Vacio';
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
	<title>Registrar usuario</title>
</head>
<body>

<nav class="navbar navbar-light bg-light shadow">
	<div class="navbar-brand">
		<h2 class="">GüeroApp</h2>
	</div>
</nav>

<?php if (!empty($mensaje)){
    echo '<h3 class="alert-info">'.$mensaje.'</h3>';
}?>

<div class="container">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 ">
            <div class="card shadow-sm p-2 bg-light" style="margin: 100px auto;;">
                <h2>Crea una cuenta</h2>

                <form action="signUp.php" method="POST" class="">
                    <div class="">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fas fa-address-card"></i></span></div>
                                    <label for="name" class="sr-only">Nombre</label>
                                    <input type="text" name="name" placeholder="Nombre" class="form-control" >
                                </div>

                            </div>
                            <div class="form-group col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fas fa-address-card"></i></span></div>
                                    <label class="sr-only">Apellido</label>
                                    <input class="form-control" type="text" name="lastName" placeholder="Apellido" >
                                </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="fas fa-at"></i></span></div>
                                    <input class="form-control" type="email" name="mail" placeholder="Correo eléctronico"> <!-- falta agregar -->
                                    <label class="sr-only" for="mail">Correo eléctronico</label>
                                </div>
                        </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-lg-7">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <label class="sr-only">Nombre de usuario</label>
                                    <input class="form-control" type="text" name="userName" placeholder="Nombre de usuario" >
                                </div>

                            </div>
                            <div class="form-group col-lg-5">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <label class="sr-only">Contraseña</label>
                                    <input class="form-control" type="password" name="password" placeholder="Contraseña">
                                </div>
                        </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <label class="sr-only">Numero de teléfono</label>
                                    <input class="form-control" type="tel" name="tel" placeholder="Numero de teléfono">
                                </div>

                            </div>
                            <div class="form-group col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <label class="sr-only" for="date">Fecha de nacimiento</label>
                                    <input class="form-control" type="date" name="date" placeholder="Fecha de nacimiento">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block">Registrar</button>
                        <p>Ya tienes una cuenta? Inicia sesión <a href="login.php">aquí</a></p>
                    </div>
                </form>

            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>
</body>
</html>