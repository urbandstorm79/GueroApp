<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Dashboard</title>

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js"
			integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			crossorigin="anonymous"></script>
	<script src="js/scripts.js"></script>

</head>
<body>
<nav class="nav">
	<div class="">
		<a href="#" class="menu-btn"><i class="fas fa-bars"></i></a>
		<h2 class="">GüeroApp</h2>
	</div>
</nav>

<nav class="side-nav">
	<!--<div class="nav"><a href="#" class="menu-btn"><i class="fas fa-bars"></i></a>-->
	<!--<h2>GüeroApp</h2>-->
	<!--</div>-->
    <div class="user">
        <span class="user-img"><i class="fas fa-user-circle"></i></span>
        <p>Welcome <a href="#">UsuariochidoUno</a></p>
    </div>
	<ul>
		<li><a href="#"><i class="fas fa-home"></i> Home</a></li>
		<li><a href="#"><i class="far fa-plus-square"></i> New order</a></li>
		<li><a href="#"><i class="fas fa-book-open"></i> Menu</a></li>
		<li><a href="#"><i class="far fa-clock"></i> History</a></li>
		<li><a href="#"><i class="fas fa-users-cog"></i> User settings</a></li>
		<li><a href="logOut.php"><i class="fas fa-door-open"></i> LogOut</a></li>
	</ul>

    <footer class="footer">
        <p class="separador">Todos los derechos reservados a GueroApp 2019 <i class="far fa-copyright"></i></p>
    </footer>
</nav>

</body>
</html>