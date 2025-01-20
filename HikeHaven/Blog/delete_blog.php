<?php
session_start();

// Check if the user is authenticated
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit();
}

// Check if the 'id' parameter is provided in the URL
if (!isset($_GET["id"])) {
    header("Location: ../blogs.php");
    exit();
}

// Database configuration
$db_host = "localhost";
$db_user = "root";
$db_pass = "leuard098";
$db_name = "hikehaven";

// Connect to the database
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the blog post to be deleted
$blog_id = $_GET["id"];
$user_id = $_SESSION["user_id"];

$sql = "SELECT * FROM blog_posts WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $blog_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    // The user is not the author of the blog post or the blog post does not exist
    header("Location: ../blogs.php");
    exit();
}

// Handle blog post deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirm_delete"])) {
    // Delete the blog post from the database
    $deleteSql = "DELETE FROM blog_posts WHERE id = ?";
    $deleteStmt = $conn->prepare($deleteSql);
    $deleteStmt->bind_param("i", $blog_id);

    if ($deleteStmt->execute()) {
        header("Location: ../blogs.php");
        exit();
    } else {
        echo "Error deleting blog post: " . $deleteStmt->error;
    }

    $deleteStmt->close();
}

// Close the database connection
$conn->close();
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
                <a href="../shop.php" class="fas fa-shopping-cart"></a>
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
            <content style="text-align: center;">
                <h2 class="heading">Delete Post</h2>
                <p style="font-size: 20px; color: red;">Are you sure you want to delete this post?</p>
                <form method="post">
                    <input type="hidden" name="confirm_delete" value="1">
                    <input type="submit" class="btn" value="Yes, Delete">
                    <a href="../blogs.php" class="btn">Cancel</a>
                </form>
            </content>
        </section>
        <br>
        <br>
        <br>

        <?php include '../footer_head2/footer2.php'; ?>

        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
        <!-- Js file link  -->
        <script src="../js/script.js"></script>
    </body>
</html>
