<?php
require 'connection.php';
$menu= $conn->prepare("SELECT idmenu,nombrePlatillo,tipo,precio,imagen FROM menu WHERE tipo='postres'");
$menu->execute();
$resultado = $menu->fetchAll(PDO::FETCH_ASSOC);

foreach($resultado as $item): ?>
	<div class="col-md-4 mb-4">
		<div class="card bg-light" style="">
			<img src="<?=$item['imagen']?>" alt="<?=$item['nombrePlatillo']?>" class="card-img-top" title="<?=$item['nombrePlatillo']?>">
			<div class="card-body">
				<h4 class="card-title"> <?=$item['nombrePlatillo']?></h4>
				<p class="card-text">$<?=number_format($item['precio'],2)?></p>

                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-2 p-2 ml-1">
                            <label for="">Cantidad: </label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" value="1" max="10"min="1" name="cantidadP" class="form-control">
                        </div>
                    </div>
                    <input type="hidden" value="<?=$item['idmenu']?>" name="idC">
                    <input type="hidden" value="<?=$item['nombrePlatillo']?>" name="nombre">
                    <input type="hidden" value="<?=$item['precio']?>" name="precio">
                    <div class="btn-group">
                        <button class="btn btn-info"><i class="fas fa-plus"></i></button>
                        <button class="btn btn-info" type="submit" name="btnAction" value="Agregar"> Agregar a pedido</button>
                    </div>
                </form>
			</div>
		</div>
	</div>
<?php endforeach;?>