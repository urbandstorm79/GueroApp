<?php 
require 'conexionBD.php';

$eliminar=$conn->prepare('DELETE FROM pedido WHERE IDpedido = :idrenglon');
$eliminar->bindparam(':idrenglon',$_GET['no']);
if ($eliminar->execute()) {
	header('Location: ../restaurante/historialPedidos.php');
   echo "todo bien";

}else{

	echo "todo mal alv";
}




 ?>