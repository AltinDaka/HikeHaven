<?php
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

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit();
}


// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"];
    $destination = $_POST["destination"];
    $transportation = $_POST["transportation"];
    $accommodation = $_POST["accommodation"];
    $activities = $_POST["activities"];
    $dining = $_POST["dining"];
    $travel_tips = $_POST["travel_tips"];
    $pricing = $_POST["pricing"];
    $contact = $_POST["contact"];
    $booking = $_POST["booking"];

    // Check for file upload errors
    if ($_FILES["image"]["error"] > 0) {
        echo "File Upload Error: " . $_FILES["image"]["error"];
    } else {
        // Handle the file upload and database insertion as previously shown

        // Handle image upload
        $imageDir = "../images/"; // Directory where you want to store uploaded images
        $imageName = $_FILES["image"]["name"];

        if (!empty($imageName)) {
            $imagePath = $imageDir . $imageName;
            $moveResult = move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);

            if (!$moveResult) {
                echo "Image upload failed. Debug information: " . print_r($_FILES, true);
            }
        } else {

            $imagePath = null; // No image uploaded
        }

        // Insert the package post into the database, including the image path
        $sql = "INSERT INTO packages (user_id, destination, accommodation, transportation, activities, dining, travel_tips, pricing, contact, booking, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issssssdsss", $user_id, $destination, $accommodation, $transportation, $activities, $dining, $travel_tips, $pricing, $contact, $booking, $imagePath);


        if ($stmt->execute()) {
            header("Location: ../package.php"); // Redirect back to the package page
            exit();
        } else {
            echo "Database insertion failed. Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>
