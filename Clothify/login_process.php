<?php
    $user_id=$_POST['user_id'];
    $password=$_POST['password'];
    $query="SELECT * FROM user WHERE user_id='".$user_id."';";
    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $conn = new mysqli($servername, $username, $password,"clothify_php");
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($result);
    if($row!=null){
        if($row['user_id']===$user_id){
            if($row['password']===$password){
                session_start();
                $_SESSION['user_id']=$row['user_id'];
                $_SESSION['contact']=$row['contact'];
                header("Location: home.php");
                exit;
            }
            else{
                header("Location: password_mismatch.html");
                exit;
            }  
        }
    }
    else{
        echo"Register here";
        header("Location: register.html");
        exit;
    }
?>

