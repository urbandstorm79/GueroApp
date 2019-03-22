<?php 
require 'conexionBD.php';
session_start();

if (isset($_SESSION['usuario_id'])) {
	
	$records = $conn->prepare('SELECT IDusuario,nombreU,correo,contrasenaU FROM usuarios WHERE IDusuario = :id');
	$records->bindParam(':id',$_SESSION['usuario_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = null;

	if (count($results)> 0) {
		$user = $results;
	}

	$consultaPedido = $conn->prepare('SELECT IDpedido,IDcomida,IDbebida,IDpostre FROM pedido WHERE IDusuario = :varusr');
	$consultaPedido->bindParam(':varusr',$_SESSION['usuario_id']);

	if ($consultaPedido->execute()) {
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Historial</title>
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

		<!-- <nav class="navbar navbar-light bg-light"><h2>Bienvenido</h2> <?= $user['nombreU']  ?> gracias por tu preferencia  
		<a href="salida.php">Cerrar sesión</a>
		</nav> -->



	

    <?php endif ?>
    <div class ="panelH">
 	<?php



		echo '<table class="table"><thead><th>Comida</th><th>Bebida</th><th>Postre</th></thead>';
		while ($rsstment= $consultaPedido->fetch()) {
			
				$resultcomida = $conn->prepare('SELECT nombreC,precioC FROM comida WHERE IDcomida = :resComida');
					$resultcomida->bindParam(':resComida',$rsstment['IDcomida']);
	if ($resultcomida->execute()) {

		$resC = $resultcomida->fetch();
		echo '<tbody><tr><td>'.$resC['nombreC'].'</td>';
	}//end Comida

	$resultbebida = $conn->prepare('SELECT nombreB,IDbebida FROM bebida WHERE IDbebida = :resBebida');
	$resultbebida->bindParam(':resBebida',$rsstment['IDbebida']);
 	if ($resultbebida->execute()) {
 		$resB = $resultbebida->fetch();

 		echo '<td>'.$resB['nombreB'].'</td>';
 	}//end Bebida

 		$resultpostre = $conn->prepare('SELECT nombreP,IDpostre FROM postres WHERE IDpostre = :resPostre');
 		$resultpostre->bindParam(':resPostre',$rsstment['IDpostre']);
	if ($resultpostre->execute()) {
			$resP = $resultpostre->fetch();

 			echo '<td>'.$resP['nombreP'].'</td><td><a class="btn btn-secondary"
 			href="borrar.php?no='.$rsstment['IDpedido'].'">borrar</a></td></tr>';
	}
	


		}
		echo '</tbody><table>';

		//echo"Todo goid";
	}//End consulta

	
 	
	



} 	?>
	<a href="../restaurante/pedido.php" class="btn btn-primary">Ordenar pedido</a>
</div>


 </body>
 </html>