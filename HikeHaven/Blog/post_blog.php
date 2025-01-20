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
    $title = $_POST["title"];
    $content = $_POST["content"];
    $user_id = $_SESSION["user_id"];

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

        // Insert the blog post into the database, including the image path
        $sql = "INSERT INTO blog_posts (title, content, user_id, image) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssis", $title, $content, $user_id, $imagePath);

        if ($stmt->execute()) {
            header("Location: ../blogs.php"); // Redirect back to the blog page
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
