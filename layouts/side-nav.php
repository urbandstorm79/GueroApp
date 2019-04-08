<nav id="side-nav" class="side-nav overflow-auto">
    <!--        <div class="navbar navbar-light bg-light"><a href="#" class="menu-btn"><i class="fas fa-bars"></i></a>-->
    <!--        <h2>GüeroApp</h2>-->
    <!--        </div>-->
    <div class="user">
        <div class="user-img w-100 text-center"><i class="fas fa-user-circle"></i></div>
		<?php if (!empty($user)){
			echo '<strong> Bienvenido '.$user['nombreUsuario'].'</strong>';//concatenar con .
		}
		?>
    </div>
    <ul>
        <li><a href="../../GueroApp/dashboard.php"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="../../GueroApp/menu.php"><i class="fas fa-book-open"></i> Menú</a></li>
        <li><a href="../../GueroApp/historial.php"><i class="far fa-clock"></i> Historial</a></li>
        <li><a href="../../GueroApp/userSettings.php"><i class="fas fa-users-cog"></i> Usuario</a></li>
        <li><a href="logOut.php"><i class="fas fa-door-open"></i> Salir</a></li>
    </ul>
</nav>