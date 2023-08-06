<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $lname = mysqli_real_escape_string($conn, $_POST['lname']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $address = mysqli_real_escape_string($conn, $_POST['street']);
   $village = mysqli_real_escape_string($conn, $_POST['village']);
   $district = mysqli_real_escape_string($conn, $_POST['district']);
   $country = mysqli_real_escape_string($conn, $_POST['country']);
   $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
   
   // .', '. $_POST['village'].', '. $_POST['district'].', '. $_POST['country'].' - '. $_POST['pin_code']);
   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         // $cart_products[] = $cart_item['name'];
         $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      }
   }
 

   $total_products = implode(', ',$cart_products);
   // $total_products = $cart_products;




   $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method'  AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

   if($cart_total == 0){
      $message[] = 'Your cart is empty';
   }else{
      if(mysqli_num_rows($order_query) > 0){
         $message[] = 'Order already placed!'; 
      }
      else{
         mysqli_query($conn, "INSERT INTO `orders`(user_id, name,lname, number, email, method, address, village, district, pincode, total_products, total_price, placed_on) VALUES('$user_id', '$name','$lname', '$number', '$email', '$method', '$address', '$village','$district','$pincode',         
          '$total_products', '$cart_total', '$placed_on')") or die('query failed');
         $message[] = 'Order placed successfully!';
         mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
          
         echo ("<script LANGUAGE='JavaScript'>
         window.alert('Succesfully added!!!');
         window.location.href='paymentSuccess.php';
         </script>");
      }
   }
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">


   <style>
      .checkout form{
         background-color:#fac9c4;
         /* background-image: linear-gradient(#ec9798, #fac9c4,#f5d2cf ); */
      }
   </style>
</head>

<body>
   
<?php include 'header.php'; ?>
<!-- 
<div class="heading">
   <h3>checkout</h3>
   <p> <a href="home.php">Home</a> / Checkout </p>
</div> -->


<section class="display-order">

<img src="images/money.gif" alt="" style="width:300px ; float:right;">


   <?php  
      $grand_total = 0;

      
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
   ?>
   <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo 'Rs.'.$fetch_cart['price'].'/-'.' x '. $fetch_cart['quantity']; ?>)</span> </p>
   <?php
      }
   }else{
      echo '<p class="empty">Your cart is empty</p>';
   }
   ?>
   <div class="grand-total"> Grand total : <span>Rs.<?php echo $grand_total; ?>/-</span> </div>

</section>

<section class="checkout">

   <form action="" method="post">
      <h3>place your order</h3>
      <div class="flex">
         <div class="inputBox">
            <span>First Name :</span>
            <input type="text" name="name" required placeholder="Enter your name">
         </div>

         <div class="inputBox">
            <span>Last Name :</span>
            <input type="text" name="lname" required placeholder="Enter your name">
         </div>

         <div class="inputBox">
            <span>Contact no. :</span>
            <input type="number" name="number" required placeholder="Enter your number">
         </div>


         <div class="inputBox" style="margin-top: 20px;">
                    <span>Payment Accepted :</span>
                    <img src="images/card_img.png" alt="">
                </div>



         <div class="inputBox">
            <span>Payment method :</span>
            <select name="method">
               <option value="Cash on delivery">Cash on delivery</option>
               <option value="Credit card">Credit card</option>
               <!-- <option value="Esewa">Esewa</option>
               <option value="Khalti">Khalti</option> -->
            </select>
         </div>




         <div class="inputBox">
            <span>Email :</span>
            <input type="email" name="email" required placeholder="Enter your email">
         </div>
<br>

         <div class="inputBox">
            <span>Street/ Tole:</span>
            <input type="text" name="street" required placeholder="e.g. Sars tole">
         </div>
         <div class="inputBox">
            <span>Village/ Municipality :</span>
            <input type="text" name="village" required placeholder="e.g. mahalaxmi">
         </div>
         <div class="inputBox">
            <span>District:</span>
            <input type="text" name="district" required placeholder="e.g. Bhaktapur">
         </div>
         <div class="inputBox">
            <span>Province :</span>
            <input type="text" name="province" required placeholder="e.g. Bagmati">
         </div>
         <div class="inputBox">
            <span>Country :</span>
            <input type="text" name="country" required placeholder="e.g. Nepal">
         </div>
         <div class="inputBox">
            <span>Pin code :</span>
            <input type="number" min="0" name="pincode" required placeholder="e.g. 123456">
         </div>
      </div>
      <input type="submit" value="order now" class="btn" name="order_btn">
   </form>

</section>









<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>