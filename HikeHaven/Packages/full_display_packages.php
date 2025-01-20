<?php

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
        <link rel="stylesheet" href="../css/style.css">
        <style>
            /* Style for the container of each package */
            body{
                background:url(../images/img-7.jpg)no-repeat;
                background-size: cover;
                background-position: center;
            }
            .package {
                border: 1px solid #ccc;
                padding: 20px;
                margin: 10px;
                display: flex;
                justify-content:space-around;
                align-items: center;
                height:300px;

            }

            /* Style for package information */
            .package-info {
                font-size:15px;
                line-height:1.5;
                text-align:start;
            }

            /* Style for package image */
            .package-image{
                display:flex;
               
            }
            .package-image img {
                width:300px;
                height:200px;
                border-radius:10px;
               
               
            }

            /* Style for package actions (Edit and Delete buttons) */
            .package-actions {
                display:flex;
                align-items:center;
                justify-content:center;
                text-align: right;
                margin-top: 10px;
                width:300px;
                height:100px;
            }

            /* Style for the Edit and Delete buttons */
            .btn {
                background-color: #219150;;
                color:#ffff;
                padding: 5px 10px;
                text-decoration: none;
                margin-left:10px;
                border-radius: 5px;
            }

            /* Style for links */
            a {
                text-decoration: none;
                color: #007bff;
            }

            /* Style for icons */
            .icons a {
                margin-right: 10px;
                color: #219150;
            }


        </style>
    </head>
    <body>
        <!-- Header section starts -->
        <header class="header">

            <a href="../index.php" class="logo"> <!--<i class="fas fa-hiking"></i>--> HikeHaven </a>

            <nav class="navbar">
                <div id="nav-close" class="fas fa-times"></div>
                <a href="../index.php">Home</a>
                <a href="../blogs.php">Posts</a>
                <a href="../shop.php">Shop</a>
                <a href="../package.php">Packages</a>
            </nav>

            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <a href="shop.php" class="fas fa-shopping-cart"></a>
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
        <br>
        <br>
        <br>

        <?php include 'full_packages.php'; ?>

        <!-- Footer section starts  -->
        <?php include '../footer_head2/footer2.php'; ?>

        <!-- Footer section ends -->
        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
        <!-- Js file link  -->
        <script src="../js/script.js"></script>
    </body>
</html>