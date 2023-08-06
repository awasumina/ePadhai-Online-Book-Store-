<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $lname = mysqli_real_escape_string($conn, $_POST['lname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'Message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `message`(user_id, name,lname, email, number, message) VALUES('$user_id', '$name','$lname', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'Message sent successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<style>
   
.contactUS{
    /* background-color:white; */
    /* background-image: linear-gradient(#ec9790, #fac9c4,#f5d2cf ); */
    background-image: linear-gradient(#fac9c4,#f1d7d5,#fac9c4);
    /* margin-top: -8vw; */
    height: 48vw;
    border-top: 0.1px solid white;

}


#text16{
    font-size: 1.3vw;
    width: 36vw;
    letter-spacing: 0.01cm;

}

#text17{
    font-size: 2.7vw;
    padding: 1.8vw 0;
    width: 36vw;
    word-spacing: 0.4cm;
    
}
.readytoTalk{
    width:38vw ;
    /* border: 1px solid purple; */
    margin: 0 2vw;
}
.div16{
    /* padding-top: 2vw; */
    display: flex;
    justify-content: space-between;
    width: 80vw;
    /* margin: 8vw; */
    /* background-color: #e39535; */

    margin-top: 8vw;
    margin-left: 5vw;
    margin-bottom: 4.7vw;
    /* border: 2px solid rgb(12, 64, 177); */


    /* border: 1px solid red; */
}

.textbox{
    margin-top: 5vw;
    
}
.textbox input, textarea{

    width: 35vw;

    padding: 1.3vw;
    font-size: 1.1vw;
    border: none;
    margin: 0.5vh 0;
    border-radius: 10px;
    border-bottom: 2px solid rgb(137, 122, 9) !important;
    border: 2px solid rgb(247, 247, 247);
}

/* .div17{
    margin-left: 5vw;
    border: 5px solid rgb(173, 9, 157);

} */

textarea{
    height: 8vw;
}

.locationText{
    width: 17vw !important;
    /* border: 2px solid rgb(12, 64, 177); */

}

#readMore{
    width: 20vw;
    height: 2.4vw;
    margin: 0 8vw;
    /* margin-top: -1vw; */
    background-color: white;
    border-radius: 2vw;
    border: 1px solid white;
    font-size: 1.1vw;
    color: #c46e06;
    padding: 0;
    
}

form{
    /* border: 1px solid red; */
    width: 45vw;
}
#readMore:hover{
    background-color:#3c0e0e;
    color: white;
    border-color: #c46e06;
    font-size: 20px;
    font-weight: bold;
}

iframe{
    width: 90vw;
    margin:0 5vw;


}
.map{
   
    /* width:65vw; */
    padding:2vw;
    /* border: 3px solid rgb(41, 14, 161); */
    margin-left: -2.2vw;
    /* height: 50vw; */
    margin-top: -2vw;
    background-image: linear-gradient(#fac9c4,#fac9c4,#f1d7d5);

    /* background-color: #3c0e0e; */
}






.contact iframe{
    width:100%;

    
}

/* h4,p{ */
    /* width: 15vw; */
    /* border: 3px solid rgb(134, 212, 0); */


/* } */
/* .contact-div .fa{
    font-size:28px;
    margin-left:-20px;
    color:#e03e32;
    padding:30px;


} */



.contact-div{
    width: 10vw ;
    /* border: 3px solid rgb(212, 0, 127); */

    
}


.contact-us{
    margin:10px 140px;
    
}

.contact-div{

    width:10vw;
    margin-left:-50px;

}

.mydiv{
    margin-left:50px;
    margin-top:-60px;
    width: 17vw;
}

.mydiv h4{
    font-size: 18px;
    color: rgb(54, 68, 95);
    width: 15vw;

}

.mainInfo{
    display: flex;
     justify-content: space-around;
    align-items: center; 
    width: 25vw;
    /* padding-top: 6vw; */
    float: right;
    /* border: 3px solid yellow; */

}
    
</style>
<body>
   
<?php include 'header.php'; ?>

<!-- <div class="heading">
   <h3>contact us</h3>
   <p> <a href="home.php">Home</a> / Contact </p>
</div> -->

<div class="contactUS">
    <div class="div16">
        <div class="readytoTalk">
            <p id="text16">Ready to talk?</p>
            <h1 id="text17">Contact Us</h1>
            <p id="text16">Massa tempor nec feugiat nisl pretium fusce id velit. Accumsan tortor posuere ac ut. Aenean pharetra magna ac placerat vestibulum lectus. Praesent semper feugiat nibh sed pulvinar. Lorem sed risus ultricies tristique. <br><br>    
                Dictumst vestibulum rhoncus est pellentesque elit ullamcorper. Amet dictum sit amet justo donec enim diam vulputate. Ut morbi tincidunt augue interdum velit euismod in pellentesque. Volutpat lacus laoreet non curabitur.</p>
        </div>

        <section>
        <div class="textbox">
   <form action=""  method="post">

      <input type="text" name="name" required placeholder="enter your first name" >
      <input type="text" name="lname" required placeholder="enter your last name" >
      <input type="email" name="email" required placeholder="enter your email" >
      <input type="number" name="number" required placeholder="enter your number" >
      <textarea name="message"  placeholder="enter your message" id="" cols="30" rows="10"></textarea>
      <input type="submit" value="send message" name="send" id="readMore">
   </form>
</div>
</section>

        <!-- <div class="textbox">
            <form action="" name="contact" method="post">
           
                <input type="textbox" name="full_name" placeholder="Enter your name"> <br>

                <input type="email" name="mail_addr" placeholder="Enter a valid email address"><br>

                <textarea name="message" placeholder="Enter your message"></textarea><br>

                <input type="submit" name="submit" value="Submit" id="readMore">
                     </form>
        </div> -->
    </div>
    </div>
        <!-- <div class="readytoTalk"> -->
            <section class="map">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28277.6993422148!2d85.5067418839364!3d27.633422050628635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb0f33b1a23b53%3A0xe8ec0b92bdf38a54!2sBanepa!5e0!3m2!1sen!2snp!4v1655303595825!5m2!1sen!2snp" width="50" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
<!--                 
                <div class="mainInfo">

                    <div class="contact-div"> -->
                            
                        <!-- <i class="fa fa-home" class="locationIcon"></i>
                        <div class="mydiv">
                        <h4 class="locationText">Araniko Highway, XYZ Building </h4>
                        <p class="locationText">Banepa, Kavre</p>
                        </div> -->
        
                   
                        <!-- <i class="fa fa-phone" class="locationIcon" ></i>
                         <div class="mydiv">
                        <h4vclass="locationText">+977 9876543210<br>
                            +977 9870321654<br>
                            01-6659988
        
                        </h4>
                        <p class="locationText">Sunday to Friday ,10AM to 6PM</p>
                         </div> -->
                   
                        <!-- <i class="fa fa-envelope-o" class="locationIcon"></i>
                        <div class="mydiv">
                        <h4 class="locationText">someone@gmail.com </h4>
                        <p class="locationText">Email us your query</p>
                         </div> -->
                    <!-- </div>           
    </div>   -->
            </section>
            
<!-- </div> -->

<!-- <section class="contact">

   <form action="" method="post">
      <h3>say something!</h3>
      <input type="text" name="name" required placeholder="enter your name" class="box">
      <input type="email" name="email" required placeholder="enter your email" class="box">
      <input type="number" name="number" required placeholder="enter your number" class="box">
      <textarea name="message" class="box" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
      <input type="submit" value="send message" name="send" class="btn">
   </form>

</section> -->








<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>