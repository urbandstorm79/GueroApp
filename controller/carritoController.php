<?php
/**
 * Created by PhpStorm.
 * User: urban
 * Date: 25/04/2019
 * Time: 03:47 PM
 */
//session_start();
$msj="";
if (isset($_POST['btnAction'])){
	switch ($_POST['btnAction']){
		case 'Agregar':
			if (is_numeric($_POST['idC'])){
				$id=$_POST['idC'];
				$msj= 'ok, todo bien '.$id;
			}else{
				$msj="Upss... id incorrecto";
			}
			if (is_numeric($_POST['cantidadP'])){
				$cantidad = $_POST['cantidadP'];
			}else{
				$msj= "Upss... cantidad erroneas";
			}
			if (is_string($_POST['nombre'])){
				$nombre= $_POST['nombre'];
			}else{
				$msj="Nombre incorrecto";
			}
			if (is_numeric($_POST['precio'])){
				$precio= $_POST['precio'];
			}else{
				$msj="Precio equivocado ";
			}
			if (!isset($_SESSION['carrito'])){
				$orden= array(
					'idC'=>$id,
					'cantidadP'=>$cantidad,
					'nombre'=>$nombre,
					'precio'=>$precio
				);
				$_SESSION['carrito'][0]=$orden;
				$msj='Orden agregada';
			}else{
				$idOrden= array_column($_SESSION['carrito'],'idC');
				if (in_array($id,$idOrden)){
					echo '<script>alert("Producto ya seleccionado")</script>';
					$msj="";
				}else{
					$numOrden= count($_SESSION['carrito']);
					$orden= array(
						'idC'=>$id,
						'cantidadP'=>$cantidad,
						'nombre'=>$nombre,
						'precio'=>$precio
					);

					$_SESSION['carrito'][$numOrden]=$orden;
					$msj= "Producto agregado!! ";
				}
			}
			break;
	}
}
