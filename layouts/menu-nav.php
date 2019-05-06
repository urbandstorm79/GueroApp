<?php
/**
 * Created by PhpStorm.
 * User: urban
 * Date: 16/03/2019
 * Time: 03:09 PM
 */?>
<nav class="navbar navbar-light bg-light  sticky-top shadow">

	<div class=" d-flex align-items-center">
		<div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bars"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php require 'side-nav.php';?>
            </div>
        </div>

        <a  href="../../GueroApp/dashboard.php" class="navbar-brand">
            GüeroApp
        </a>
    </div>

	</div>
    <div class="navbar-nav">
       <li class="nav-item"><a href="carrito.php" class="nav-link btn"><i class="fas fa-shopping-cart"></i>
               (<?=empty($_SESSION['carrito'])?0:count($_SESSION['carrito']);?>)</a></li>
    </div>
</nav>
