<?php
require 'conexionBD.php';

session_start();
$Total = 0;


$msj='';
if (isset($_SESSION['usuario_id'])) {
	$records = $conn->prepare('SELECT IDusuario,nombreU,correo,contrasenaU FROM usuarios WHERE IDusuario = :id');
	$records->bindParam(':id',$_SESSION['usuario_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = null;

	if (count($results)> 0) {
		$user = $results;
	}

if (!empty($_POST['comida']) && !empty($_POST['bebida'] && !empty($_POST['postre']))) {
	$varcomida = $_POST['comida'];
	$varbebida = $_POST['bebida'];
	$varpostre = $_POST['postre'];
	$query= "INSERT INTO pedido(IDcomida, IDbebida, IDpostre, IDusuario) VALUES (:varC, :varB, :varP, :idUsr)";
	$stmnt = $conn->prepare($query);
	$stmnt->bindParam(':varC', $varcomida);
	$stmnt->bindParam(':varB', $varbebida);
	$stmnt->bindParam(':varP', $varpostre);
	$stmnt->bindParam(':idUsr', $_SESSION['usuario_id']);
	if ($stmnt->execute()) {
		
		//echo "Todo bien";
		

	}else{
		//echo "Todo mal";
	}

	$consultaC = $conn->prepare("SELECT nombreC,precioC FROM comida WHERE IDcomida = :varcomida");
	$consultaC->bindParam(':varcomida',$varcomida);
	if ($consultaC->execute()) {

		$resultcomida = $consultaC->fetch();
		$Total += $resultcomida['precioC'];

	}

	$consultaB = $conn->prepare("SELECT nombreB,precioB FROM bebida WHERE IDbebida = :varbebida");
	$consultaB->bindParam(':varbebida',$varbebida);
	if ($consultaB->execute()) {

		$resultbebida = $consultaB->fetch();
		$Total += $resultbebida['precioB'];

	}
	$consultaP = $conn->prepare("SELECT nombreP,precioP FROM postres WHERE IDpostre = :varpostre");
	$consultaP->bindParam(':varpostre',$varpostre);
	if ($consultaP->execute()) {

		$resultpostre = $consultaP->fetch();
		$Total += $resultpostre['precioP'];

	}


	

} else{
	echo 'vacio';
}



} else{
	echo 'no user';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ver pedido</title>

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
<div class="panel">
		<form class=" form-group">
	<div class="container">
		<h2>Tu pedido es</h2>
		<table class="table table-secondary table-striped">
			<thead class="thead-dark">
				<th>Producto</th>
				<th>Precio</th>
			</thead>
		<tr><td><?=$resultcomida['nombreC']?></td>
			<td> $<?=$resultcomida['precioC']?> pesos</td></tr>
		<tr><td><?=$resultbebida['nombreB']?></td>
			<td> $<?=$resultbebida['precioB']?> pesos</td></tr> 
		<tr><td><?=$resultpostre['nombreP']?></td>
			<td> $<?=$resultpostre['precioP']?> pesos</td></tr> 
		<tr><td>Total</td><td>$<?=$Total  ?> pesos</td> </tr>
		</table>

	
	</div>
	
	<a href="pedido.php" class="btn btn-success">Ordenar otro pedido</a>
    <a href="historialPedidos.php" class="btn btn-info">Historial de pedidos</a>

</form>
</div>

	
</body>
</html>
