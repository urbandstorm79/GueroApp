<?php
/**
 * Created by PhpStorm.
 * User: urban
 * Date: 16/03/2019
 * Time: 03:09 PM
 */?>
<nav class="navbar navbar-light bg-light  sticky-top shadow">
	<div class="navbar-brand d-flex">
		<div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bars"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php require 'side-nav.php'?>
            </div>
        </div>
        </div>
		<h2 class="">GüeroApp</h2>
	</div>
    <div class="navbar-nav">
       <li class="nav-item"><a href="#" class="nav-link btn dropdown-toggle"><i class="fas fa-shopping-cart"></i></a></li>
    </div>
</nav>
