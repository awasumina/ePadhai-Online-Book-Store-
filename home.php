<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">


   <style>
     body{
      /* background-color:#fae3e1 ; */
   /* background-image: linear-gradient(black,black, #fac9c4,#f5d2cf ); */

     } 
/* slide animation starts */

.slider-frame{
    overflow: hidden;
    height: 29vw;
    width: 100vw;
    /* background-color:black; */

}




@keyframes slide_animation{

    0% {left:0px;}
    10% {left:0px;}
    20% {left:100vw;}
    30% {left:100vw;}
    40% {left: 200vw;}
    50% {left:200vw;}
    60% {left:300vw;}
    70% {left: 300vw;}
    80% {left: 400vw;}
    90% {left: 400vw;}
    100% {left:300vw;}
}


@-webkit-keyframes slide_animation{
    0% {left:0px;}
    10% {left:0px;}
    20% {left:100vw;}
    30% {left:100vw;}
    40% {left: 200vw;}
    50% {left:200vw;}
    60% {left:300vw;}
    70% {left: 300vw;}
    80% {left: 400vw;}
    90% {left: 400vw;}
    100% {left:300vw;}
}

.slide-images{
    /* opacity:0.9; */
    height: 29vw;
    margin: 0 0 0 -400vw;
    position: relative;
    -webkit-animation-name: slide_animation;
    animation-name: slide_animation;
    -webkit-animation-duration: 8s;
    animation-duration: 8s;
    -webkit-animation-iteration-count: infinite;
    animation-iteration-count: infinite;
    -webkit-animation-direction: alternate;
    animation-direction: alternate;
    -webkit-animation-play-state: running;
    animation-play-state: running;
}

.img-container{
    /* border: 3px solid blue; */
    height: 29vw;
    width: 100vw;
    position: relative;
    float: left;
}

.middleImage{
   width:1600px;
   height:450px;
   opacity: 0.8;
}
/* slide animation ends here */


#notsure{
   font-size:30px ;
   /* border:1px solid red; */
   width:60%;
   color:brown;
   /* background-color:#fae3e1 ; */
   background-color: black;
   padding:10px 0;
   margin-bottom:-40px ;
   font-family: 'Alegreya', serif;
   font-weight:bold;
   z-index:100;
   width: 1550px;
}

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
   /* border:1px solid red; */
   /* background-image: linear-gradient(#874646, #fac9c4,#f5d2cf ); */
   background-color:#fed4d4;
   border-radius:30px;
   /* box-shadow: 5px 3px 15px 3px #fed4d4, -2px  7px 2px #81c6bf; */





   /* background-image: linear-gradient(#ec9790, #fac9c4,#f5d2cf ); */
   /* padding: 80px; */}
.products .box-container .box .image{
   opacity:1;
}
.products .box-container .box .price{
   background-color: #800000;
   border: 2px dotted white;
   color:white;
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


.about .image #aboutEpadhai{
   width:300px;
   margin-left:300px;
}

.about .flex .content{
   background-color: white;
   border-radius:20px;
}

.home-contact{
   background-color:#7f4242;
}



   </style>
</head>
<body >
   
<?php include 'header.php'; ?>

<!-- <section class="home">

   <div class="content">
      <h3>What book are you looking for?</h3>
      <p>Not Sure What To Read? Explore Our Bookstore And Get It Delivered At Your Doorstep.</p>
      <a href="about.php" class="white-btn">Discover More</a>
   </div>

</section> -->

<!-- <center>

<p id="notsure">Not Sure What To Read? <br> Explore <b>ePadhai</b> And Get It Delivered At Your Doorstep.</p>
</center> -->

<section
class="home" style="background-color:black;  color:black">
   
<div class="slider-frame">
    <div class="slide-images">

        <div class="img-container">
                <img src="images/headerphoto.png" class="middleImage" alt="MiddlePoster">
            </div>
            <div class="img-container">
                <img src="images/h11.jpg" class="middleImage" alt="MiddlePoster">
            </div>
            <div class="img-container">
                <img src="images/h12.jpg" class="middleImage" alt="MiddlePoster">
            </div>
            <div class="img-container">
                <img src="images/h8.jpg" class="middleImage" alt="MiddlePoster">
            </div>
    </div>
</div>

</section>



<section class="products">

   <h1 class="title">latest products</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form name="f1" action="" method="post" class="box" >
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">Rs.<?php echo $fetch_products['price']; ?>/-</div>
      <input type="number" min="1" max="12" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="submit" value="add to cart" name="add_to_cart" class="btn" style="background-color:#a94040;">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="shop.php" class="option-btn" style="background-color: #642828;">load more</a>
   </div>

</section>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/squareePadhai.png" alt="" id="aboutEpadhai">
      </div>

      <div class="content">
         <h3>about us</h3>
         <p>ePadhai is an online bookstore  which has varieties of book for all our dear users. We would be more than happy to listen from you.</p>
         <a href="about.php" class="btn">read more</a>
      </div>

   </div>

</section>


<!-- counter section  -->
<section class="counter">

         <!-- single number -->
        <article>
            <span class="number" data-id="50000">0</span>
            <p id="coutnerText">Books added</p>
        </article>
        <!-- end of single number -->

        <article>
            <span class="number" data-id="250">0</span>
            <p id="coutnerText">Books sold</p>
        </article>

        <article>
            <span class="number" data-id="1000">0</span>
            <p id="coutnerText">Happy Clients</p>
        </article>


    <!-- <script src="./number.js"></script> -->
</section>

<section class="home-contact">

   <div class="content">
      <h3>have any questions?</h3>
      <p>You can contact us through messages if you have any questions regarding the book delivery time or anything related to the books. We reply as soon as possible.😄</p>
      <a href="contact.php" class="white-btn">contact us</a>
   </div>

</section>





<?php include 'footer.php'; ?>

<script src="js/counter.js"></script>
<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>