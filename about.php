<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">


   <style>
       
   .about .image #aboutEpadhai{
   width:300px;
   margin-left:300px;
}








/* ul{
    list-style-type: none;
} */

.sections {
    padding: 5rem 0;
}

p{
    margin-bottom: 30px;

    color:#38201e;
}
.section-center {
    width: 90vw;
    margin: 0 auto;
    max-width: 1170px;
    /* border:1px solid red; */
    height: 37vw;
}

.title {
    text-align: center;
    margin-bottom:30px;
    margin-top:-10px;
}

.title h2{
    font-size:3rem;
    font-weight: 500;
}

.title p{
    width:80%;
    margin:0 auto;
    
}

.about-img img{
    margin-bottom: 1.5rem;
    /* margin-left:200px; */
    /* border:1px solid red; */
    height: 50rem;
    width:35rem;
    object-fit: cover;
    border-radius: 8px;
}

@media screen and (min-width: 992px) {
    .about-img {
        margin-bottom: 0;
      }

      .center{
       
            display: grid;
            grid-template-columns: 1fr 1fr;
            column-gap: 2rem;
          
      }
}

/* .center{
    display: flex;
} */

.about{
    background:#fae3e1 ;
    border-radius: 8px;
    display:grid;
    grid-template-rows:auto 1fr;
    height:35vw;
    /* border:1px solid red; */
    /* margin-right:200px; */
}

.btn-container{
    border-radius: 8px;
    display: grid;
    grid-template-columns: repeat(3,1fr);
    /* 1fr 1fr 1fr */
}

.btn:nth-child(1){
    border-top-left-radius: 8px;
}

.btn:nth-child(3){
    border-top-right-radius: 8px;
}

.btn{
    padding: 15px 0;
    border:none;
    margin: 0 2px;
    background: #d78a83 ;
    letter-spacing: 0.3rem;
    /* font-family: roboto; */
    font-size: 20px;
    transition: 0.5s linear;
    display: block;
    cursor: pointer;
}
  
.btn:hover:not(.active) {
    background:#e26c61 ;
    color:white;
}

.btn.active{
    background:#6b2b2b;
}

.about-content{
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
    padding: 2rem 1.5rem;
}

/* hide content */
.content{
    display: none;
}

.content.active{
    display: block;
}

.content h4{
    padding:20px 0;
    margin-top: -25px;
    font-family: roboto;
    font-size: 22px;
}





   </style>
</head>
   
<body style="background-color:#fbf4f4;">
   <!-- <body> -->
<?php include 'header.php'; ?>
<!-- 
<div class="heading">
   <h3>about us</h3>
   <p> <a href="home.php">Home</a> / About </p>
</div> -->

<!-- <section class="about">

   <div class="flex">
   
     

      <div class="image">

         <img src="images/squareePadhai.png" alt="" id="aboutEpadhai">
         <img style="float:left;  margin-left:-150px; margin-top:-300px;" src="images/bookwrite.gif" alt="" id="aboutEpadhai">

      </div>

      <div class="content">
         <h3>ePadhai - Online Book Store</h3>
         <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores rerum quia libero iusto sint dicta placeat modi. Assumenda, reiciendis. Et, ab laborum sit quis perferendis dignissimos fuga ex nesciunt, voluptates alias quasi culpa quia eos placeat praesentium explicabo quae dolores ipsam repellendus cupiditate excepturi iste laudantium repellat porro. Suscipit amet eos veniam! Aspernatur quidem ipsam, excepturi reiciendis unde earum doloremque</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section> -->




<section class="sections">
        <!-- <div class="title">
            <h2>About</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum,
                aperiam!</p>
        </div> -->

        <div class="section-center center" >
           <section class=" about-img">
         <img src="images/squareePadhai.png" alt="" id="aboutEpadhai">
                <!-- <img src="./bg.jpg" alt="background"> -->
           </section>

           <article class="about">
            <!--button -->
            <div class="btn-container">
                <button class="btn active" data-id="history">History</button>
                <button class="btn" data-id="vision">Vision</button>
                <button class="btn" data-id="goals">Goals</button>
            </div>

            <div class="about-content">
                <!--single item-->
                <div class="content active" id="history">
                    <!-- <h4>History</h4> -->
                    <p style="font-size:20px;">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, sint assumenda. Fugit consequuntur dolorum laudantium quas? Cum incidunt tenetur, fuga accusantium rerum sed dignissimos ipsam quae vero, reprehenderit vel praesentium iure iste dolorum assumenda magnam, nulla explicabo! Assumenda, repellendus quis?<br><br>
                &nbsp &nbsp Commodi tempore iusto culpa, a dolorem in adipisci nihil dolore! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id cupiditate eos blanditiis provident corporis quia praesentium libero error, asperiores reprehenderit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi odit voluptate quia asperiores quasi aliquam repellendus reprehenderit soluta facere necessitatibus! 
                    </p>
                </div>
                <!-- end of single item -->
                 

                 <div class="content" id="vision" >
                    <!-- <h4>Vision</h4> -->
                    <p style="font-size:20px;">
                        Man bun PBR&B keytar copper mug prism, hell of helvetica. Synth
                        crucifix offal deep v hella biodiesel. Church-key listicle
                        polaroid put a bird on it chillwave palo santo enamel pin,
                        tattooed meggings franzen la croix cray. Retro yr aesthetic four
                        loko tbh helvetica air plant, neutra palo santo tofu mumblecore.
                        Hoodie bushwick pour-over jean shorts chartreuse shabby chic.
                        Roof party hammock master cleanse pop-up truffaut, bicycle
                        rights skateboard affogato readymade sustainable deep v
                        live-edge schlitz narwhal.
        
                        <!-- <ul>
                            <li>list item</li>
                            <li>list item</li>
                            <li>list item</li>
                        </ul> -->
                    </p>
           
                 </div>

                 <div class="content" id="goals">
                    <!-- <h4>Goals</h4> -->
                    <p style="font-size:20px;">
                      Chambray authentic truffaut, kickstarter brunch taxidermy vape
                      heirloom four dollar toast raclette shoreditch church-key.
                      Poutine etsy tote bag, cred fingerstache leggings cornhole
                      everyday carry blog gastropub. Brunch biodiesel sartorial mlkshk
                      swag, mixtape hashtag marfa readymade direct trade man braid
                      cold-pressed roof party. Small batch adaptogen coloring book
                      heirloom. Letterpress food truck hammock literally hell of wolf
                      beard adaptogen everyday carry. Dreamcatcher pitchfork yuccie,
                      banh mi salvia venmo photo booth quinoa chicharrones.
                    </p>
                  </div>
           </article>

        </div>
    </section>

<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/counter.js"></script>

<script src="js/script.js"></script>

</body>
</html>