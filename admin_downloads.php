<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['add_product'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $writer = mysqli_real_escape_string($conn, $_POST['writer']);
   $text = $_POST['text'];
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img_download/'.$image;

   $filename = $_FILES["choosefile"]["name"];
   $tempfile = $_FILES["choosefile"]["tmp_name"];
   $folder = "uploaded_img_download/".$filename;

   $select_product_name = mysqli_query($conn, "SELECT name FROM `download` WHERE name = '$name'") or die('query nnnnn failed');

   if(mysqli_num_rows($select_product_name) > 0){
      $message[] = 'Book has already been added';
   }else{
      $add_product_query = mysqli_query($conn, "INSERT INTO `download`(name,writer, text, image,folder) VALUES('$name', '$writer','$text', '$image','$filename')") or die('query failed');


      if($add_product_query){
         if($image_size > 2000000) {
            $message[] = 'Image size is too large';
         }
         else if($filename == ""){
            $message[] = 'File is null';
         }
         else{
            move_uploaded_file($image_tmp_name, $image_folder);
            move_uploaded_file($tempfile,$folder);
            $message[] = 'Book added successfully!';

         }
      }else{
         $message[] = 'Book could not be added!';
      }
   }
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_image_query = mysqli_query($conn, "SELECT image FROM `download` WHERE id = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
   unlink('uploaded_img_download/'.$fetch_delete_image['image']);

   $delete_folder_query = mysqli_query($conn, "SELECT folder FROM `download` WHERE id = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($delete_folder_query);
   unlink('uploaded_img_download/'.$fetch_delete_image['folder']);

   mysqli_query($conn, "DELETE FROM `download` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_downloads.php');
}




if(isset($_POST['update_product'])){

   $update_p_id = $_POST['update_p_id'];
   $update_name = $_POST['update_name'];
   $update_writer= $_POST['update_writer'];
   $update_text = $_POST['update_text'];

   mysqli_query($conn, "UPDATE `download` SET name = '$update_name', writer = '$update_writer', text = '$update_text' WHERE id = '$update_p_id'") or die('query failed');

   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_folder = 'uploaded_img_download/'.$update_image;
   $update_old_image = $_POST['update_old_image'];


   // $update_image = $_FILES['update_folder']['name'];
   // $update_image_tmp_name = $_FILES['update_folder']['tmp_name'];
   // $update_image_size = $_FILES['update_folder']['size'];
   // $update_folder = 'uploaded_img_download/'.$update_image;
   // $update_old_image = $_POST['update_old_folder'];



   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'Image file size is too large';
      }else{
         mysqli_query($conn, "UPDATE `download` SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
         move_uploaded_file($update_image_tmp_name, $update_folder);
         unlink('uploaded_img_download/'.$update_old_image);
      }
   }

   header('location:admin_downloads.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">
   <style> 
    .texts {
      overflow-x: hidden;
      overflow-y: scroll;
    }
   </style>

</head>
<body style="background-color: #cfe4f6;">
   
<?php include 'admin_header.php'; ?>

<!-- book CRUD section starts  -->

<section class="add-products" >

   <h1 class="title" style="color:black">Add free new books to download</h1>

   <form action="" method="post" enctype="multipart/form-data" style="border:1px solid white;">
      <h3>add new books</h3>
      <input type="text" name="name" class="box" placeholder="enter book name" required>
      <input type="text" name="writer" class="box" placeholder="enter writer name" required>
      <input type="text"  name="text" class="box" placeholder="enter short description" required>
     <p style="font-size:15px; color:red;"> Upload image</p><input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required >
     <p style="font-size:15px; color:red;">  Upload PDF </p><input type="file" name="choosefile"  class="box" required>

      <input type="submit" value="add book" name="add_product" class="btn">
   </form>

</section>

<!-- book CRUD section ends -->

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
            <div class="writers">BY : <?php echo $fetch_products['writer']; ?></div>
             <div class="texts"><?php echo $fetch_products['text']; ?></div>
         </div>
   </div>
         <a class="fas fa-download" class="option-btn" style="background-color:green; color:white;font-size:20px; width:15.5vw; height:3vw; border-radius:10px;padding:10px; text-align: center; " href="uploaded_img_download/<?php echo $fetch_products['folder']?>">&nbsp            Download</a>
          <br>
         <a href="admin_downloads.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn">Update</a>
         <a href="admin_downloads.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('Do you want to delete this book?');">Delete</a>
         
   
      <?php
         }
      }else{
         echo '<p class="empty">No books added yet!</p>';
      }
      ?>
</div>

</section>

<section class="edit-product-form">

   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `download` WHERE id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
      <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
      <input type="hidden" name="update_old_folder" value="<?php echo $fetch_update['folder']; ?>">
      <img src="uploaded_img_download/<?php echo $fetch_update['image']; ?>" alt="">

      <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="enter book name">

      <input type="text" name="update_writer" value="<?php echo $fetch_update['writer']; ?>" class="box" required placeholder="enter writer name">

      <input type="text" name="update_text" value="<?php echo $fetch_update['text']; ?>" class="box" required placeholder="enter text">

      <p style="color:red; font-size:15px;">Upload Image</p><input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">

      <!-- <p style="color:red; font-size:15px;">Upload file to be downloaded</p><input type="file" class="box" name="update_folder" > -->

      <input type="submit" value="update" name="update_product" class="btn">
      <input type="reset" value="cancel" id="close-update" class="option-btn">
   </form>
   <?php
         }
      }
      }else{
         echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
   ?>

</section>







<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>








