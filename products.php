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
        <!-- <div class="fas fa-user" id="login-btn"></div> -->
    </div>
    <div class="msg"></div>

</header>

<!-- header section ends -->


<section class="products m_t_20" id="products">

    <h1 class="heading"><span>All Products</span> </h1>


            <div class="box-container">
              <?php
                include 'database/database.php';
                $cat = $_GET['cat'];
                if($cat != ''){
                    $sql = "SELECT * FROM products WHERE category = '$cat'";
                }else{
                  $sql = "SELECT * FROM products";
                }
                $result = $db->query($sql);
                if($result->num_rows > 0){
                  while($row = $result->fetch_assoc()){
                    ?>
                    <div class="box">
                        <img src="uploads/<?php echo $row['p_image']; ?>" alt="" width="200px;">
                        <h3><?php echo $row['p_name']; ?></h3>
                        <form method="POST" action="" class="form-submit">
                          <p><?php echo $row['p_price']; ?> /-</p>
                          <p><?php echo $row['category']; ?></p>
                        <input type="hidden" class="pid" value="<?php echo $row['id']; ?>">
                        <input type="hidden" class="pname" value="<?php echo $row['p_name']; ?>">
                        <input type="hidden" class="pprice" value="<?php echo $row['p_price']; ?>">
                        <input type="hidden" class="pimage" value="<?php echo $row['p_image']; ?>">
                        <input type="number" class="form-control pqty" value="1"/>
                          <a class="btn btn-info addItemBtn" href="#"><i class="fa fa-shopping-cart" aria-hidden="true">Add Cart</i></a>
                        </form>
                    </div>
                    <?php
                  }
                }
              ?>

            </div>

</section>
<br><br>
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
         // Send product details in the server
         $(document).on('click', '.addItemBtn', function(e) {
             e.preventDefault();
             var $form = $(this).closest(".form-submit");
             var pid = $form.find(".pid").val();
             var pname = $form.find(".pname").val();
             var pprice = $form.find(".pprice").val();
             var pqty = $form.find(".pqty").val();
             var pimage = $form.find(".pimage").val();
             $.ajax({
                 url: 'action.php',
                 method: 'post',
                 data: {
                     pid: pid,
                     pname: pname,
                     pprice: pprice,
                     pqty: pqty,
                     pimage: pimage
                 },
                 success: function(response) {

                    $(".msg").html(response);
                     load_cart_item_number();
                 }
             });
         });

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
