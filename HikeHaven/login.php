<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>

!<!DOCTYPE html>
<html>
    <head>
        <title>HikeHaven</title>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Linqet e fonteve -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

        <!--Linku i CSS-->
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body>

        <header class="header">

            <a href="/index.php" class="logo"> <!--<i class="fas fa-hiking"></i>--> HikeHaven </a>

            <nav class="navbar">
                <div id="nav-close" class="fas fa-times"></div>
                <a href="/index.php">Home</a>
                <a href="/blogs.php">Posts</a>
                <a href="/shop.php">Shop</a>
                <a href="/package.php">Packages</a>
            </nav>

            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <a href="/shop.php" class="fas fa-shopping-cart"></a>
                <div id="search-btn" class="fas fa-search"></div>
            </div>

        </header>

        <!-- Search form  -->

        <div class="search-form">

        <div id="close-search" class="fas fa-times"></div>

        <form action="">
        <input type="search" name="" placeholder="Search here..." id="search-box">
        <label for="search-box" class="fas fa-search"></label>
        </form>
        </div>
        <!-- Header section ends -->
        <?php if ($is_invalid): ?>
        <em>Invalid login</em>
        <?php endif; ?>
        
        <br>
        <br>
        <br>
        <h2 id="join">Join Us</h2>
        <div class="container" id="container">

            <div class="form-container sign-in-container">
                <form method="post">
                    
                    <h1>Log In</h1>
                    <div class="social-container">
                        <a href="https://www.facebook.com/" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your account</span>
                    <input type="email" name="email" id="email" placeholder="Email"
                    value="<?= htmlspecialchars($_POST["email"] ?? "") ?>"/>
                    <input type="password" name="password" id="password" placeholder="Password"/>
                    <a href="#">Forgot your password?</a>
                    <button type="submit" name="login">Log In</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us, please log in with your personal info</p>
                        <button class="ghost" id="signIn">Log In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>Enter your personal details and start your journey with us</p>
                        <a href="signup.html"><button class="ghost" id="signUp">Sign Up</button></a>
                    </div>
                </div>
            </div>
        </div>


        <footer>
            <p>
                Created by <span>HikeHaven</span> | All rights reserved!
            </p>
        </footer>

        <!-- Linku i JavaScript -->
        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
        <script src="js/login.js"></script>
    </body>
</html>