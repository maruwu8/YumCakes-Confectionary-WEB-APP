<?php

@include 'config.php';

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

   <script src="https://kit.fontawesome.com/1a2cce4b7e.js" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<style>
     body {
         background-image:url(images/wallpaperabout.jpg)!important;
          
    }
    
</style>

<section class="about">

   <div class="row">

      <div class="box">
         <img id="image1"  src="images/why.png" alt="">
         <h3>why choose us?</h3>
         <p>Our focus is our commitment to quality. To us, that means using the best and freshest possible ingredients with perfect execution every time - no compromises.	
We work towards excellence and try to work towards the highest level of service to keep you happy so you can keep your customers happy.
We innovate the taste sensation. We have the knowledge, the people, the insight and the technology and we work to reduce sugar in our existing products and introduce innovative products without compromising on the quality and taste that everybody expects from YumCakes confectionery.</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

      <div class="box">
         <img id="image2" src="images/login-place.jpg" alt="">
         <h3>what we provide?</h3>
         <p>We always provide the highest quality desserts, made from fresh ingredients in our laboratory by our attentive bakers. From cakes, crepe cakes, cupcakes, macarons, gelato and even milkshakes, we offer an extremly wide variety that will make you enjoy every sweet moment of life. We bake our products from scratch using only the freshest and finest ingredients.The good taste is familiar and loved by many. One bite often leads to more. When the taste is well-balanced, perhaps even has a surprising twist, the sweet treat is something most consumers don’t want to live without.  </p>
         <a href="shop.php" class="btn">our shop</a>
      </div>

   </div>

</section>




<script>
    
    let image = document.getElementById('image1');
    let images = ['images/provide.jpg','images/bg2.jpg','images/why.png']
    setInterval(function() {
        let random = Math.floor(Math.random() * 3);
        image.src=images[random];
            }, 2000);
    
    let image2 = document.getElementById('image2');
    let imagess = ['images/login-place.jpg','images/poza3.jpg','images/place4.jpg']
    setInterval(function() {
        let random = Math.floor(Math.random() * 3);
        image2.src=imagess[random];
            }, 2000);

    
</script>


<section class="reviews">

   <h1 class="title">latest  clients reviews</h1>

   <div class="box-container">

   <?php
      $select_reviews = $conn->prepare("SELECT * FROM message,users WHERE message.name=users.name ORDER BY users.id DESC LIMIT 4");
                      
      $select_reviews->execute();
      if($select_reviews->rowCount() > 0){
         while($fetch_reviews = $select_reviews->fetch(PDO::FETCH_ASSOC)){ 
   ?>
     <div class="box">
      <img src="uploaded_img/<?= $fetch_reviews['image']; ?>" alt="">
      <div class="name"><h3><?= $fetch_reviews['name']; ?></h3></div>
      <div class="review"><p><?= $fetch_reviews['review']; ?></div>
       <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
      </div>
   <?php
      }
   }else{
      echo '<p class="empty">no reviews added yet!</p>';
   }
   ?>

   </div>

</section>


<?php include 'footer.php'; ?>

</body>
</html>