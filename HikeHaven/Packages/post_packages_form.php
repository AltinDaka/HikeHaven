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
        <!-- Header section starts  -->
        <?php include '../footer_head2/header2.php'; ?>
        <br>
        <br>
        <br>

        <section>
            <content>
                <h1 class="heading">Post Tourist Package</h1>
                <form action="post_packages.php" method="post" enctype="multipart/form-data">
                    <label for="destination">Destination:</label>
                    <input type="text" id="destination" name="destination" required><br>

                    <label for="accommodation">Accommodation:</label>
                    <input type="text" id="accommodation" name="accommodation" required><br>

                    <label for="transportation">Transportation:</label>
                    <input type="text" id="transportation" name="transportation" required><br>

                    <label for="activities">Activities and Attractions:</label>
                    <textarea id="activities" name="activities" rows="4" required></textarea><br>

                    <label for="dining">Dining and Cuisine:</label>
                    <input type="text" id="dining" name="dining" required><br>

                    <label for="travel_tips">Travel Tips and Practical Information:</label>
                    <textarea id="travel_tips" name="travel_tips" rows="4" required></textarea><br>

                    <label for="pricing">Pricing:</label>
                    <input type="number" id="pricing" name="pricing" required><br>

                    <label for="contact">Contact Information:</label>
                    <input type="text" id="contact" name="contact" required><br>

                    <label for="booking">Booking and Reservation Details:</label>
                    <textarea id="booking" name="booking" rows="4" required></textarea><br>

                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image"><br><br>

                    <input type="submit"class="btn" value="Post Package">
                </form>
                <a href="full_display_packages.php" class="btn">Back to Posts</a>
            </content>
        </section>
        

        <!-- Footer section starts  -->
        <?php include '../footer_head2/footer2.php'; ?>

        <!-- Footer section ends -->
        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
        <!-- Js file link  -->
        <script src="../js/script.js"></script>
    </body>
</html>
