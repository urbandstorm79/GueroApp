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


while ($resultado = $menu->fetch(PDO::FETCH_ASSOC)): ?>
    <div class="col-md-4 mb-4" style="flex-wrap: wrap; justify-content: space-around; display: flex; align-items: normal;">
    <div class="card bg-light" style="display:flex; align-items: normal; justify-content: flex-end; flex-shrink: 2">
        <img src="<?=$resultado['img_comidas']?>" alt="Imagen" class="card-img-top">
        <div class="card-body p-2">
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



