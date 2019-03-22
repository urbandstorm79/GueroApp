<div class="">
    <nav id="side-nav" class="side-nav">
<!--        <div class="navbar navbar-light bg-light"><a href="#" class="menu-btn"><i class="fas fa-bars"></i></a>-->
<!--        <h2>GüeroApp</h2>-->
<!--        </div>-->
        <div class="user">
            <div class="user-img w-100"><i class="fas fa-user-circle"></i></div>
			<?php if (!empty($user)){
				echo '<p> Bienvenido '.$user['nombreUsuario'].'</p>';//concatenar con .
			}
			?>
        </div>
        <ul>
            <li><a href="../../GueroApp/dashboard.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="#"><i class="far fa-plus-square"></i> Nueva orden</a></li>
            <li><a href="#"><i class="fas fa-book-open"></i> Menú</a></li>
            <li><a href="#"><i class="far fa-clock"></i> Historial</a></li>
            <li><a href="../../GueroApp/userSettings.php"><i class="fas fa-users-cog"></i> Configuración de usuario</a></li>
            <li><a href="logOut.php"><i class="fas fa-door-open"></i> Cerrar sesión</a></li>
        </ul>

        <footer class="">
            <p class="separador">Todos los derechos reservados a GueroApp 2019 <i class="far fa-copyright"></i></p>
        </footer>
    </nav>
</div>