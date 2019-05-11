<?php
require 'connection.php';
$menu= $conn->prepare("SELECT idmenu,nombrePlatillo,tipo,precio,imagen FROM menu WHERE tipo='bebidas'");
$menu->execute();
$resultado = $menu->fetchAll(PDO::FETCH_ASSOC);

foreach ($resultado as $item): ?>
	<div class="col-md-4 mb-4">
		<div class="card bg-light h-100" >
			<img src="<?=$item['imagen']?>" alt="<?=$item['nombrePlatillo']?>" title="<?=$item['nombrePlatillo']?>" class="card-img-top">
			<div class="card-body">
				<h4 class="card-title"><?=$item['nombrePlatillo']?></h4>
				<p class="card-text">$<?=number_format($item['precio'],2)?></p>
                <form action="" method="post">
                    
                     <div class=" d-flex align-items-center justify-content-around">   
                    <label for="" class="pr-2">Cantidad: </label>
                    <input type="number" value="1" max="10"min="1" name="cantidadP" class="form-control">
                    </div>
                    <label for="comentario">Comentario:</label>
                    <input type="text" class="form-control" placeholder="Agregue un comentario acerca de su orden" name="comment" required>
                    <input type="hidden" value="<?=$item['idmenu']?>" name="idC">
                    <input type="hidden" value="<?=$item['nombrePlatillo']?>" name="nombre">
                    <input type="hidden" value="<?=$item['precio']?>" name="precio">
                    <button class="btn btn-info" type="submit" name="btnAction" value="Agregar"><i class="fas fa-plus"></i> Agregar a pedido</button>
                </form>
			</div>
		</div>
	</div>
<?php endforeach;?>