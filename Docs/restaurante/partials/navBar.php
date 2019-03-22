<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../../restaurante/historialPedidos.php">Restaurante</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Bienvenido <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><i class="fas fa-user"></i> <?= $user['nombreU']  ?></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         <a class="dropdown-item" href="../../restaurante/ediciondeU.php"><i class="fas fa-user-edit"></i> Datos del usuario</a>
         <a class="dropdown-item" href="../../restaurante/historialPedidos.php"> <i class="fas fa-book-open"></i> Historial</a>
          <a class="dropdown-item" href="../../restaurante/salida.php"><i class="fas fa-door-open"></i>	Cerrar sesión</a>

          
        </div>
      </li>
    </ul>
  </div>
</nav>