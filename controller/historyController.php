<?php
require 'connection.php';
//require 'sessionUser.php';
$state = $conn->prepare("SELECT * FROM pedidos WHERE idpedidos = :id");
$state->bindParam(':id', $_SESSION['user-id']);
$state->execute();
$rows= $state->rowCount();
$total=0;
// echo $rows;
if($rows>0){
    ?>
    <table class="table text-center">
        <thead>
            <th class="">Pedido</th>
            <th>Cantidad</th>
            <th class="">Precio</th>
            <th class="">Fecha</th>
        </thead>
        <tbody>
    
    <?php
    while ($result= $state->fetch()){
    ?>

        <tr class="">
            <?php
            $stateFood=$conn->prepare('SELECT nombre_comidas, precio_comidas FROM comidas where idcomidas=:idf');
            $stateFood->bindParam(':idf', $result['comidas_idcomidas']);
            $stateFood->execute();
            while ($rsF=$stateFood->fetch(PDO::FETCH_ASSOC)):
                $total+=$rsF['precio_comidas'];
            ?>
        <td><?=$rsF['nombre_comidas']?></td>
            <td>1</td>
                <td>$<?=$rsF['precio_comidas'] ?></td>
            <td><?=$result['fecha']?></td>

          <?php endwhile;  ?>

        </tr>
        <tr class="">
			<?php
			$stateDrink=$conn->prepare('SELECT nombre_bebidas, precio_bebidas FROM bebidas WHERE idbebidas=:idd');
			$stateDrink->bindParam(':idd', $result['bebidas_idbebidas']);
			$stateDrink->execute();
			while ($rsD=$stateDrink->fetch(PDO::FETCH_ASSOC)):
                $total+=$rsD['precio_bebidas'];
				?>
                <td><?=$rsD['nombre_bebidas']?></td>
            <td>1</td>
                <td>$<?=$rsD['precio_bebidas']?></td>
                <td><?=$result['fecha']?></td>
			<?php endwhile;?>

        </tr>
        <tr class=""><th colspan="2">Total</th>
            <td colspan="">$<?php echo $total?></td>
            <td></td>
        </tr>
        </tbody>
        </table>
        
    <?php
    }
}else{
    echo '<h3 class="text-center mt-5">No hay pedidos</h3>  ';
}

