<script src="https://cdn.jsdelivr.net/npm/vue"></script>
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
    <div class="col-lg-4 mb-4">
        <div class="card shadow" style="height: 400px">
            <img src="<?=$resultado['img_comidas']?>" alt="Imagen" class="card-img-top">
            <div class="card-body">
                <h4 class="card-title"> <?=$resultado['nombre_comidas']?></h4>
                <p class="card-text">$<?=$resultado['precio_comidas']?></p>
                <button class="btn btn-info"><i class="fas fa-plus"></i> Agregar a pedido</button>
            </div>
        </div>
    </div>
<?php endwhile;?>

<script></script>

