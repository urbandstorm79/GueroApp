<?php

require 'controller/sessionUser.php'
?>

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Dashboard</title>
<?php  require 'layouts/head-files.php'?>

</head>
<body>
<?php  require 'layouts/menu-nav.php'?>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12" style="height: 400px; background-image: url(img/fondoMedi.jpg); background-size: cover; background-position: center center; background-attachment: fixed">
           <h2 class="display-3 text-white text-center">GüeroApp</h2>
            <h3 class="text-center text-white">A tu servicio</h3>
        </div>

    </div>
    <div class="row p-2">
        <div class="col-lg-12">
            <div class="row" >
                <div class="col-lg-6">
                    <img class=" w-100" src="img/imagen1.jpg" alt="Foto del lugar">
                </div>
                <div class="col-lg-6">
                    <div class="p-5 text-justify">
                        <p>El equipo de GüeroApp se preocupa por sus clientes, en especifico por que nuestros clientes puedan ofrecer un servicio de la mas alta calidad
                            con la total seguridad de que sus comensales, saldran con el estomago lleno y con gran sonrisa. El objetivo de la aplicacion, es el de permitir
                            que las ordenes sean entregadas a tiempo y eficazmente.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row justify-content-center" style="background-color: #FFF486">
        <div class="col-lg-6">
            <div class="p-5">
                <p class="text-justify">Ordene sus menus de forma agradable y accesible para sus clientes. Deje de vivir en el pasado, dele a sus clientes el poder de tomar la decision por completo sobre
                    lo que van a comer. </p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium architecto atque corporis cupiditate delectus dignissimos, eos eum fugiat iusto maxime minima necessitatibus perferendis quae sapiente tempora tenetur vitae voluptates.</p>
                <img class="" src="img/fast-food.png" alt="Comida" style=" width: 50px; margin: auto 50%">
            </div>
        </div>
    </div>
</div>

<?php  require 'layouts/footer.php'?>
</body>
</html>