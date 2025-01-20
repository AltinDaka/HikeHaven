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
<html lang="en">
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

        <!-- Home section starts  -->
        <section class="home" id="home">

            <!-- <div class="image">
                <img src="images/img-11.jpg" alt="Mountain" style="border-radius: 10%;"> 
            </div> -->

            <div class="content">
                <?php if (isset($user)): ?>
                    <h3>Hello <?= htmlspecialchars($user["name"]) ?> </h3>
                <?php else: ?>
                    <h3>Trails that lead to unforgettable stories</h3>
                <?php endif; ?>
                
                <p>Embrace the unknown and venture into uncharted territories. Discover the beauty of the world around you, both near and far. Let your curiosity be your compass, guiding you through the wonders that await!</p>
                
                <a href="#category" class="btn">Start hike!</a>

            </div>

            <div class="image">
                <img src="images/img-11.jpg" alt="Mountain" style="border-radius: 10%;"> 
            </div>

        </section>

        <!-- Home section ends -->

        <!-- Services section starts  -->

        <section class="services">

            <h1 class="heading"> What we offer </h1>

            <div class="box-container">

                <div class="box">
                    <img src="images/serv-1.png" alt="Complete guide">
                    <h3>Complete guide</h3>
                    <p>Discover the ultimate resource for all your hiking travel aspirations with the Complete Guide for Travel - Hiking Edition.</p>
                    <!-- <a href="#" class="btn">Read more</a> -->
                </div>

                <div class="box">
                    <img src="images/serv-2.png" alt="Custom packages">
                    <h3>Custom packages</h3>
                    <p>Embark on a personalized journey of a lifetime with our Custom Travel Packages.</p>
                    <!-- <a href="#" class="btn">Read more</a> -->
                </div>

                <div class="box">
                    <img src="images/serv-3.png" alt="Family trips">
                    <h3>Family trips</h3>
                    <p>Designed with the whole family in mind, these packages offer the perfect blend of excitement, relaxation, and bonding opportunities for all generations.</p>
                    <!-- <a href="#" class="btn">Read more</a> -->
                </div>

                <div class="box">
                    <img src="images/serv-4.png" alt="Train guides">
                    <h3>Train guides</h3>
                    <p>Whether you're a seasoned rail enthusiast or a first-time traveler, this guide is your ticket to traversing landscapes, cultures, and experiences in an immersive and sustainable way.</p>
                    <!-- <a href="#" class="btn">Read more</a> -->
                </div>

                <div class="box">
                    <img src="images/serv-5.png" alt="Adventure trail">
                    <h3>Adventure trail</h3>
                    <p> Designed for thrill-seekers and nature enthusiasts, this guide is your compass to conquering the most exhilarating and challenging trails around the Balkan.</p>
                    <!-- <a href="#" class="btn">Read more</a> -->
                </div>

                <div class="box">
                    <img src="images/serv-6.png" alt="Various adventure">
                    <h3>Various adventures</h3>
                    <p>Whether you're an adrenaline junkie, a curious explorer, or someone looking to push your boundaries, this guide is your compass to a diverse range of thrilling activities that span the globe.</p>
                    <!-- <a href="#" class="btn">Read more</a> -->
                </div>
                
            </div>

        </section>

        <!-- Services section ends -->

        <!-- Category section starts  -->

        <section class="category" id="category">

            <h1 class="heading">Adventure idea!</h1>

            <div class="box-container">

                <div class="box">
                    <img src="images/category-1.jpg" alt="Teth Valbone">
                    <h3>Valbonë -Teth to Buni Shqipes</h3>
                    <p>Discover this 18.7-mile out-and-back trail near Tropojë, Kukës. Generally considered a challenging route, it takes an average of 13 h 2 min to complete.</p>
                    <a href="trails/page1.php" class="btn">Read more</a>
                </div>

                <div class="box">
                    <img src="images/category-2.jpg" alt="Mount Korab">
                    <h3>Mount Korab</h3>
                    <p>Try this 10.6-mile out-and-back trail near Dibër, Dibër. Generally considered a challenging route, it takes an average of 8 h 14 min to complete. </p>
                    <a href="trails/page2.php" class="btn">Read more</a>
                </div>

                <div class="box">
                    <img src="images/category-3.jpg" alt="Mount Gamtit">
                    <h3>Mount Gamtit</h3>
                    <p>Explore this 7.9-mile loop trail near Krujë, Durrës. Generally considered a challenging route, it takes an average of 5 h 35 min to complete.</p>
                    <a href="trails/page3.php" class="btn">Read more</a>
                </div>

                <div class="box">
                    <img src="images/category-4.jpg" alt="Bobotov Kuk">
                    <h3>Bobotov Kuk</h3>
                    <p>Check out this 6.1-mile out-and-back trail near Šavnik, Šavnik. Generally considered a challenging route. This is a very popular area for birding and hiking, so you'll likely encounter other people while exploring.</p>
                    <a href="trails/page4.php" class="btn">Read more</a>
                </div>

                <div class="box">
                    <img src="images/category-5.jpg" alt="Durmitor Ice Cave">
                    <h3>Durmitor Ice Cave (Ledena Pecina)</h3>
                    <p>Try this 7.7-mile loop trail near Žabljak, Žabljak. Generally considered a challenging route, it takes an average of 5 h 23 min to complete. </p>
                    <a href="trails/page5.php" class="btn">Read more</a>
                </div>

                <div class="box">
                    <img src="images/category-6.jpg" alt="Trnovačko Lake">
                    <h3>Trnovačko Lake</h3>
                    <p>Try this 7.8-mile loop trail near Plužine, Plužine. Generally considered a challenging route, it takes an average of 6 h 11 min to complete. This is a popular trail for hiking and running.</p>
                    <a href="trails/page6.php" class="btn">Read more</a>
                </div>

            </div>

        </section>

        <!-- Category section ends -->

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