<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$conn = new mysqli($servername, $username, $password,"clothify_php");
if ($conn->connect_error) {?>
    <div class="alert alert-danger" role="alert">
        Some Error Occured while connecting to server..
    </div>
<?php
}
else{
    session_start();
    $cart="cart".$_SESSION['contact'];
    $sql = "DELETE FROM " . $cart . " WHERE p_id = " . $_GET['p_id'] . ";";
    if(!mysqli_query($conn,$sql)){
        echo $conn->error;
    }
    else{
    header("Location: your_cart.php");
    exit;
    }
}
?>