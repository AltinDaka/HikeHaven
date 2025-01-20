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
        <!-- Blogs section starts  -->

        <section class="blogs" id="blogs">

            <h1 class="heading"> Daily posts </h1>

            <div class="swiper blogs-slider">

                <div class="swiper-wrapper">
                <div class="swiper-slide slide">
                        <img src="images/img-1.jpg" alt="">
                        <div class="icons">
                            <a href="#"> <i class="fas fa-calendar"></i> 23st July, 2023 </a>
                            <a href="#"> <i class="fas fa-user"></i> By admin </a>
                        </div>
                        <h3>Post title</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit, deserunt.</p>
                        <a href="#" class="btn">Read more</a>
                    </div>

                    <div class="swiper-slide slide">
                        <img src="images/img-2.jpg" alt="">
                        <div class="icons">
                            <a href="#"> <i class="fas fa-calendar"></i> 30st July, 2023 </a>
                            <a href="#"> <i class="fas fa-user"></i> By admin </a>
                        </div>
                        <h3>Post title</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit, deserunt.</p>
                        <a href="#" class="btn">Read more</a>
                    </div>

                    <div class="swiper-slide slide">
                        <img src="images/img-3.jpg" alt="">
                        <div class="icons">
                            <a href="#"> <i class="fas fa-calendar"></i> 06st August, 2023 </a>
                            <a href="#"> <i class="fas fa-user"></i> By admin </a>
                        </div>
                        <h3>Post title</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit, deserunt.</p>
                        <a href="#" class="btn">Read more</a>
                    </div>


                    <?php
                        include "blog/display_blogs.php";
                    ?>
                </div>
                <?php if (isset($user)): ?>
                    <a href="blog/post_blog_form.php" class="btnplease" style="border-radius: 30px">Post a New Hike</a>
                <?php else: ?>
                    <a href="login.php" class="btnplease" style="border-radius: 30px">Please Log In to make a post</a>
                <?php endif; ?>
            </div>

        </section>

        <!-- Blogs section ends -->

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