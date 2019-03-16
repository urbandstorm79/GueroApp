<?php

session_start();


require 'controller/connection.php';

if (isset($_SESSION['user-id'])){


$records = $conn->prepare('SELECT nombreUsuario FROM usuarios WHERE idUsuarios = :id');
	$records->bindParam(':id',$_SESSION['user-id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = null;

	if (!empty($results)) {
		$user = $results;
		echo $user['nombreUsuario'];
		echo 'Todo bien';
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
	<title>Dashboard</title>
<?php  require 'layouts/head-files.php'?>

</head>
<body>
<?php  require 'layouts/menu-nav.php'?>
<?php require 'layouts/side-nav.php'?>

</body>
</html>