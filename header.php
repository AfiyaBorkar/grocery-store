<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php



if (isset($message)) {
   $messagesAsString = implode("\n", $message);
   echo "<script>
       Swal.fire({
           title: 'Messages',
           html: '$messagesAsString',
           icon: 'info'
       });
   </script>";
}


// if(isset($message)){
//    foreach($message as $message){
//       echo '
//       <div class="message">
//          <span>'.$message.'</span>
//          <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
//       </div>
//       ';
//    }
// }

?>

<header class="header">

   <div class="flex">

      <!-- <a href="admin_page.php" class="logo">Grocery</a> -->
    <a href="admin_page.php" class="logo"> <i class="fas fa-shopping-basket"></i> Grocery </a>

      <nav class="navbar">
         <a href="home.php">Home</a>
         <a href="about.php">About</a>
         <a href="shop.php">Shop</a>
         <a href="orders.php">Orders</a>
         <a href="contact.php">Contact</a>
      </nav>

      <div class="icons">
      <a href="search_page.php" class="fas fa-search"></a>
         <div id="menu-btn" class="fas fa-bars"></div>
         <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
         ?>
         <!-- <a href="cart.php"><i class="fas fa-shopping-cart"></i><span> <?= $count_cart_items->rowCount(); ?></span></a>
         <a href="wishlist.php"><i class="fas fa-heart"></i><span> <?= $count_wishlist_items->rowCount(); ?></span></a> -->
         <a href="cart.php"><i class="fas fa-shopping-cart"></i> <span><?= ($count_cart_items->rowCount() > 0) ? '<sub>' . $count_cart_items->rowCount() . '</sub>' : '' ?></span></a>
<a href="wishlist.php"><i class="fas fa-heart"></i><span> <?= ($count_wishlist_items->rowCount() > 0) ? '<sub>' . $count_wishlist_items->rowCount() . '</sub>' : '' ?></span></a>

         <div id="user-btn" class="fas fa-user"></div>

      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
         <p><?= $fetch_profile['name']; ?></p>
         <a href="user_profile_update.php" class="btn">Update Profile</a>
         <a href="logout.php" class="delete-btn">logout</a>
      </div>

   </div>

</header>
