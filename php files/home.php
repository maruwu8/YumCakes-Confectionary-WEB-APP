<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['add_to_wishlist'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);

   $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
   $check_wishlist_numbers->execute([$p_name, $user_id]);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_wishlist_numbers->rowCount() > 0){
      $message[] = 'already added to wishlist!';
   }elseif($check_cart_numbers->rowCount() > 0){
      $message[] = 'already added to cart!';
   }else{
      $insert_wishlist = $conn->prepare("INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES(?,?,?,?,?)");
      $insert_wishlist->execute([$user_id, $pid, $p_name, $p_price, $p_image]);
      $message[] = 'added to wishlist!';
   }

}

if(isset($_POST['add_to_cart'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);
   $p_qty = $_POST['p_qty'];
   $p_qty = filter_var($p_qty, FILTER_SANITIZE_STRING);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_cart_numbers->rowCount() > 0){
      $message[] = 'already added to cart!';
   }else{

      $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
      $check_wishlist_numbers->execute([$p_name, $user_id]);

      if($check_wishlist_numbers->rowCount() > 0){
         $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE name = ? AND user_id = ?");
         $delete_wishlist->execute([$p_name, $user_id]);
      }

      $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
      $insert_cart->execute([$user_id, $pid, $p_name, $p_price, $p_qty, $p_image]);
      $message[] = 'added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home page</title>
   
   <link rel="stylesheet" href="css/style.css">
   <script src="https://kit.fontawesome.com/1a2cce4b7e.js" crossorigin="anonymous"></script>
   

<style>
     body {background-image:url(images/Screenshot%20choco.png)!important;}
}
</style>
 
</head>
 <body>
   
<?php include 'header.php'; ?>

<script src="js/script.js"></script>

<section class="home-bg">
 
 


  

   <section class="home">

      <div class="content">
         <span>A sweet escape from the ordinary.</span>
         <h3>Life is short, eat dessert first.</h3>
         <p>YumCakes Confectionery is a fairytale land, in a world that carries with it the best aromas of cakes and the tastiest sweets. YumCakes specialises in exquisitely hand-crafted, premium  desserts that will make our customers enjoy  their sweetest memories. 

</p>
         <a href="about.php" class="btn">about us</a>
      </div>

   </section>

</section>




<section class="home-category">
   

   <h1 class="title">shop by category</h1>

   <div class="box-container">

      <div class="box">
         <img id="img1" src="images/cake10.jpg" alt="" >
         <h3>Cakes</h3>
         <p>From Chocolate Cakes, to Fruity Cakes, to cheesecakes  and so many more, there is a cake for any celebration and occassion.   Our cakes are handmade daily from the highest quality ingredients sourced fresh from the best producers.</p>
         <a href="category.php?category=cake" class="btn">View more</a>
      </div>

      <div class="box">
        <img id="img2"   src="images/crepecake2.jpg" alt="" >
         <h3>Crepe Cakes</h3>
         <p>The perfect crepe cake combines twenty lacy, paper-thin crepes with an ethereal pastry cream in between each layer. Each crepe is made by hand, and every cake is carefully crafted and assembled by our pastry chefs.
</p>
         <a href="category.php?category=crepe" class="btn">View more</a>
      </div>

      <div class="box">
         <img id="img3"   src="images/categoryPic3.jpg" alt="" >
         <h3>Macarons</h3>
         <p>A macaron gift box is a fantastic way to show a friend or loved one how much you appreciate them. A luxurious moment of pure indulgence, our handmade macarons make the perfect birthday, anniversary, or “just cause” gift.</p>
         <a href="category.php?category=macaron" class="btn">View more</a>
      </div>

      <div class="box">
        <img id="img4"   src="images/milkshake2.jpg" alt="" >
         <h3>Milkshakes</h3>
         <p>Award winning flavours, including many vegan options. Have your gelato in a cup or cone.  It's a fresh product prepared daily, with high quality ingredients, in total compliance with food hygiene and safety.</p>
         <a href="category.php?category=milkshake" class="btn">View more</a>
      </div>
      
       <div class="box">
        <img id="img5"   src="images/pistachio.jpg" alt="" >
         <h3>Gelato</h3>
         <p>Award winning flavours, including many vegan options. Have your gelato in a cup or cone.  It's a fresh product prepared daily, with high quality ingredients, in total compliance with food hygiene and safety.</p>
         <a href="category.php?category=gelato" class="btn">View more</a>
      </div>
      
       <div class="box">
        <img id="img6"   src="images/redvelvet.jpg" alt="" >
         <h3>Cupcakes</h3>
         <p>Packed with quality ingredients designed to satisfy you sweet tooth enthusiasts, our cupcakes are 50% less in sugar. Delicious Classic cupcakes, mini cupcakes in standard size or bite-size delivered straight to you.</p>
         <a href="category.php?category=cupcake" class="btn">View more</a>
      </div>
      
       <div class="box">
         <img id="img7"  src="images/tart8.jpg" alt="" >
         <h3>Tarts</h3>
         <p>Fresh, colorful, and bursting with juicy fruit, rich pastry cream, a deliciously sweet pastry crust, and an easy fruit tart glaze, our range of delicious homemade tarts, each packed in a nice individual box, will fit to your tastes.</p>
         <a href="category.php?category=tart" class="btn">View more</a>
      </div>
      
       <div class="box">
         <img id="img8"   src="images/waffles.jpg" alt="" >
         <h3>Waffles</h3>
         <p>There’s nothing better than waking up to waffles. Crisp on the outside, fluffy on the inside, our waffles are delicious drizzled with melted butter and syrup. The perfect start to any weekend morning!</p>
         <a href="category.php?category=waffle" class="btn">View more</a>
      </div>

   </div>

</section>

<section class="products">

   <h1 class="title" id="latestproducts">latest products</h1>

   <div class="box-container">

   <?php
      $select_products = $conn->prepare("SELECT * FROM `products` ORDER BY id DESC LIMIT 10");
                      
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <form action="" class="box" method="POST">
      <div class="price">€<span><?= $fetch_products['price']; ?></span>/-</div>
      <a href="view_page.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_products['image']; ?>" id="home_products" alt="">
      <div class="name"><?= $fetch_products['name']; ?></div>
      <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
      <input type="hidden" name="p_name" value="<?= $fetch_products['name']; ?>">
      <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
      <input type="hidden" name="p_image" value="<?= $fetch_products['image']; ?>">
      <input type="number" min="1" value="1" name="p_qty" class="qty">
      <input type="submit" value="add to wishlist" class="option-btn" name="add_to_wishlist">
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>

   </div>

</section>

<script src="js/script.js"></script>

<script>
    
    
    
    
    
    
    
    
    
    
    
   
 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
function on() {
    document.getElementById("img1").src = "images/cake4.jpg"; 
}
        
function off() {
    document.getElementById("img1").src = "images/cake10.jpg"; 
}
    
    function on2() {
         document.getElementById("img2").src = "images/crepecake6.jpg";
    }
    
    function off2() {
         document.getElementById("img2").src = "images/crepecake2.jpg";
    }
    
    function on3() {
         document.getElementById("img3").src = "images/coffeemacarons.jpg";
    }
    
    function off3() {
         document.getElementById("img3").src = "images/categoryPic3.jpg";
    }
    
    function on4() {
        document.getElementById("img4").src = "images/milkshake1.jpg";
    }
    
    function off4() {
         document.getElementById("img4").src = "images/milkshake2.jpg";
    }  
    
    function on5() {
          document.getElementById("img5").src = "images/pic1.jpg";
    }
    
    function off5() {
         document.getElementById("img5").src = "images/pistachio.jpg";
    }
    
    function on6() {
        document.getElementById("img6").src = "images/chocolate.jpg";
    }
    
    function off6() {
          document.getElementById("img6").src = "images/redvelvet.jpg";
    }
    
    function on7() {
         document.getElementById("img7").src = "images/tart3.jpg";
    }
    
    function off7() {
         document.getElementById("img7").src = "images/tart8.jpg";
    }
    
    function on8() {
          document.getElementById("img8").src = "images/redheart.jpg";   
    }
    
    function off8() {
         document.getElementById("img8").src = "images/waffles.jpg";   
    }
    
       
    document.getElementById("img1").addEventListener('mouseover', on);
    document.getElementById("img1").addEventListener('mouseout', off);
    document.getElementById("img2").addEventListener('mouseover', on2);
    document.getElementById("img2").addEventListener('mouseout', off2);
    document.getElementById("img3").addEventListener('mouseover', on3);
    document.getElementById("img3").addEventListener('mouseout', off3);
    document.getElementById("img4").addEventListener('mouseover', on4);
    document.getElementById("img4").addEventListener('mouseout', off4);
    document.getElementById("img5").addEventListener('mouseover', on5);
    document.getElementById("img5").addEventListener('mouseout', off5);
    document.getElementById("img6").addEventListener('mouseover', on6);
    document.getElementById("img6").addEventListener('mouseout', off6);
    document.getElementById("img7").addEventListener('mouseover', on7);
    document.getElementById("img7").addEventListener('mouseout', off7);
    document.getElementById("img8").addEventListener('mouseover', on8);
    document.getElementById("img8").addEventListener('mouseout', off8);
    
    </script>
    

<?php include 'footer.php'; ?>


</body>
</html>