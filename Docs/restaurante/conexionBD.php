<?php 
$servidor = "localhost";
$nombreU = "root";
$contraU = "";
$baseDatos = "restaurante";


try {
	$conn =  new PDO("mysql:host=$servidor;dbname=$baseDatos;",$nombreU,$contraU);
} catch (PDOException $e) {
	die('Conexión fallida'.$e->getMessage());
}
 ?>