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
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <style>

      .flex .fa{
         padding : 4px;
         font-size:15px;
      }

      .navbar a {
         color: #ff3131;
         font-size:50px;
      }

    </style>


</head>

<body>
<header class="header">

<div class="header-1" style="background-color:#ecf0f3;">
   <div class="flex">
   <!-- <img src="images/logo.png" alt="" id="logoePadhai" style="   width: 80px;
height: 65px; margin-right:-65%"> -->
<a href="home.php" class="logo">
      <img src="images/logowhites.png" alt="" id="logoePadhai" style="   width: 70px; float :left;
height: 39px; margin-right:15%; "></a>
      <div class="share" style=" margin-right:65%">
         <a href="#" class="fab fa-facebook-f" style="color:#796665;"></a>
         <a href="#" class="fab fa-twitter" style="color:#796665;"></a>
         <a href="#" class="fab fa-instagram" style="color:#796665;"></a>

      </div>
      <p style="color: #796665" > <a href="login.php" style="color:  #796665; font-weight:600;">Login</a> | <a href="register.php" style="color: #796665; font-weight:600;">Register</a> </p>
   </div>
</div>

<div class="header-2 " 
style=" background-color:#270000de;
"
>
   <div class="flex">
 

      <nav class="navbar" >
        
         <a style="color:white;"  href="home.php">   <i class="fa fa-home" aria-hidden="true"></i>Home</a>
         <a style="color:white;"  href="about.php"><i class="fa fa-users" aria-hidden="true"></i>About</a>
         <a  style="color:white;"  href="shop.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i>Shop</a>
         <a  style="color:white;"  href="contact.php"><i class="fa fa-phone" aria-hidden="true"></i>Contact</a>
         <a  style="color:white;" href="orders.php"><i class="fa fa-car" aria-hidden="true"></i>Orders</a>
         <a  style="color:white;"  href="download.php"><i class="fa fa-download" aria-hidden="true"></i>Free Download</a>



         <!-- <a style="color:black;" href="home.php">Home</a>
         <a style="color:black;" href="about.php">About</a>
         <a style="color:black;" href="shop.php">Shop</a>
         <a style="color:black;" href="contact.php">Contact</a>
         <a style="color:black;" href="orders.php">Orders</a> -->
      </nav>

      <div class="icons" >
         <div id="menu-btn" class="fas fa-bars" style="color:white;" ></div>
         <a href="search_page.php" class="fas fa-search" style="color:white;" ></a>
         <div id="user-btn" class="fas fa-user" style=" color:white;"></div>
         
         
         <?php
            $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            $cart_rows_number = mysqli_num_rows($select_cart_number); 
         ?>
         <a href="cart.php" class="fas fa-shopping-cart" style="color:white;">  <span style="color:white;" >(<?php echo $cart_rows_number; ?>)</span> </a>
      </div>

      <div class="user-box" style="background-color:rgb(240, 225, 225); width:30%; z-index:100;">
         <p style="color:black;" >username : <span  style="color:black;"><?php echo $_SESSION['user_name']; ?></span></p>
         <p style="color:black;">email : <span style="color:black;"><?php echo $_SESSION['user_email']; ?></span></p>
         <a href="logout.php" class="delete-btn" style="background-color:#6d1c1c;">logout</a>
      </div>
   </div>
</div>

</header>
</body>
</html>


