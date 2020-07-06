<?php
if(isset($_POST['sub'])) { 
    $checkbox1=$_POST['promo'];
    $checkbox2=$_POST['cerveza'];  
    $chk="";
    $chkc="";  
    //$id_usuario = $user['id'];
    $id_usuario = 120;

    foreach($checkbox1 as $chk1)  
      {  
          $chk .= $chk1.",";  
      } 

    foreach($checkbox2 as $chk2)  
      {  
          $chkc .= $chk2.",";  
      }

    $conn=mysqli_connect("localhost", "root", "","cerveceria")or die("cannot connect");//connection string

    $in_ch=mysqli_query($conn,"insert into pedidos(id_usuario, promos, cervezas) values ('$id_usuario','$chk','$chkc')");  
    }


    $cant = 0;
    if (isset($_REQUEST['chk1'])) {
    $cant++;
    }
    if (isset($_REQUEST['chk2'])) {
    $cant++;
    }
    if (isset($_REQUEST['chk3'])) {
    $cant++;
    }
    if (isset($_REQUEST['chk4'])) {
    $cant++;
    }
    

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carga de pedido</title>
</head>
<body>
    <?php if($in_ch==1): ?> 
        <h1>Pedido cargado con exito!</h1>
        <?php echo " total $cant promos." ?>
    <?php else:?>
        <h1>Error</h1>
    <?php endif; ?>
</body>
</html>