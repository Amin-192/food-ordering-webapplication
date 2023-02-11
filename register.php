<?php


?>
<!DOCTYPE htm>

    <head>
<link rel="stylesheet" href="admin.css">
    </head>
    <body>
<div class="form-container">
    <form action="signup.php" method="POST">
    <h1>register now</h1>
    <?php
    if(isset($_GET['error'] )){
        if($_GET['error'] =  "emptyfields"){
            echo '<p class = "error"> FILL IN ALL FIELDS</p>';

        }
        

    }
    else if(isset($_GET['registerd'] )){
        if($_GET['registerd'] = "signupsuccess"){
            echo '<p class = "error"> SIGN UP SUCCESSFUL</p>';
        }
    }
    else if(isset($_GET['take'] )){
        if($_GET['take'] = "usernametaken"){
            echo '<p class = "error"> USER NAME TAKEN</p>';
        }
    }
    else if(isset($_GET['registerd'] )){
        if($_GET['registerd'] = "signupsuccess"){
            echo '<p class = "error"> SIGN UP SUCCESSFUL</p>';
        }
    }
   
    ?>
    <label for ="user">NAME</label><br>
    <input type="text" name= "name"  placeholder="enter your name"> 
    <label for ="user">EMAIL</label><br>
    <input type="email" name= "email"  placeholder="enter your email"> 
    <label for ="password" >password</label>
    <input type="password" name= "password" placeholder="enter your password">
   
   
    <button id="but" type ="submit"  name ="submit" > REGISTER</button>
    <p>already have an account? <a href="login.php"> log in now</a></p><br>
    <p>click here to go back to the home page<a href="index.php">  home</a></P>
    </form>
    </div>
</body> 
    
