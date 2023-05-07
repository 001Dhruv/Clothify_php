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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="home.php">Clothify</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" id="home" href="#">Home </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" id="men" href="#">Men <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" id="women" href="#">Women <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" id="your_cart" href="your_cart.php">Your cart <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="search.php">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <a href="logout.php" class="mx-2"><button type="button" class="btn btn-danger">Logout</button></a>
  </div>
</nav>
<div id="main">
<h2 style="text-decoration:underline; text-align:center; margin-top:20px;">Your Cart</h2>
    <?php
      $type=$_GET['search'];
      $query="select * from product where p_type='".$type."';";
      $servername = "localhost";
      $username = "root";
      $password = "123456";
      $conn = new mysqli($servername, $username, $password,"clothify_php");
      $result=mysqli_query($conn,$query);
      while($row = mysqli_fetch_assoc($result)){?>
        <div class="container mt-5" >
        <div class="card flex-row">
        <img src="<?php echo $row['p_img']; ?>" class="card-img-left" style="padding:5px;height:40%; width:25%; "alt="cant't load img">
        <div class="card-body">
        <h5 class="card-title"><?php echo $row['p_name']?></h5>
        <p class="card-text"><?php echo $row['P_description']?></p>
        <p class="card-text">Made for <?php echo $row['p_gender']?></p>
        <p class="card-text">Type <?php echo $row['p_type']?></p>
        <p class="card-text"><strong>Price:</strong>₹ <?php echo $row['p_price']?></p>
        <div class="" role="group">
        <a href="buy_now.php?p_id=<?php echo $row['p_id']; ?>"><button type="button" class="btn btn-dark mx-1 buy_now">Buy Now</button></a>
        <a href="add_to_cart.php?p_id=<?php echo $row['p_id']; ?>"><button type="button" class="btn btn-success mx-1 add-to-cart">Add to Cart</button></a>
      </div>
    </div>
  </div>
</div><?php
     }
    
    ?>
    </div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        function men(){
            // using AJAX
            alert("HEER");
        }
        $(document).ready(function(){
            $('#women').click(function(){
                $.get('women.php', function(data, status){
                $('#main').html(data);
                });
            });
            $('#men').click(function(){
                $.get('men.php', function(data, status){
                $('#main').html(data);
                });
            });
            $('#home').click(function(){
                $.get('home_data.php', function(data, status){
                $('#main').html(data);
                });
            });
            $('.add_to_cart').click(function(){
                alert("Product Added To Cart Successfully..");
                });
            $('.buy_now').click(function(){
                alert("Your Order has been placed Successfully..");
                });
        });

    </script>
  </body>
</html>
