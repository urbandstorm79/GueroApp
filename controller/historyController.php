<?php
require 'connection.php';
require 'sessionUser.php';
$state = $conn->prepare("SELECT * FROM pedidos WHERE idpedidos = :id");
$state->bindParam(':id', $_SESSION['user-id']);
$state->execute();
$rows= $state->rowCount();
// echo $rows;
if($rows>0){
    ?>
    <table class="table text-center">
        <thead>
            <th class="">Comida</th>
            <th class="">Bebida</th>
            <th class="">Postre</th>
        </thead>
        <tbody>
    
    <?php
    while ($result= $state->fetch(PDO::FETCH_ASSOC)){
    ?>

        <tr class="">
        <td><?=$result['usuarios_idUsuario']?></td>
        <td><?=$result['comidas_idcomidas']?></td>
        <td><?=$result['bebidas_idbebidas']?></td>
        </tr>
        </tbody>
        </table>
        
    <?php
    }
}else{
    echo '<h3 class="text-center">No hay pedidos</h3>  ';
}

