<?php
require 'connection.php';
$menu= $conn->prepare('SELECT idpostres,nombre_postres,precio_postres, img_postres FROM postres');
$menu->execute();


while ($resultado = $menu->fetch()): ?>
	<div class="col-md-4 mb-4">
		<div class="card bg-light" style="height: 400px">
			<img src="<?=$resultado['img_postres']?>" alt="Imagen" class="card-img-top">
			<div class="card-body">
				<h4 class="card-title"> <?=$resultado['nombre_postres']?></h4>
				<p class="card-text">$<?=$resultado['precio_postres']?></p>
                <div class="btn-group">
                    <button class="btn btn-info"><i class="fas fa-plus"></i></button>
                    <button class="btn btn-info"> Agregar a pedido</button>
                </div>
			</div>
		</div>
	</div>
<?php endwhile;?>