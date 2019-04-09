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
<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <?php require'controller/historyController.php';?>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
    
</body>
</html>