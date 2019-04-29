<?php
/**
 * Created by PhpStorm.
 * User: urban
 * Date: 23/04/2019
 * Time: 07:13 PM
 */
require 'controller/sessionUser.php';
require 'controller/carritoController.php';

?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php require 'layouts/head-files.php'?>
	<title>Carrito de compras</title>
</head>
<body>
<?php require 'layouts/menu-nav.php'?>
<div class="container" style="margin-top:100px ">
    <?php if (!empty($eliminado)){
        echo '<div class="alert alert-danger" role="alert">
        	<strong>'.$eliminado.'</strong>
        </div>';
	}?>
	<div class="row">
		<div class="col-lg-12">
            <h2 class="text-center">Tus pedidos</h2>
            <a href="menu.php" class="btn btn-info">Volver al menu</a>
            <?php if (!empty($_SESSION['carrito'])){?>
			<table class="table-responsive-lg table-bordered text-center">
				<thead class="thead-light">
				<tr>
					<th>Descripcion</th>
					<th>Cantidad</th>
					<th>Precio</th>
					<th>Total</th>
					<th>--</th>
				</tr>
				</thead>
				<tbody>
                <?php
                $total=0;
                foreach ($_SESSION['carrito'] as $index=>$item):?>
				<tr>
					<td scope="row"><?=$item['nombre']?></td>
					<td><?=$item['cantidadP']?></td>
					<td>$<?=$item['precio']?></td>
					<td><?=number_format($item['precio']*$item['cantidadP'],2)?></td>
					<td>
                        <form action="" method="post">
                            <input type="hidden" value="<?=$item['idC']?>" name="id">
                            <button type="submit" class="btn btn-warning" name="btnAction" value="Borrar" >Cancelar</button>
                        </form>
                    </td>

				</tr>
					<?php $total= $total+($item['precio']*$item['cantidadP'])?>
				<?php endforeach; ?>
                <tr>
                    <td colspan="3"><h4>Total</h4></td>
                    <td><h5>$<?=number_format($total,2)?></h5></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="5">
                        <button class="btn btn-primary btn-lg">Hacer pedido</button>
                    </td>
                </tr>
				</tbody>
			</table>
            <?php }else{
                echo '<div class="alert alert-info" role="alert">
                	<strong class="text-center">No hay productos en el carrito</strong>
                </div>';
			}?>
		</div>
	</div>
</div>
<?php require 'layouts/footer.php'?>
</body>
</html>
