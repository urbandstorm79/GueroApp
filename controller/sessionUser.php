<?php
/**
 * Created by PhpStorm.
 * User: urban
 * Date: 17/03/2019
 * Time: 01:59 PM
 */
session_start();
require 'connection.php';

if (isset($_SESSION['user-id'])){


	$records = $conn->prepare('SELECT nombreUsuario,fecha FROM usuarios WHERE idUsuarios = :id');
	$records->bindParam(':id',$_SESSION['user-id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = null;

	if (!empty($results)) {
		$user = $results;
//		echo $user['nombreUsuario'];
//		echo 'Todo bien';
	}

}else{
	header('Location: ../../GueroApp/login.php');
}