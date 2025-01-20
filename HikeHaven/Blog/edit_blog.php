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

// Retrieve the blog post to be edited
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

$row = $result->fetch_assoc();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newTitle = $_POST["title"];
    $newContent = $_POST["content"];

    // Update the blog post in the database using prepared statements
    $updateSql = "UPDATE blog_posts SET title = ?, content = ? WHERE id = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("ssi", $newTitle, $newContent, $blog_id);

    if ($updateStmt->execute()) {
        // Redirect to the edited blog post
        header("Location: ../blogs.php?id=" . $blog_id);
        exit();
    } else {
        // Provide an error message
        $errorMessage = "Error updating post: " . $updateStmt->error;
    }

    $updateStmt->close();
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

        <?php if (isset($errorMessage)) : ?>
            <div class="error-message"><?php echo $errorMessage; ?></div>
        <?php endif; ?>

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
            <content>
                <h2 class="heading">Edit Post</h2>
                <form method="post" action="edit_blog.php?id=<?php echo $blog_id; ?>">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" value="<?php echo $row["title"]; ?>" required><br><br>

                    <label for="content">Content:</label>
                    <textarea id="content" name="content" required><?php echo $row["content"]; ?></textarea><br><br>

                    <input type="submit" class="btn" value="Save Changes">
                </form>

                <a href="../blogs.php" class="btn">Back to Posts</a>
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
