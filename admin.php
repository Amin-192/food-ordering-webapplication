<?php
if($_SERVER['REQUEST_METHOD' ] == 'POST' && !isset($_POST['login'])){
    header("location:./loginfolder/index.php");
}
    ?>


<?php

$dbservername ="localhost";
$dbUsername = "root";
$dbpassword = "";
$dbname = "my_db";
$conn = mysqli_connect($dbservername,$dbUsername,$dbpassword,$dbname);
if(!$conn){
    die("connection failed".mysqli_connect_error());
}

if (isset($_GET['name'])) {
    $name=$_GET['name'];
    $delete=mysqli_query($conn, "DELETE FROM users WHERE name =
   '$name'");
   header("location:admin.php");
    }

$select = "SELECT * FROM users ";

$query=mysqli_query($conn, $select);

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ad.css">
    <title>ADMIN PAGE</title>
</head>

<body>
    <table> 
        <tr>
            <th> NAME</th>
            <th> EMAIL </th>
            <th>OPTION</th>
        </tr>
        <?php
        $num=mysqli_num_rows($query);
if($num>0){
    while($result=mysqli_fetch_assoc($query)){

        echo"
        <tr>
        <td>".$result['name']."</td>
        <td>".$result['email']."</td>
        <td> 
        <a href = 'admin.php?name=".$result['name']."'class = 'btn'>DELETE</a>
        </td>
        </tr>
        ";

    }
}
?>

        </table>
 


<?php

$dbservername ="localhost";
$dbUsername = "root";
$dbpassword = "";
$dbname = "my_db";
$conn = mysqli_connect($dbservername,$dbUsername,$dbpassword,$dbname);
if(!$conn){
    die("connection failed".mysqli_connect_error());
}

if (isset($_GET['name'])) {
    $name=$_GET['name'];
    $delete=mysqli_query($conn, "DELETE FROM products WHERE name =
   '$name'");
   header("location:admin.php");
    }

$select = "SELECT * FROM products ";

$query=mysqli_query($conn, $select);

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ad.css">
    <title>ADMIN PAGE</title>
</head>

<body>
    <table> 
        <tr>
            <th> NAME</th>
            <th> PRICE </th>
            <th>OPTION</th>
        </tr>
        <?php
        $num=mysqli_num_rows($query);
if($num>0){
    while($result=mysqli_fetch_assoc($query)){

        echo"
        <tr>
        <td>".$result['name']."</td>
        <td>".$result['price']."</td>
        <td> 
        <a href = 'admin.php?name=".$result['name']."'class = 'btn'>DELETE</a>
        
        </td>
        </tr>
        ";

    }
}
?>

        </table>

    </div>
        
    </table>
    <div class="form-container">
    <form action="regisuer.php" method="POST">
    <h1>register user</h1>
    <label for ="user">NAME</label><br>
    <input type="text" name= "name"  placeholder="enter your name"> 
    <label for ="user">EMAIL</label><br>
    <input type="email" name= "email"  placeholder="enter your email"> 
    <label for ="password" >password</label>
    <input type="password" name= "password" placeholder="enter your password">
   
   
    <button id="but" type ="submit" name ="submit"> REGISTER</button>
    </form>
    </div>
    <div class="form-container">
    <form action="addfood.php" method="POST">
    <h1>ADD FOOD</h1>
    <label for ="user">NAME</label><br>
    <input type="text" name= "name"  placeholder="enter your name"> 
    <label for ="image">image</label><br>
    <input type="text" name= "image"  placeholder="enter food image"> 
    <label for ="price" >price</label>
    <input type="text" name= "price" placeholder="enter price">
   
   
    <button id="but" type ="submit" name ="submit"> ADD FOOD</button>
   
    </form>
   
</body>
</html>

