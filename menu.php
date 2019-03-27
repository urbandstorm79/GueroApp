<?php
require 'controller/sessionUser.php';

?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php require 'layouts/head-files.php'?>
	<title>Menu</title>
</head>
<body>

<?php
require 'layouts/menu-nav.php';
require 'layouts/side-nav.php';
?>
<div class="container">
	<div class="row">
		<div class="col-lg-4"></div>
		<div class="col-lg-4"></div>
		<div class="col-lg-4"></div>
	</div>
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8">
			<div class="card-deck">

			</div>
		</div>
		<div class="col-lg-2"></div>
	</div>
	<div class="row">
		<div class="col-lg-4"></div>
		<div class="col-lg-4"></div>
		<div class="col-lg-4"></div>
	</div>
</div>

<?php  require 'layouts/footer.php'?>

</body>
</html>
