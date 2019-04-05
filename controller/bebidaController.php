<?php
require 'connection.php';
$menu= $conn->prepare('SELECT idbebidas,nombre_bebidas,precio_bebidas, img_bebidas FROM bebidas');
$menu->execute();


while ($resultado = $menu->fetch()): ?>
	<div class="col-md-4 mb-4">
		<div class="card bg-light" style="height: 400px">
			<img src="<?=$resultado['img_bebidas']?>" alt="Imagen" class="card-img-top">
			<div class="card-body">
				<h4 class="card-title"> <?=$resultado['nombre_bebidas']?></h4>
				<p class="card-text">$<?=$resultado['precio_bebidas']?></p>
                <div class="btn-group">
                    <button class="btn btn-info"><i class="fas fa-plus"></i></button>
                    <button class="btn btn-info"> Agregar a pedido</button>
                </div>
			</div>
		</div>
	</div>
<?php endwhile;?>