<?php
/**
 * Created by PhpStorm.
 * User: urban
 * Date: 17/03/2019
 * Time: 02:02 PM
 */
require 'connection.php';
if (isset($_SESSION['user-id'])){
	$msj='';
	if (!empty($_POST['name']) && !empty($_POST['lastName']) && !empty($_POST['mail']) && !empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['tel'])){
		$query= 'UPDATE usuarios SET nombre=:nombre,apellido=:apellido,correo=:correo,nombreUsuario=:userN,contra=:pass,telefono=:tel 
	WHERE idUsuarios=:id';
		$stmt= $conn->prepare($query);
		$stmt->bindParam(':nombre', $_POST['name']);
		$stmt->bindParam(':apellido', $_POST['lastName']);
		$stmt->bindParam(':correo', $_POST['mail']);
		$stmt->bindParam(':userN', $_POST['user']);
		if ($_POST['pass']==$usr['contra']){
			$stmt->bindParam(':pass', $_POST['pass']);
		}else{
			$password= password_hash($_POST['pass'], PASSWORD_BCRYPT);
//			$_POST['pass']
			$stmt->bindParam(':pass', $password);
			echo 'no se parecen';
		}

		$stmt->bindParam(':tel', $_POST['tel']);
		$stmt->bindParam(':id', $_SESSION['user-id']);
		if ($stmt->execute()){
			$msj= 'Tus datos se han actualizado satisfactoriamente!!';
			require 'userDataPrint.php';
		}else{
			$msj='Ha ocurrrido un error';
		}

	}
}
