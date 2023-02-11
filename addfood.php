<?php
if($_SERVER['REQUEST_METHOD' ] == 'POST' && isset($_POST['submit'])){
    
    require 'adbh.php';

$name = $_POST['name'];
    $image = $_POST['image'];
     $price = $_POST['price'];

     if(empty($image)|| empty($price) || empty($name) ){
header("location:admin.php?error=emptyfileds&email=".$name);

     }
     
else{
    $sql ="SELECT name FROM products WHERE name =?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt ,$sql)){
        header("location:admin.php?error=error");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$name);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);

        if($resultCheck > 0){
            header("location:admin.php?error=foodalready exists=".$name);
            exit();
        }
        else{
            $sql =" INSERT INTO products(name,image,price) VALUES(?,?,?)";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt ,$sql)){
                header("location:admin.php?error=error");
                exit();
            }
            else{

             

         mysqli_stmt_bind_param($stmt,"sss",$name,$image,$price );
        mysqli_stmt_execute($stmt);
        header("location:admin.php?added=foodadded");
exit();

            }
        }
    }


}
  mysqli_stmt_close() ;
  mysqli_close() ;    
}
else{
    header("location:admin.php");
}
