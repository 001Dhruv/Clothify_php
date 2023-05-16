<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <div id="main" class="my-3">
<div class="text-center">
<h2><b><u>Tax Invoice</u></b></h2>
</div>
<div class="container">
Hello <span class="font-weight-bold">
  <?php 
  session_start();
  echo $_SESSION['user_id'];
?> </span> , Here is your order details , <br><br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Product Id</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
<?php
      $quantity=0;
      $total=0;
      $cart="cart".$_SESSION['contact'];
      $query="SELECT * FROM ".$cart." JOIN product ON ".$cart.".p_id = product.p_id ;";
      $query2="TRUNCATE TABLE ".$cart.";";

    
      $servername = "localhost";
      $username = "root";
      $password = "123456";
      $conn = new mysqli($servername, $username, $password,"clothify_php");
      
      $result=mysqli_query($conn,$query);
    
      while($row = mysqli_fetch_assoc($result)){?>
  <tbody>
    <tr>
      <th scope="row"><?php $quantity++; echo $row['p_id']?></th>
      <td><?php echo $row['p_name']?></td>
      <td><?php echo $row['P_description']?></td>
      <td><?php $total+=$row['p_price']; echo $row['p_price']?></td>
    </tr>
  </tbody>
  <?php }?>
</table>

<?php echo '<div class="container">'; ?>

    <?php echo '<p class="font-weight-bold">Total Quantity: '.$quantity.'</p>'; ?>
    <?php echo '<p class="font-weight-bold">Price: '.$total.'</p>'; ?>
    <?php echo '<p class="font-weight-bold">SGST: '.(0.025 * $total).'</p>'; ?>
    <?php echo '<p class="font-weight-bold">CGST: '.(0.025 * $total).'</p>'; ?>

    <?php echo '<p class="font-weight-bold">Total Amount After Tax: Total : '.($total + (0.05 * $total)).'</p>'; ?>

    <?php mysqli_query($conn, $query2); ?>

<?php echo '</div>'; ?>

</div>
<div class="text-center my-3">
    <a href="home.php"><button type="button" class="btn btn-primary" >Go to Home page</button></a>
</div>
   </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>


