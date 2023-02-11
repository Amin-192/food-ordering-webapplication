<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="with=device-width, initial
scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;500;700;800&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/fe24415fb7.js" crossorigin="anonymous"></script>
</head>    
<body>    
    
    


  <section class="header">
    <?php
  if(isset($_SESSION['name'])){
  echo '<nav>
  <a href="index.php"><img src="strathfoods.png"></a>
  <div class="nlinks">
    <ul>
  <li><a href="index.php"> HOME </a></li>
  <li><a href ="cart.php">MENU</a></li>
  
  <li><a href="logout.php"> LOG OUT </a></li>
 
  
  </ul>
  </div>
  </nav>';
  
}
else{
  echo '<nav>
  <a href="index.php"><img src="strathfoods.png"></a>
  <div class="nlinks">
    <ul>
  <li><a href="index.php"> HOME </a></li>
  <li><a href ="cart.php">MENU</a></li>
  <li><a href="login.php"> LOG IN </a></li>
  
  
  </ul>
  </div>
  </nav>';
}
    ?>
 
 <div id="title">
    
  <?php
  
if(isset($_SESSION['name'])){
  
  echo '<p style="text-align:center;font-size:30px;" > WELCOME </p>';
  echo "<h1 class='yourClass'><span class='spanclass'>" .$_SESSION['name']. "</span></h1>";
   
  
  
}

  ?>
 
    <h1> WELCOME TO STRATHFOODS</h1>
    <p> Enjoy your meals without worrying about attendance</p><br>
    
   <?php 
  if(isset($_SESSION['name']))  {
echo '<a href="cart.php" id="orderlink"> click here to order</a>';
  }
  else{
    echo '<a href="login.php" id="orderlink"> click here to LOG IN</a>';
  }
?>
</div>
 
 </section>

    </body>
</html>