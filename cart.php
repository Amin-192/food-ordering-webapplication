<?php
session_start();
$product_ids = array();
//session_destroy();
//check if add button works
if(filter_input(INPUT_POST,'add_to_cart')){
if(isset($_SESSION['shopping_cart'])){
$count=count($_SESSION['shopping_cart']);

$product_ids = array_column($_SESSION['shopping_cart'],'id');


if(!in_array(filter_input(INPUT_GET,'id'),$product_ids)){
  $_SESSION['shopping_cart'][$count] = array
  (
  'id' => filter_input(INPUT_GET,'id'),
  'name' => filter_input(INPUT_POST,'name'),
  'price' => filter_input(INPUT_POST,'price'),
  'quantity' => filter_input(INPUT_POST, 'quantity')
  );
}
else{
  for($i=0; $i<count($product_ids);$i++){
    if($product_ids[$i]== filter_input(INPUT_GET,'id')){
      $_SESSION['shopping_cart'][$i]['quantity']+=filter_input(INPUT_POST, 'quantity');
    }
  }
}
}
else{
  $_SESSION['shopping_cart'][0] = array
  (
  'id' => filter_input(INPUT_GET,'id'),
  'name' => filter_input(INPUT_POST,'name'),
  'price' => filter_input(INPUT_POST,'price'),
  'quantity' => filter_input(INPUT_POST, 'quantity')
  );
}
}
if(filter_input(INPUT_GET,'action') == 'delete'){
  foreach($_SESSION['shopping_cart'] as $key => $product){
    if($product['id']== filter_input(INPUT_GET,'id')){
      unset($_SESSION['shopping_cart'] [$key]);
    }
  }
  $_SESSION['shopping_cart']=array_values($_SESSION['shopping_cart']);
}
//print_r($_SESSION);

function pre_r($array){
  echo'<pre>';

  print_r($array);
  echo'<pre>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="cart.css">
  <title>CART</title>
</head>
<body>
  <div class="container">
  <header id="header" class="header">
  <?php
  if(isset($_SESSION['name'])){
  echo '<nav>
  <a href="index.php"><img src=""></a>
  <div class="nlinks">
    <ul>
  <li><a href="index.php"> HOME </a></li>
  
 
  <li><a href="logout.php"> LOG OUT </a></li>
 
  
  </ul>
  </div>
  </nav>';
  
}
else{
  echo '<nav>
  <a href="index.php"><img src=""></a>
  <div class="nlinks">
    <ul>
  <li><a href="index.php"> HOME </a></li>
  <li><a href="login.php"> LOG IN </a></li>
 
  
  </ul>
  </div>
  </nav>';
}

  
if(isset($_SESSION['name'])){
  
  echo '<p style="text-align:center;font-size:30px;" > WELCOME </p>';
  echo "<h1 class='yourClass'><span class='spanclass'>" .$_SESSION['name']. "</span></h1>";
   
  
  
}
    ?>
    </header>
<?php
require 'dbh.php';
$query= 'SELECT * FROM products ORDER by id ASC';
$result= mysqli_query($conn,$query);

if($result):
if(mysqli_num_rows($result)>0):
while($product = mysqli_fetch_assoc($result)):
  ?>
  <div class="col-sm-4 col-md-3">
    <form method="post" action="cart.php?action=add&id=<?php echo $product['id'] ;?>">
    <div class="products">
      <img src ="<?php echo $product['image'];?>" class="imgae-responsive" />
      <h4 class ="text-info"><?php echo $product['name'];?></h4>
      <h4>KSH <?php echo $product['price'] ;?></h4>
      <input type ="text" name ="quantity" class="form-control" value ="1"/>
      <input type ="hidden" name="name" value="<?php echo $product['name']; ?>"/>
      <input type ="hidden" name="price" value="<?php echo $product['price']; ?>"/>
      <input type = "submit" name ="add_to_cart" style="margin-top:5px;" class=" btn btn-info" value="Add to Cart" ?>
</div>
</form>
  </div>
  <?php
endwhile;
endif;
endif;
?>
<div style="clear: both"></div>
<br />
<div class="table-responsive">
<table class="table">
<tr><th colspan="5"><h3>Order Details</h3></th></tr>
<tr>
<th width="40%">Product Name</th>
<th width="10%">Quantity</th>
<th width="20%">Price</th>
<th width="15%">Total</th>
<th width="5%">Action</th>
</tr>
<?php
if(!empty($_SESSION['shopping_cart'])):
$total = 0;
foreach($_SESSION['shopping_cart'] as $key => $product):
?>
<tr>
<td><?php echo $product['name']; ?></td>
<td><?php echo $product['quantity']; ?></td>
<td>KSH <?php echo $product['price']; ?></td>
<td>KSH<?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>
<td>
<a href="cart.php?action=delete&id=<?php echo $product['id']; ?>">
<div class="btn-danger">Remove</div>

</a>
</td>
</tr>
<?php
$total = $total + ($product['quantity'] * $product['price']);
endforeach;
?>
<tr>
<td colspan="3" align ="right">Total</td>
<td align ="right">KSH <?php echo number_format($total, 2); ?></td>
<td></td>
</tr>
<tr>
<!---show check out if cart isnt empty ---->
<td colspan="5">
<?php
if (isset($_SESSION['shopping_cart'])):
if (count($_SESSION['shopping_cart']) > 0):
?>
<?php
if(isset($_SESSION['name'])){
echo '<a href="#" class="button">Checkout</a>';


}

else{
 echo '<a href="login.php" class="button">Checkout</a>';
}

?>
<?php endif; endif; ?>
</td>
</tr>
<?php
endif;
?>
</table>
</div>
</div>
</body>
</html>





