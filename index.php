
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

<section class="home" id="home">

    <div class="content">
        <h3>fresh and <span>organic</span> products for your</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam libero nostrum veniam facere tempore nisi.</p>
        <a href="products.php?cat=" class="btn">shop now</a>
    </div>

</section>

<!-- home section ends -->



<!-- categories section starts  -->
<!--
<section class="categories" id="categories">

    <h1 class="heading"> product <span>categories</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="image/cat-1.png" alt="">
            <h3>vegitables</h3>
            <p>upto 45% off</p>
            <a href="#" class="btn">shop now</a>
        </div>

        <div class="box">
            <img src="image/cat-2.png" alt="">
            <h3>fresh fruits</h3>
            <p>upto 45% off</p>
            <a href="#" class="btn">shop now</a>
        </div>

        <div class="box">
            <img src="image/cat-3.png" alt="">
            <h3>dairy products</h3>
            <p>upto 45% off</p>
            <a href="#" class="btn">shop now</a>
        </div>

        <div class="box">
            <img src="image/cat-4.png" alt="">
            <h3>fresh meat</h3>
            <p>upto 45% off</p>
            <a href="#" class="btn">shop now</a>
        </div>

    </div>

</section> -->

<!-- categories section ends -->
<section class="products" id="products">

    <h1 class="heading"><span>Category</span> </h1>

            <div class="box-container">
              <?php
                include 'database/database.php';
                $sql = "SELECT * FROM category";
                $result = $db->query($sql);
                if($result->num_rows > 0){
                  while($row = $result->fetch_assoc()){
                    ?>
                <div class="box">
                    <img src="uploads/<?php echo $row['image']; ?>" alt="">
                    <h3><?php echo $row['cat_name']; ?></h3>
                    <a href='products.php?cat=<?php echo $row['cat_name']; ?>' class="btn">View More</a>
                </div>
              <?php
             }
            }
             ?>
            </div>

            <!-- <div class="box see-more">
                <a href="#" class="btn see-more">View More</a>
            </div> -->
</section>

<!-- products section starts  -->

<section class="products" id="products">

    <h1 class="heading"><span>Recent Products</span> </h1>

            <div class="box-container">

              <?php
                include 'database/database.php';
                $sql = "SELECT * FROM products ORDER BY id DESC limit 4";
                $result2 = $db->query($sql);
                if($result2->num_rows > 0){
                  while($row2 = $result2->fetch_assoc()){
                    ?>
                    <div class="box">
                        <img src="uploads/<?php echo $row2['p_image']; ?>" alt="">
                        <h3><?php echo $row2['p_name']; ?></h3>
                        <p><?php echo $row2['p_price']; ?> /-</p>
                        <p><?php echo $row2['category']; ?></p>
                        <a href="products.php?cat=" class="btn">View More</a>
                    </div>
                <?php
              }
            }
                ?>

            </div>

</section>

<!-- products section ends -->

<!-- features section starts  -->

<section class="features" id="features">

    <h1 class="heading"><span>features</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="image/feature-img-1.png" alt="">
            <h3>fresh and organic</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt, earum!</p>
        </div>

        <div class="box">
            <img src="image/feature-img-2.png" alt="">
            <h3>free delivery</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt, earum!</p>
        </div>

        <div class="box">
            <img src="image/feature-img-3.png" alt="">
            <h3>easy payments</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt, earum!</p>
        </div>

    </div>

</section>

<!-- features section ends -->
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
