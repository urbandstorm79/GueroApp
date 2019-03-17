<?php
/**
 * Created by PhpStorm.
 * User: urban
 * Date: 17/03/2019
 * Time: 03:53 PM
 */
require 'connection.php';
//if (isset($_SESSION['user-id'])){
	$data = $conn->prepare('SELECT nombre, apellido, correo,nombreUsuario, contra, telefono FROM usuarios WHERE idUsuarios=:id');
	$data->bindParam(':id', $_SESSION['user-id']);
	$data->execute();
	$result= $data->fetch(PDO::FETCH_ASSOC);
	$usr= null;
	if (count($result)>0){
		$usr= $result;
	}

//}else{
//	header('Location:../login.php');
//}
