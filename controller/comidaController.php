<?php
/**
 * Created by PhpStorm.
 * User: urban
 * Date: 27/03/2019
 * Time: 09:10 PM
 */
require 'connection.php';
$menu= $conn->prepare("SELECT idmenu,nombrePlatillo,tipo,precio,imagen FROM menu WHERE tipo='comida'");
$menu->execute();
$resultado = $menu->fetchAll(PDO::FETCH_ASSOC);
$datos = array();

//while ($resultado= $menu->fetch( PDO::FETCH_ASSOC)){
//    $datos[]= $resultado;
//}
//echo json_encode(array('comidas'=> $datos));

foreach ($resultado as $items): ?>

    <div class="col-md-4 mb-4" >
        <div class="card bg-light" style="">
            <img src="<?=$items['imagen']?>" alt="<?=$items['nombrePlatillo']?>"  title="<?=$items['nombrePlatillo']?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"> <?=$items['nombrePlatillo']?></h5>
                <p class="card-text">$<?=number_format($items['precio'],2)?></p>

                <form action="" method="post" id="form" >
                    <div class="row">
                        <div class="col-md-2 p-2 ml-1">
                            <label for="">Cantidad: </label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" value="1" max="10"min="1" name="cantidadP" class="form-control">
                        </div>
                    </div>
                    <label for="comentario">Comentario</label>
                    <input type="text" class="form-control" placeholder="Agregue un comentario acerca de su orden" name="comment" required>
                    <input type="hidden" value="<?=$items['idmenu']?>" name="idC">
                    <input type="hidden" value="<?=$items['nombrePlatillo']?>" name="nombre">
                    <input type="hidden" value="<?=$items['precio']?>" name="precio">

                    <button class="btn btn-info" type="submit" name="btnAction" value="Agregar"><i class="fas fa-plus"></i> Agregar pedido</button>

                </form>
            </div>
        </div>
    </div>
<?php endforeach;
?>



