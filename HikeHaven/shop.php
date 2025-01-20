<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HikeHaven</title>

        <!-- Font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

        <!-- Css file link  -->
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body>
        <!-- Header section starts  -->
        <?php include 'head_footer/header.php'; ?>
        <br>
        <br>
        <br>

        <!-- Shop section starts  -->

        <section class="shop" id="shop">

            <h1 class="heading">Featured products</h1>

            <div class="swiper product-slider">

                <div class="swiper-wrapper">

                    <div class="swiper-slide slide">
                        <div class="image">
                            <img src="images/product-1.jpg" alt="Hiking bag">
                            <div class="icons">
                                <a href="#" class="fas fa-shopping-cart"></a>
                                <a href="#" class="fas fa-eye"></a>
                                <a href="#" class="fas fa-share"></a>
                            </div>
                        </div>
                        <div class="content">
                            <h3>Hiking bag</h3>
                            <div class="price">$150.00 </div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide slide">
                        <div class="image">
                            <img src="images/product-2.jpg" alt="Knife">
                            <div class="icons">
                                <a href="#" class="fas fa-shopping-cart"></a>
                                <a href="#" class="fas fa-eye"></a>
                                <a href="#" class="fas fa-share"></a>
                            </div>
                        </div>
                        <div class="content">
                            <h3>Knife</h3>
                            <div class="price"> $10.00 </div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide slide">
                        <div class="image">
                            <img src="images/product-3.jpg" alt="Eyewear">
                            <div class="icons">
                                <a href="#" class="fas fa-shopping-cart"></a>
                                <a href="#" class="fas fa-eye"></a>
                                <a href="#" class="fas fa-share"></a>
                            </div>
                        </div>
                        <div class="content">
                            <h3>Eyewear</h3>
                            <div class="price"> $25.00 </div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide slide">
                        <div class="image">
                            <img src="images/product-4.jpg" alt="Boots">
                            <div class="icons">
                                <a href="#" class="fas fa-shopping-cart"></a>
                                <a href="#" class="fas fa-eye"></a>
                                <a href="#" class="fas fa-share"></a>
                            </div>
                        </div>
                        <div class="content">
                            <h3>Boots</h3>
                            <div class="price"> $70.00 </div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide slide">
                        <div class="image">
                            <img src="images/product-5.jpg" alt="Carabiner">
                            <div class="icons">
                                <a href="#" class="fas fa-shopping-cart"></a>
                                <a href="#" class="fas fa-eye"></a>
                                <a href="#" class="fas fa-share"></a>
                            </div>
                        </div>
                        <div class="content">
                            <h3>Carabiner</h3>
                            <div class="price"> $5.00</div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide slide">
                        <div class="image">
                            <img src="images/product-6.jpg" alt="Hiking grill">
                            <div class="icons">
                                <a href="#" class="fas fa-shopping-cart"></a>
                                <a href="#" class="fas fa-eye"></a>
                                <a href="#" class="fas fa-share"></a>
                            </div>
                        </div>
                        <div class="content">
                            <h3>Hiking grill</h3>
                            <div class="price"> $75.00 </div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

            </div>

        </section>

        <!-- Shop section ends -->

        <!-- Newsletter section  -->

        <section class="newsletter">
            <div class="content">
                <h1 class="heading">Subscribe now</h1>
                <p>Ready to elevate your hiking experience? Subscribe to our page for exclusive trail insights, expert tips, gear recommendations, and breathtaking hiking destinations. Join our community of passionate hikers and let's embark on unforgettable journeys together. Don't miss out – subscribe now and step into a world of adventure!</p>
                <form method="post" action="subscribe.php">
                    <input type="email" name="email" placeholder="Enter your email" id="email" class="email" required>
                    <input type="submit" value="Subscribe" class="btn">
                </form>
            </div>
        </section>

        <section class="clients">

            <div class="swiper clients-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide silde"><img src="images/client-logo-1.png" alt="Client logo"></div>
                    <div class="swiper-slide silde"><img src="images/client-logo-2.png" alt="Client logo"></div>
                    <div class="swiper-slide silde"><img src="images/client-logo-3.png" alt="Client logo"></div>
                    <div class="swiper-slide silde"><img src="images/client-logo-4.png" alt="Client logo"></div>
                </div>
            </div>

        </section>

        <!-- Footer section starts  -->
        <?php include 'head_footer/footer.php'; ?>
        <!-- Footer section ends -->

        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

        <!-- Js file link  -->
        <script src="js/script.js"></script>
    </body>
</html>