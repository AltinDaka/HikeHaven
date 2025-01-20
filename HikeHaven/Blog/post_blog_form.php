<?php

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "../database.php";
    
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
            form {
                max-width: 400px;
                margin: 0 auto;
                padding: 20px;
                border: 1px solid #ccc;
                background-color: #f9f9f9;
                border-radius: 5px;
            }

            label {
                display: block;
                font-weight: bold;
                margin-bottom: 5px;
            }

            input {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 3px;
                font-size: 16px;
            }

            #image {
                padding: 5px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }
        </style>

    </head>
    <body>
        <header class="header">

            <a href="../index.php" class="logo"> <!--<i class="fas fa-hiking"></i>--> HikeHaven </a>

            <nav class="navbar">
                <div id="nav-close" class="fas fa-times"></div>
                <a href="../index.php">Home</a>
                <a href="../blogs.php">Posts</a>
                <a href="../shop.php">Shop</a>
                <a href="../package.php">Packages</a>
                <a href="../logout.php">Log Out</a>
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
        
        <section>
            <div class="content">
                <h2 class="heading">Post a New Hike</h2>
                <form method="post" action="post_blog.php" enctype="multipart/form-data">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required><br><br>

                    <label for="content">Content:</label>
                    <textarea id="content" name="content" required></textarea><br><br>

                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image"><br><br>

                    <input type="submit" class="btn" value="Submit">
                </form>

                <a href="../blogs.php" class="btn">Back to Posts</a>
            </div>
        </section>

        <!-- Footer section starts  -->
        <?php include '../footer_head2/footer2.php'; ?>
        <!-- Footer section ends -->

        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
        <!-- Js file link  -->
        <script src="../js/script.js"></script>        
    </body>
</html>
