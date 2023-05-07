<?php
      $query="select * from product;";
      $servername = "localhost";
      $username = "root";
      $password = "123456";
      $conn = new mysqli($servername, $username, $password,"clothify_php");
      $result=mysqli_query($conn,$query);?><h2 style="text-decoration:underline; text-align:center; margin-top:20px;">Our Collection</h2><?php
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
  <script>
        $(document).ready(function(){
          $('.add_to_cart').click(function(){
                alert("Product Added To Cart Successfully..");
                });
            $('.buy_now').click(function(){
                alert("Your Order has been placed Successfully..");
                });
          });
    </script>