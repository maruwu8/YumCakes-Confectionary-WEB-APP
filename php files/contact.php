<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $msg = $_POST['msg'];
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);
   $review =  $_POST['review'];
    $review = filter_var($review, FILTER_SANITIZE_STRING);

   $select_message = $conn->prepare("SELECT * FROM `message` WHERE name = ? AND email = ? AND number = ? AND message = ? AND review = ?");
   $select_message->execute([$name, $email, $number, $msg,$review]);

   if($select_message->rowCount() > 0){
      $message[] = 'already sent!';
   }else{

      $insert_message = $conn->prepare("INSERT INTO `message`(user_id, name, email, number, message, review) VALUES(?,?,?,?,?,?)");
      $insert_message->execute([$user_id, $name, $email, $number, $msg,$review]);

      $message[] = 'sent successfully!';

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

   <script src="https://kit.fontawesome.com/1a2cce4b7e.js" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<?php include 'header.php'; ?>
    
<style>
     body {background-image:url(images/wallpapercontact.jpg)!important;}
}
</style>

    <section class="contact">


<div class="box-container">

      <div class="box">
<section class="contact1">

   <h1 class="title">get in touch</h1>
   <p>   For any questions about our products or special orders please don't hesitate to contact us! We'll get back to you about your order as soon as possible. Additionally, in order to help us, please take a moment to leave your feedback. Thank you. Your opinion matters to us!</p>

   <form action="" method="POST">
      <input type="text" name="name" value="<?= $fetch_profile['name']; ?>" placeholder="enter your name" required class="box">
      <input type="email" name="email" value="<?= $fetch_profile['email']; ?>" placeholder="enter your email" required class="box">
      <input type="text" name="number"  class="box" required placeholder="enter your phone number">
      <textarea name="msg" class="box" required placeholder="enter your message" cols="20" rows="10"></textarea>
      <textarea name="review" class="box" required placeholder="enter your review" cols="20" rows="10"></textarea>
      <input type="submit" value="send" class="btn" name="send">
   </form>

</section>

    </div>
    
    <div class="box">
    <section class="information">
    <h1 class="title">visit us!</h1>
        <dl>
          <dt>Physical Adress:</dt>
          <dd>Calea Victoriei 56, Bucharest Romania 010083</dd>
          <dt>Working hours:</dt>
          <dd>Monday - Thursday: 9:00 - 22:00</dd>
          <dd>Friday: 9:00 - 23:00</dd>
          <dd>Saturday: 8:00 - 00:00</dd>
          <dd>Sunday: Closed</dd>
        </dl>
    <img id="imgmap" onmouseover="setNewImage()" onmouseout="setOldImage()"  src="images/map.png" alt="" >
    
    </section>
    
    </div>
    
</div>


    </section>

<script src="js/script.js"></script>
<?php include 'footer.php'; ?>


</body>
</html>