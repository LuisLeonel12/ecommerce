<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="orders">

   <h1 class="heading">PEDIDOS REALIZADOS</h1>

   <div class="box-container">


   <?php $num_aleatorio = rand(2, 7); 
   
   $mensaje = 'SU PEDIDO SERA ENTREGADO EN UN PLAZON MAXIMO DE: '.$num_aleatorio. " DIAS";
   ?>

   <?php
      if($user_id == ''){
         echo '<p class="empty">por favor inicie sesión para ver sus pedidos</p>';
      }else{
         $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
         $select_orders->execute([$user_id]);
         if($select_orders->rowCount() > 0){
            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p>fecha de pedido: <span><?= $fetch_orders['placed_on']; ?></span></p>
      <p>nombre : <span><?= $fetch_orders['name']; ?></span></p>
      <p>correo electronico : <span><?= $fetch_orders['email']; ?></span></p>
      <p>telefono : <span><?= $fetch_orders['number']; ?></span></p>
      <p>direccion : <span><?= $fetch_orders['address']; ?></span></p>
      <p>metodo de pago : <span><?= $fetch_orders['method']; ?></span></p>
      <p>ordenes : <span><?= $fetch_orders['total_products']; ?></span></p>
      <p>total : <span>$<?= $fetch_orders['total_price']; ?></span> <span>MXN</span></p>
      <p>estatus de pago : <span style="color:<?php if($fetch_orders['payment_status'] == 'Pendiente'){ echo 'red'; $mensaje = ' (el pago aun no ha sido procesado)';}else{ echo 'green'; $mensaje = ' su pedido sera entregado en un plazo maximo de '.$num_aleatorio.' dias'; } ?>"><?= $fetch_orders['payment_status'].$mensaje?></span>

      </p>
   
   </div>
   <?php
      }
      }else{
         echo '<p class="empty">no hay pedidos realizados todavía!</p>';
      }
      }
   ?>

   </div>

</section>

<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>