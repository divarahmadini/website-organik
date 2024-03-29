<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin DivaShop</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="dashboard">

   <h1 class="title">Beranda</h1>

   <div class="box-container">


      <div class="box">
      <?php
         $select_orders = $conn->prepare("SELECT * FROM `orders`");
         $select_orders->execute();
         $number_of_orders = $select_orders->rowCount();
      ?>
      <h3><?= $number_of_orders; ?></h3>
      <p>Orderan</p>
      <a href="admin_orders.php" class="btn">lihat orderan</a>
      </div>

      <div class="box">
      <?php
         $select_products = $conn->prepare("SELECT * FROM `products`");
         $select_products->execute();
         $number_of_products = $select_products->rowCount();
      ?>
      <h3><?= $number_of_products; ?></h3>
      <p>Produk</p>
      <a href="admin_products.php" class="btn">lihat produk</a>
      </div>

      <div class="box">
      <?php
$user_types = ['user', 'penjual'];

$select_users = $conn->prepare("SELECT * FROM `users` WHERE user_type IN (?, ?)");
$select_users->execute($user_types);
$number_of_users = $select_users->rowCount();
?>

      <h3><?= $number_of_users; ?></h3>
      <p>Total Pengguna</p>
      <a href="admin_users.php" class="btn">lihat akun</a>
      </div>

      <div class="box">
      <?php
         $select_messages = $conn->prepare("SELECT * FROM `message`");
         $select_messages->execute();
         $number_of_messages = $select_messages->rowCount();
      ?>
      <h3><?= $number_of_messages; ?></h3>
      <p>Total Pesan</p>
      <a href="admin_contacts.php" class="btn">lihat pesan</a>
      </div>

   </div>

</section>













<script src="js/script.js"></script>

</body>
</html>