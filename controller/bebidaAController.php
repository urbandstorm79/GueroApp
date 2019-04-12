<?php
require 'connection.php';
$menu= $conn->prepare('SELECT idbebidasA,nombre_bebidasA,precio_bebidasA, img_bebidasA FROM bebidasa');
$menu->execute();


while ($resultado = $menu->fetch()): ?>
	<div class="col-md-4 mb-4">
		<div class="card bg-light" style="height: 400px">
			<img src="<?=$resultado['img_bebidasA']?>" alt="Imagen" class="card-img-top">
			<div class="card-body">
				<h4 class="card-title"> <?=$resultado['nombre_bebidasA']?></h4>
				<p class="card-text">$<?=$resultado['precio_bebidasA']?></p>
                <div class="btn-group">
                    <button class="btn btn-info"><i class="fas fa-plus"></i></button>
                    <button class="btn btn-info"> Agregar a pedido</button>
                </div>
			</div>
		</div>
	</div>
<?php endwhile;?>