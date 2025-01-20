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
        <style>
            .btnplease {
                margin-top: 1rem;
                display: inline-block;
                border: 0.2rem solid #10221b;
                color: white;
                cursor: pointer;
                background: #10221b;
                font-size: 1.7rem;
                padding: 1rem 3rem;
            }

            .btnplease:hover {
                background: white;
                color: black;
            }
        </style>

    </head>
    <body>
        <!-- Header section starts  -->
        <?php include 'head_footer/header.php'; ?>
        <br>
        <br>
        <br>

        <!-- Packges section starts  -->
        <section class="packages" id="packages">
            <h1 class="heading">Popular Packages</h1>

            <div class="box-container">

                <div class="box">
                    <div class="image">
                        <img src="images/img-1.jpg" alt="Shala river">
                    </div>
                    <div class="content">
                        <h3>Shala river tour</h3>
                        <p>Shala River is a touristic destination that is described by many visitors as the most beautiful pearl of Koman’s lake, as Thailand of Albania . The hazy color of water and it’s crystal clean water is characteristic of this river.</p>
                        <div class="price">$30</div>
                        <a href="#" class="btn">Explore now</a>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="images/img-2.jpg" alt="Ksamil Islands">
                    </div>
                    <div class="content">
                        <h3>Ksamil Islands</h3>
                        <p>The Ksamil Islands are considered the gems of the Albanian Riviera. They are a series of four small islands located off the coast of Saranda, Albania. The islands are pristine, with crystal-clear water and beautiful sandy beaches.</p>
                        <div class="price">$60</div>
                        <a href="#" class="btn">Explore now</a>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="images/img-3.jpg" alt="Sharr Mountain">
                    </div>
                    <div class="content">
                        <h3>Sharr Mountains National Park</h3>
                        <p>Elevate your journey to new heights with a visit to the awe-inspiring Sharr Mountain range. Nestled in the heart of natural beauty, Sharr Mountain offers an unparalleled alpine escape for explorers, adventurers, and nature enthusiasts alike. </p>
                        <div class="price">$100</div>
                        <a href="#" class="btn">Explore now</a>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="images/img-4.jpg" alt="Matka Canyon">
                    </div>
                    <div class="content">
                        <h3>Matka Canyon</h3>
                        <p>Navigate the pristine waters of Matka Lake on guided boat tours, hike scenic trails that unveil mesmerizing vistas, and capture the essence of this hidden gem through your lens.</p>
                        <div class="price">$20</div>
                        <a href="#" class="btn">Explore now</a>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="images/img-5.jpg" alt="Mavrovo">
                    </div>
                    <div class="content">
                        <h3>National Park Mavrovo</h3>
                        <p>Step into a realm of natural wonder as you enter National Park Mavrovo, an untouched paradise waiting to be explored. From dense forests to pristine lakes and rugged peaks, Mavrovo is a haven for those seeking the embrace of wilderness.</p>
                        <div class="price">$150</div>
                        <a href="#" class="btn">Explore now</a>
                    </div>
                </div>

                <div class="box">
                    <div class="image">
                        <img src="images/img-6.jpg" alt="Liqenat lake">
                    </div>
                    <div class="content">
                        <h3>Liqenat Lake</h3>
                        <p>Escape to the enchanting embrace of Lake Liqenat in the heart of Rugova, where nature's serenity and grandeur intertwine in perfect harmony. A true hidden gem, this pristine alpine lake offers an oasis of calm and breathtaking vistas that will captivate your senses.</p>
                        <div class="price">$50</div>
                        <a href="#" class="btn">Explore now</a>
                    </div>
                </div>

            </div>

            <?php
                include "packages/display_packages.php";
            ?>

            <div>
                <?php if (isset($user)): ?>
                    <a href="packages/post_packages_form.php" class="btnplease" style="border-radius: 30px">Post a New Package</a>
                <?php else: ?>
                    <a href="login.php" class="btnplease" style="border-radius: 30px">Please Log In to make a post</a>
                <?php endif; ?>
            </div>
        </section>
        <!-- Packages section ends -->

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