<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_writer = $_POST['product_writer'];
   $product_text = $_POST['product_text'];
   $product_image = $_POST['product_image'];
   $product_folder = $_POST['product_folder'];
   // $product_quantity = $_POST['product_quantity'];

   // $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   // if(mysqli_num_rows($check_cart_numbers) > 0){
   //    $message[] = 'Already added to cart!';
   // }else{
   //    mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
   //    $message[] = 'Product added to cart!';
   // }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>downloads</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>


    /* .texts {
      overflow-x: hidden;
      overflow-y: scroll;
    } */
 


.products{
   /* background-color:#2d694e; */
   background-color:#fae3e1 ;

}
.products .box-container{
   /* border:3px solid red; */
   max-width: 1200px;
   gap:6.5rem;
}
.products .box-container .box{
   border:none;
   /* background-color:#fed4d4; */
   border-radius:30px;
   /* border:1px solid red; */
   background-image: linear-gradient(#ec9790, #fac9c4,#f5d2cf );
   /* padding: 80px; */
}
.products .box-container .box .image{
   opacity:1;
}
.products .box-container .box .price{
   background-color:#753939;
   border: 2px dotted white;
}

.products .box-container .box .qty{
   border:none;
   color:#ec9790;
}

.products .option-btn{
   background-color:  rgb(51, 3, 3);
}

.products .option-btn:hover{
   color:  rgb(51, 3, 3);
   background-color:#e09898;

   
}

      </style>
</head>
<body>
   
<?php include 'header.php'; ?>

<!-- <div class="heading">
   <h3>our shop</h3>
   <p> <a href="home.php">Home</a> / Shop </p>
</div> -->

<!-- show books  -->

<section class="show-downloads">
<div class="download-container"
style="gap:4.5rem;">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `download`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?> 
   <div class="alignPurpose">
         <div id="download-img">
         <img  id="downloaded-img" src="uploaded_img_download/<?php echo $fetch_products['image']; ?>" alt="">
         
         </div>
         <div class="text-download">         
            <div class="names"><?php echo $fetch_products['name']; ?></div>
            <br><div class="writers">BY : <?php echo $fetch_products['writer']; ?></div><br><br> 
             <div class="texts"><?php echo $fetch_products['text']; ?></div>
         </div>
            </div>

         <a class="fas fa-download" class="option-btn" style="background-color:green; font-size:20px; width:18vw; height:3vw; border-radius:10px;padding:10px; text-align: center; " href="uploaded_img_download/<?php echo $fetch_products['folder']?>">&nbsp            Download</a>
          <br>

  
          <?php
         }
      }else{
         echo '<p class="empty">No books added yet!</p>';
      }
      ?>
</div>

</section>






<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>