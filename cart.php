<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shodai</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

<!-- header section starts  -->

<header class="header">

    <a href="index.php" class="logo"> <i class="fas fa-shopping-basket"></i> সদাই </a>

    <nav class="navbar">
        <a href="index.php">home</a>
        <a href="">features</a>
        <a href="products.php?cat=">products</a>
        <a href="">Contact</a>
    </nav>


    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <div class="fas fa-search" id="search-btn"></div>
        <a href="cart.php"><div class="fas fa-shopping-cart cart-item" id="cart-btn"></div></a>
    </div>
    <div class="msg"></div>

</header>

<!-- header section ends -->

<section style="margin-top:80px;">

   <div class="card">
        <div class="card-header">
            <h2>Cart</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th width="10%"><h3>ID</h3></th>
                    <th><h3>Product Name</h3></th>
                    <th width="15%"><h3>Price</h3></th>
                    <th width="15%"><h3>Quantity</h3></th>
                    <th width="10%"><h3>Total</h3></th>
                    <th width="10%"><h3>Clear</h3></th>
                  </tr>
                </thead>
                <tbody>
        <?php
                include 'database/database.php';
                $sql = "SELECT * FROM cart ";
                $result = $db->query($sql);
                $total = 0;
                if($result->num_rows > 0){
                  while($row = $result->fetch_assoc()){
                    $total += $row['total'];
                    ?>
                  <tr>

                    <td><h4><?php echo $row['p_id']; ?></h4></td>
                    <td><h4><?php echo $row['p_name']; ?></h4></td>
                    <td><h4><?php echo $row['p_price']; ?></h4></td>
                    <td><h4><?php echo $row['qty']; ?></h4></td>
                    <td><h4><?php echo $row['total']; ?></h4></td>
                    <td><a href="action.php?remove=<?= $row['id'] ?>" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">Delete</a></td>
                </tr>
        <?php
                  }
                }
              ?>
                </tbody>
              </table>
            </div>
            <!-- / Shopping cart table -->

            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                 <div class="mt-4">

              </div>
              <div class="d-flex">

                <div class="text-right mt-4">
                  <label class="text-muted font-weight-normal m-0"><h3>Your total price</h3></label>
                  <div class="text-large"><strong><h3><?php echo $total; ?> /-</h3></strong></div>
                </div>
              </div>
            </div>

            <div class="float-right">
              <a href="products.php?cat="><button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to shopping</button></a>
              <a href="checkout.php"><button type="button" class="btn btn-lg btn-primary mt-2">Checkout</button></a>
            </div>

          </div>
      </div>

</section>
<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3> সদাই <i class="fas fa-shopping-basket"></i> </h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, saepe.</p>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#" class="links"> <i class="fas fa-phone"></i> 01744336039 </a>
            <a href="#" class="links"> <i class="fas fa-envelope"></i> tmahmud200@gmail.com </a>
            <a href="#" class="links"> <i class="fas fa-map-marker-alt"></i> dhaka,Bangladesh </a>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> features </a>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> products </a>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> categories </a>
        </div>

    </div>

    <div class="credit"> created by <span> Tarek </span></div>

</section>


<!-- custom js file link  -->
<script src="js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
     $(document).ready(function() {

         load_cart_item_number();

         function load_cart_item_number() {
             $.ajax({
                 url: 'action.php',
                 method: 'POST',
                 data: {
                     cartItem: "cart_item"
                 },
                 success: function(response) {
                     $(".cart-item").html(response);
                 }
             });
         }
     });
 </script>
</body>
</html>
