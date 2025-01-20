<?php
session_start();

// Check if the user is authenticated
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit();
}

// Check if the 'id' parameter is provided in the URL
if (!isset($_GET["id"])) {
    header("Location: ../package.php");
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

// Retrieve the package post to be edited
$package_id = $_GET["id"];
$user_id = $_SESSION["user_id"];

$sql = "SELECT * FROM packages WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $package_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    // The user is not the author of the package post or the package post does not exist
    header("Location: ../package.php");
    exit();
}

$row = $result->fetch_assoc();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newDestination = $_POST["destination"];
    $newAccommodation = $_POST["accommodation"];
    $newTransportation = $_POST["transportation"];
    $newActivities = $_POST["activities"];
    $newDining = $_POST["dining"];
    $newTravel_tips = $_POST["travel_tips"];
    $newPricing = $_POST["pricing"];
    $newContact = $_POST["contact"];
    $newBooking = $_POST["booking"];

    // Update the blog post in the database
    $updateSql = "UPDATE packages SET destination = ?, accommodation = ?, transportation = ?, activities = ?, dining = ?, travel_tips = ?, pricing = ?, contact = ?, booking = ? WHERE id = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("ssssssdssi", $newDestination, $newAccommodation, $newTransportation, $newActivities, $newDining, $newTravel_tips, $newPricing, $newContact, $newBooking, $package_id);

    if ($updateStmt->execute()) {
        header("Location: ../package.php");
        exit();
    } else {
        echo "Error updating post: " . $updateStmt->error;
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
                <h2 class="heading">Edit Packages</h2>
                <form method="post" action="edit_packages.php?id=<?php echo $package_id; ?>">
                    <label for="destination">Destination:</label>
                    <input type="text" id="destination" name="destination" value="<?php echo $row["destination"]; ?>" required><br>

                    <label for="accommodation">Accommodation:</label>
                    <input type="text" id="accommodation" name="accommodation" value="<?php echo $row["accommodation"]; ?>" required><br>

                    <label for="transportation">Transportation:</label>
                    <input type="text" id="transportation" name="transportation" value="<?php echo $row["transportation"]; ?>" required><br>

                    <label for="activities">Activities and Attractions:</label>
                    <textarea id="activities" name="activities" rows="4" required><?php echo $row["activities"]; ?></textarea><br>

                    <label for="dining">Dining and Cuisine:</label>
                    <input type="text" id="dining" name="dining" value="<?php echo $row["dining"]; ?>" required><br>

                    <label for="travel_tips">Travel Tips and Practical Information:</label>
                    <textarea id="travel_tips" name="travel_tips" rows="4" required><?php echo $row["travel_tips"]; ?></textarea><br>

                    <label for="pricing">Pricing:</label>
                    <input type="number" id="pricing" name="pricing" value="<?php echo $row["pricing"]; ?>" required><br>

                    <label for="contact">Contact Information:</label>
                    <input type="text" id="contact" name="contact" value="<?php echo $row["contact"]; ?>" required><br>

                    <label for="booking">Booking and Reservation Details:</label>
                    <textarea id="booking" name="booking" rows="4" required><?php echo $row["booking"]; ?></textarea><br>

                    <input type="submit" class="btn" value="Save Changes">
                </form>

                <a href="full_display_packages.php" class="btn">Back to Packages</a>
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