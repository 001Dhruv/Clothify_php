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
    $sql = "UPDATE product SET p_quantity = p_quantity - 1 WHERE p_id = ".$_GET['p_id'].";";
    $result = mysqli_query($conn,$sql);
    header("Location: home.php");
    exit;
}
?>