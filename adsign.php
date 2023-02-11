<?php
if($_SERVER['REQUEST_METHOD' ] == 'POST' && isset($_POST['submit'])){
    
    require 'adbh.php';

$name = $_POST['name'];
    $email= $_POST['email'];
     $password = $_POST['password'];

     if(empty($email)|| empty($password) || empty($name) ){
header("location:adregis.php?error=emptyfileds&email=".$email ."&name =".$name);

     }
     else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("location:adregis.php?error=emptyfileds&email=".$email);
        exit();
     }
     
else {
    $sql ="SELECT name FROM users WHERE name =?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt ,$sql)){
        header("location:adregis.php?error=error");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$name);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);

        if($resultCheck > 0){
            header("location:adregis.php?take=usernametaken&email=".$email);
            exit();
        }
        else{
            $sql =" INSERT INTO admin_table (name,email,password) VALUES(?,?,?)";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt ,$sql)){
                header("location:adregis.php?error=error");
                exit();
            }
            else{

                $hashepwd = password_hash($password, PASSWORD_DEFAULT);

         mysqli_stmt_bind_param($stmt,"sss",$name,$email,$hashepwd );
        mysqli_stmt_execute($stmt);
        header("location:adminlogin.php?registerd=signupsuccess");
exit();

            }
        }
    }


}
  mysqli_stmt_close() ;
  mysqli_close() ;    
}
else{
    header("location:adregis.php");
}