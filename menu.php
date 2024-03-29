<?php
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
	<title>Menu</title>
</head>
<body>

<?php
require 'layouts/menu-nav.php';
//require 'layouts/side-nav.php';
?>
<div class="container-fluid mt-5">
	<div class="row">
		<div class="col-lg-4"></div>
		<div class="col-lg-4">

        </div>
		<div class="col-lg-4"></div>
	</div>
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8">
            <?php
            if (!empty($msj)):
            ?>
            <div class="alert alert-success" role="alert">
                <strong><?=$msj?></strong> <a href="carrito.php" class="badge badge-info">Ver orden</a>
            </div>
            <?php endif;
            ?>
            <div class="row">
                <div class="col-md-12">

                    <ul class="nav nav-pills mb-3 rounded p-2 border" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-comida-tab" data-toggle="pill" href="#pills-comida" role="tab" aria-controls="pills-comida" aria-selected="true">Plato principal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-bebida-tab" data-toggle="pill" href="#pills-bebida" role="tab" aria-controls="pills-bebida" aria-selected="false">Bebidas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-postre-tab" data-toggle="pill" href="#pills-postre" role="tab" aria-controls="pills-postre" aria-selected="false">Postres</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-comida" role="tabpanel" aria-labelledby="pills-comida-tab">
                            <h2 class="text-center">Plato principal</h2>

                            <div class="card-deck" >
								<?php require 'controller/comidaController.php'?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-bebida" role="tabpanel" aria-labelledby="pills-bebida-tab">
                            <h2 class="text-center">Bebidas</h2>
                            <div class="card-deck">
                                <?php require 'controller/bebidaController.php'?>
                                <?php
                                $usrFecha=new DateTime($user['fecha']);
                                $usrY= $usrFecha->format('Y');
                                $hoy= getdate();
                                $edad= $hoy['year']-$usrY;
								if ($edad>=18){

									require 'controller/bebidaAController.php';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-postre" role="tabpanel" aria-labelledby="pills-postre-tab">
                            <h2 class="text-center">Postres</h2>
                            <div class="card-deck">
                                <?php require 'controller/postreController.php'?>
                            </div>
                        </div>
                    </div>

                </div>


			</div>

		</div>
		<div class="col-lg-2">

        </div>
	</div>
	<div class="row">
		<div class="col-lg-4"></div>
		<div class="col-lg-4"></div>
		<div class="col-lg-4"></div>
	</div>
</div>

<?php  require 'layouts/footer.php'?>

</body>
</html>

