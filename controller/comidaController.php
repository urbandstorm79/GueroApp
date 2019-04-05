<?php
/**
 * Created by PhpStorm.
 * User: urban
 * Date: 27/03/2019
 * Time: 09:10 PM
 */
require 'connection.php';
$menu= $conn->prepare('SELECT idcomidas,nombre_comidas,precio_comidas, img_comidas FROM comidas');
$menu->execute();


while ($resultado = $menu->fetch()): ?>
    <div class="col-md-4 mb-4">
    <div class="card bg-light">
        <img src="<?=$resultado['img_comidas']?>" alt="Imagen" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"> <?=$resultado['nombre_comidas']?></h5>
            <p class="card-text">$<?=$resultado['precio_comidas']?></p>
            <div class="btn-group">
                <button class="btn btn-info"><i class="fas fa-plus"></i></button>
                <button class="btn btn-info"> Agregar a pedido</button>
            </div>
        </div>
    </div>

    </div>
<?php endwhile;?>


