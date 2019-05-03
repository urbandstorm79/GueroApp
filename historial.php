<?php require 'controller/sessionUser.php'?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Historial de pedidos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require 'layouts/head-files.php'?>
</head>
<body>
<?php require 'layouts/menu-nav.php'?>
<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <h2 class="border-bottom">Mis pedidos</h2>
            <div class="row">
				<?php require'controller/historyController.php';?>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
    
</body>
</html>