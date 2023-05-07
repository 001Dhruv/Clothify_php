<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$conn = new mysqli($servername, $username, $password,"clothify_php");
if ($conn->connect_error) {?>
    <div class="alert alert-danger" role="alert">
        Connection error: <?php echo $conn->connect_error; ?>
        Some Error Occured please try again later..
    </div>
    <?php
}
$user_id = $_POST['user_id'];
$password = $_POST['password'];
$user_name=$_POST['user_name'];
$address=$_POST['address'];
$contact=$_POST['contact'];
$sql = "INSERT INTO user (user_id,user_name ,password,address,contact) VALUES (?,?,?,?,?);";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $user_id,$user_name,$password,$address,$contact );
if ($stmt->execute()) {
    $sql_create="create table cart".$contact."(p_id INT,quantity INT);";
    if($conn->query($sql_create)===TRUE){
        session_start();
        if(!isset($_SESSION['user_id']))
        {
            $_SESSION['user_id']=$user_id;
        }
        if(!isset($_SESSION['contact']))
        {
            $_SESSION['contact']=$contact;
        }
        header("Location: home.php");
        exit;
    }
else{
    echo $conn->error;
}
} else {
    ?>
    <div class="alert alert-danger" role="alert">
        Insertion error: <?php echo $stmt->error; ?>
        Some Error Occured please try again later..
    </div>
    <?php
    $stmt->close();
}
$conn->close();
?>
