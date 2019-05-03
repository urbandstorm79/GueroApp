<?php
require 'connection.php';
//require 'sessionUser.php';
$state = $conn->prepare("SELECT * FROM pedidos WHERE Usuarios_usuario = :idUsuario");
$state->bindParam(':idUsuario', $_SESSION['user-id']);
$state->execute();
$rows= $state->rowCount();
$total=0;
$resultPedido= $state->fetchAll();
// echo $rows;
if ($rows>0){
	foreach ($resultPedido as $pedidos){
		?>
        <div class="col-lg-12">
            <div class="card mb-2">
                <div class="bg-light p-2 text-muted border-bottom">
                    <span class="border-right p-2">Fecha <?php $fechaP=new DateTime($pedidos['fecha']); echo $fechaP->format('d-M-Y')?></span> <span>Total: $<?=number_format($pedidos['total'],2)?></span>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Pedido numero: <?=$pedidos['idpedidos']?></h4>
                    <div class="row">
						<?php
						$state=$conn->prepare("SELECT * FROM detalleventa WHERE pedidos_idpedidos=:idPedido");
						$state->bindParam(':idPedido',$pedidos['idpedidos']);
						$state->execute();
						while($detail=$state->fetch(PDO::FETCH_ASSOC  )){

							?>
							<?php
							$menu = $conn->prepare('SELECT nombrePlatillo,imagen FROM menu WHERE idmenu= :IDmenu');
							$menu->bindParam(':IDmenu', $detail['menu_idmenu']);
							$menu->execute();
							while ($rsm=$menu->fetch(PDO::FETCH_ASSOC)){
								?>
                                <div class="col-md-6  p-2">
                                    <img class=" img-thumbnail" src="<?=$rsm['imagen']?>" alt="<?=$rsm['nombrePlatillo']?>" width="200px">

                                </div>
                                <div class="col-md-6 border-top p-2">
                                <h5 class="card-text"><?=$rsm['nombrePlatillo']?></h5>


								<?php
							}

							?>
                            <p class="card-text"><span><strong>Precio unitario:</strong> $<?=number_format($detail['precioUnitario'],2)?></span><span> <strong>Cantidad:  </strong><?=$detail['cantidad']?></span></p>
                            </div>


							<?php
						}
						?>
                    </div>
                </div>
            </div>
        </div>

		<?php
	}

}else{
	?>
    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 text-center">
                <h4 class="">No tienes pedidos</h4>
                <a href="../../GueroApp/menu.php" class="btn btn-outline-warning m-auto btn-lg ">Ir a menu</a>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
<?php
}
