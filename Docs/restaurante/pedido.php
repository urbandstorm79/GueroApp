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

	
	$resultcomida = $conn->prepare('SELECT IDcomida,nombreC FROM comida');
	if ($resultcomida->execute()) {
		//echo "Todo bien";
	}
 	$resultbebida = $conn->prepare('SELECT nombreB,IDbebida FROM bebida');
 	if ($resultbebida->execute()) {
 		//echo "todo bien 2";
 	}
	$resultpostre = $conn->prepare('SELECT nombreP,IDpostre FROM postres');
	if ($resultpostre->execute()) {
		//echo "todo Bien 3 mas bien que nunca";
	}




}


 ?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Elige tus platillos</title>
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



	<?php require 'galeria.php' ?>
	<div class="container">
		<div class="panel">
			<h2>El lugar del buen comer</h2>
			<form action="enviarPedido.php" method="POST">

			<div><label for="comida">Comida</label>
				<select name="comida" class="custom-select">
			<?php while  ($comida=$resultcomida->fetch()):?>
				<option <?php echo 'value="'.$comida['IDcomida'].'"'; ?> > <?=$comida['nombreC']?> </option>';

			<?php endwhile ?>
				</select>

			</div>
			 <div><label for="bebida">Bebidas</label>
				<select name="bebida" class="custom-select">
				<?php  while ($bebida= $resultbebida->fetch()) {
					echo '<option value="'.$bebida['IDbebida'].'">'.$bebida['nombreB'].'</option>';
				}?>
					
				</select>
			 </div>
			 <div><label for="postre">Postre</label>
				<select name="postre" class="custom-select">

					<?php while ($postres= $resultpostre->fetch()) {
						echo '<option value="'.$postres['IDpostre'].'">'.$postres['nombreP'].'</option>';
					}
					?>
					
				</select>
			 </div> 
			 <button type="submit" class="btn btn-primary btn-block">Ordenar</button>


		</form>
			
		</div>



	</div>
	
</body>
</html>