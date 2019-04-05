<?php  require 'controller/sessionUser.php';
require 'controller/userDataPrint.php';
require 'controller/updateUser.php';
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Configuracion de usuario</title>
	<?php require 'layouts/head-files.php'?>
</head>
<body>
<?php
require 'layouts/menu-nav.php';

if (!empty($msj)){
    echo '
    <h3 class="mensaje">'.$msj.'</h3>
    ';
}
?>

<div class="container">
   <div class="row d-flex justify-content-center align-content-center">
       <div class="col-lg-3 mt-5"></div>
       <div class="col-lg-6">
           <div class="card bg-light shadow-sm p-2" style="margin: 120px auto">
               <form action="userSettings.php" method="post">
                   <h2>Configuracion de usuarios</h2>
                   <div class="form-group">
                       <div class="row">
                           <div class="col-lg-6 form-group">
                               <div class="input-group">
                                   <div class="input-group-prepend">
                                       <span class="input-group-text"><i class="fas fa-address-card"></i>
                                       </span>
                                   </div>
                                   <label class="sr-only">Nombre</label>
                                   <input class="form-control" type="text" name="name" placeholder="Nombre" <?php echo 'value="'.$usr['nombre'].'"'?> >
                               </div>

                           </div>
                           <div class="col-lg-6 form-group">
                               <div class="input-group ">
                                   <div class="input-group-prepend">
                                       <span class="input-group-text"><i class="fas fa-address-card"></i>
                                       </span>
                                   </div>
                                   <label class="sr-only" for="LastName">Apellidos</label>
                                   <input class="form-control" type="text" name="lastName" placeholder="Apellidos" <?php echo 'value="'.$usr['apellido'].'"'?>>
                               </div>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-lg-12 form-group ">
                               <div class="input-group ">
                                   <div class="input-group-prepend">
                                       <span class="input-group-text">
                                           <i class="fas fa-at"></i>
                                       </span>
                                   </div>
                                   <label class="sr-only" for="mail">Correo electronico</label>
                                   <input class="form-control" type="email" name="mail" placeholder="Correo electronico" <?php echo 'value="'.$usr['correo'].'"'?>>
                               </div>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-lg-5 form-group">
                               <div class="input-group ">
                                   <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span></div>
                                   <label class="sr-only" for="user">Nombre de usuario</label>
                                   <input class="form-control" type="text" name="user" placeholder="Nombre de usuario" <?php echo 'value="'.$usr['nombreUsuario'].'"'?>>
                               </div>

                           </div>

                           <div class="col-lg-7 form-group">
                               <div class="input-group ">
                                   <div class="input-group-prepend"><span class="input-group-text"><i
                                                   class="fas fa-key"></i></span></div>
                                   <input class="form-control" type="password" name="pass" placeholder="Contraseña" <?php echo 'value="'.$usr['contra'].'"'?>>
                                   <label class="sr-only" for="pass">Contraseña</label>
                               </div>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-lg-12 form-group">
                               <div class="input-group ">
                                   <div class="input-group-prepend">
                                       <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                   </div>
                                   <input class="form-control" type="tel" name="tel" placeholder="Telefono" <?php echo 'value="'.$usr['telefono'].'"'?>>
                                   <label class="sr-only" for="tel">Telefono</label>
                               </div>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-lg-12 form-group ">
                               <button type="submit" class="btn btn-warning btn-block">Modificar datos</button>
                           </div>
                       </div>
                   </div>
               </form>
           </div>
       </div>
       <div class="col-lg-3"></div>
   </div>
</div>
<?php  require 'layouts/footer.php'?>
</body>
</html>
