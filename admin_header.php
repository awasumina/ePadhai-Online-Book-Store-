<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <div class="flex">
      <!-- <a href="admin_page.php">Admin Panel</a> -->
<!-- <a href="admin_page.php" class="logo">Admin<span>Panel</span></a> -->

<img src="images/logo.png" alt="" style="width:6rem;">

      <nav class="navbar">
         <a href="admin_page.php">Home</a>
         <a href="admin_products.php">Books</a>
         <a href="admin_orders.php">Orders</a>
         <a href="admin_users.php">Users</a>
         <a href="admin_contacts.php">Messages</a>
         <a href="admin_downloads.php">Free Downloads</a>

      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn" style="background-color:#296E85">Logout</a>
         <div><a href="login.php">Login</a> | <a href="register.php">Register</a></div>
      </div>

   </div>

</header>