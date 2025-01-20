<?php

session_start();

$host = "localhost";
$dbname = "hikehaven";
$username = "root";
$password = "leuard098";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

if (isset($_SESSION["user_id"])) {
    
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
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/trailstyle.css">

    </head>
    <body>
        <!-- Header section starts  -->
        <?php include '../footer_head2/header2.php'; ?>    


        <!-- Page section starts -->
        <div class="idk">
            <div class="main-image">
                <img src="../images/category-4.jpg" alt="Bobotov Kuk">
    
                <h1>Bobotov Kuk</h1>
                <div class="second">
                    <div class="desc">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique quae placeat adipisci hic molestias veniam eius voluptate eveniet unde, dolore velit dignissimos harum sint, ullam alias deleniti atque corrupti earum nihil itaque? Vitae quos nulla culpa fuga amet consequatur qui.</p>
                    </div>
                    <div class="trail">
                        <h1>Route:</h1>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11775.8244715321!2d19.878805793899918!3d42.449949771975234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13526853b5484c07%3A0xd25003d30b8ad1f!2zVmFsYm9uw6ssIFNocWlww6tyaWE!5e0!3m2!1ssq!2s!4v1693827777281!5m2!1ssq!2s" width="1000" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

        <!-- Js file link  -->
        <script src="../js/script.js"></script>

    </body>
</html>