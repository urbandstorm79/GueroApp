<?php
/**
 * Created by PhpStorm.
 * User: urban
 * Date: 29/04/2019
 * Time: 10:08 PM
 */
require 'controller/sessionUser.php';
require 'controller/carritoController.php';

?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php require 'layouts/head-files.php'?>
	<title>Finalizando proceso de pedido</title>
</head>
<body>
<?php require 'layouts/menu-nav.php'?>
<div class="container">
	<?php if (isset($_SESSION['carrito'])):?>
	<div class="row" style="margin-top: 50px">
		<div class="col-md-12">
			<div class="alert alert-warning" role="alert">
				<strong>Su pedido estara listo en unos minutos!!</strong>
				<p>Una vez terminado el proceso, debera presentar su ticktet y pasar a caja para recibir su pedido</p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Detalle de pedido</h4>
					<div class="row text-center">
						<div class="col-sm-3">
							<h5>Descripcion</h5>
						</div>
						<div class="col-sm-3">
							<h5>Cantidad</h5>
						</div>
						<div class="col-sm-3">
							<h5>Precio unitario</h5>
						</div>
						<div class="col-sm-3">
							<h5>Precio de venta</h5>
						</div>
					</div>
					<div class="row p-2">
						<?php
						$total=0;
						foreach ($_SESSION['carrito'] as $index=> $item):
							$total= $total+($item['precio']*$item['cantidadP']);
							?>
							<div class="col-sm-3 ">
								<p class="card-text"><?=$item['nombre']?></p>
							</div>
							<div class="col-sm-3 text-center">
								<p class="card-text"><?=$item['cantidadP']?></p>
							</div>
							<div class="col-sm-3 text-center">
								<p class="card-text">$<?=number_format($item['precio'],2)?></p>
							</div>
							<div class="col-sm-3 text-center">
								<p class="card-text">$<?=number_format($item['precio']*$item['cantidadP'],2)?></p>
							</div>

						<?php endforeach;?>
					</div>
					<div class="card-footer bg-white">
                        <div class="row pt-2">
                            <div class="col-md-6 "></div>
                            <div class="col-md-6 text-center">
                                <h4>Total</h4>
                                <h5>$<?=number_format($total,2)?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="">
                                    <button class="btn btn-outline-warning btn-lg btn-block">Finalizar pedido</button>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>

				</div>
			</div>

		</div>
	</div>
	<?php endif;?>
</div>

<?php
//$session = session_id();
//$stmnt = $conn->prepare("INSERT INTO pedidos (CLAVETRANSACCION, FECHA, TOTAL, STATUS, USUARIOS_USUARIO) VALUES
//(:keyS,NOW(),:total,'pendiente',:userId)");
//$stmnt->bindParam('keyS',$session);
//$stmnt->bindParam(':total',$total);
//$stmnt->bindParam(':userId',$_SESSION['user-id']);
//$stmnt->execute();
//$idPedido=$conn->lastInsertId();
//
//foreach ($_SESSION['carrito'] as $index=>$items){
//    $stmnt = $conn->prepare("INSERT INTO detalleventa (pedidos_idpedidos, menu_idmenu, precioUnitario, cantidad)
//VALUES (:idPedido,:idmenu,:precioU,:cantidad)");
//    $stmnt->bindParam(':idPedido',$idPedido);
//    $stmnt->bindParam(':idmenu',$items['idC']);
//    $stmnt->bindParam(':precioU',$items['precio']);
//    $stmnt->bindParam(':cantidad',$items['cantidadP']);
//    $stmnt->execute();
//}

?>

</body>
</html>
