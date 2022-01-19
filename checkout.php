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
          <div class="container">
          		<div class="content-panel">
          			<h1 class="title">Checkout</h1>
                <hr>
          			<div class="billing">
          				<div class="secure text-center margin-bottom-md">
          					   <h2 class="margin-bottom-md text-success">
          							<span class="fs1 icon" aria-hidden="true" data-icon=""></span>
          							Secure Shopping<br>
          							<small>Submit all Information for complete your checkout!</small>
          						</h2>
          				</div>
          				<form method="post" action="" role="form">
                    <div class="row">

                      <div class="col-6">
                        <h2>Customer Information</h2>
                        <br>
                        <div class="form-group">
                          <h3>Your Name</h3>
                          <div>
                            <input type="text" class="form-control" name="name" placeholder="" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <h3>Phone</h3>
                          <div>
                            <input type="text" class="form-control" name="phone" placeholder="" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <h3>Address</h3>
                          <div>
                            <input type="text" class="form-control" name="address" placeholder="" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <h3>Delevary Address</h3>
                          <div>
                            <input type="text" class="form-control" name="daddress" placeholder="" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <h2>Payment Information</h2>
                        <br>
                        <div class="form-group">
                          <div>
                            <h3>Delevary Method</h3>
                            <select class="form-control" name="pmethod">
                              <option value="COD">Cash On Delivery</option>
                            </select>
                          </div>
                        </div>
                        <?php
                        	$grand_total = 0;
                        	$allItems = '';
                        	$items = [];
                          include 'database/database.php';
                        	$sql = "SELECT CONCAT(p_name, '(',qty,')') AS ItemQty, total FROM cart";
                        	$stmt = $db->prepare($sql);
                        	$stmt->execute();
                        	$result = $stmt->get_result();
                        	while ($row = $result->fetch_assoc()) {
                        	  $grand_total += $row['total'];
                        	  $items[] = $row['ItemQty'];
                        	}
                        	$allItems = implode(', ', $items);

                        ?>
                        <input type="hidden" class="form-control" name="total" value="<?php echo $grand_total; ?>">
                        <input type="hidden" class="form-control" name="products" value="<?php echo $allItems; ?>">

                        <div class="card">
                          <div class="card-header">
                            <h4>Your Total Amount: <?php echo $grand_total; ?> Taka</h4>
                          </div>
                          <div class="card-body">
                            <h4>Products : <?php echo $allItems; ?></h4>
                          </div>
                        </div>
                        <div class="action-wrapper text-center">
                          <div class="action-btn">
                            <button class="btn btn-success btn-lg" name="submit">
                              Place Order
                              <i class="fa fa-chevron-right"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
          				</form>
                  <?php
                  if(isset($_POST['submit'])){
                    $name = $_POST['name'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $daddress = $_POST['daddress'];
                    $pmethod = $_POST['pmethod'];
                    $total = $_POST['total'];
                    $products = $_POST['products'];
                    $sql = "INSERT INTO orders(name,phone,address,daddress,pmethod,total,products) VALUES ('$name','$phone','$address','$daddress','$pmethod','$total','$products')";
                    $result = $db->query($sql);
                    if($result){
                      $sql2 = "DELETE FROM cart";
                      $result2 = $db->query($sql2);
                      if($result2){
                        echo "<script>window.open('complete.php','_self');</script>";
                      }
                    }
                  }
                  ?>
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
