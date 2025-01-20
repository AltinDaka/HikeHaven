<?php
session_start();

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

$sql = "SELECT packages.*, user.name AS author_name
    FROM packages
    INNER JOIN user ON packages.user_id = user.id
    ORDER BY packages.created_at DESC";

$result = $conn->query($sql);

// Display blog posts
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="package">';
        echo '<div class="package-info">';
        echo '<h2>' . $row["destination"] . '</h2>';
        echo '<p><strong>Accommodation:</strong> ' . $row["accommodation"] . '</p>';
        echo '<p><strong>Transportation:</strong> ' . $row["transportation"] . '</p>';
        echo '<p><strong>Activities:</strong> ' . $row["activities"] . '</p>';
        echo '<p><strong>Dining:</strong> ' . $row["dining"] . '</p>';
        echo '<p><strong>Travel Tips:</strong> ' . $row["travel_tips"] . '</p>';
        echo '<p><strong>Pricing:</strong> $' . $row["pricing"] . '</p>';
        echo '<p><strong>Contact:</strong> ' . $row["contact"] . '</p>';
        echo '<p><strong>Booking:</strong> ' . $row["booking"] . '</p>';
        echo '<div class="icons">';
        echo '<a href="#"> <i class="fas fa-calendar"></i> ' . $row["created_at"] . ' </a>';
        echo '<a href="#"> <i class="fas fa-user"></i> By ' . $row["author_name"] . ' </a>';
        echo '</div>';
        echo '</div>';

        // Display the image if available
        if (!empty($row["image"])) {
            echo '<div class="package-image">';
            echo '<img src="' . $row["image"] . '" alt="' . $row["destination"] . '">';
            echo '</div>';
        }

        // Check if the logged-in user is the author of the blog post
        echo '<div class="package-actions">';
        if (isset($_SESSION["user_id"]) && $row["user_id"] == $_SESSION["user_id"]) {
            echo '<a href="edit_packages.php?id=' . $row["id"] . '" class="btn">Edit Post</a>';
            echo '<a href="delete_packages.php?id=' . $row["id"] . '" class="btn">Delete</a>';
        } else {
            echo '<a href="../login.php" class="btn">Only ' . $row["author_name"] . ' can edit this post!</a>';
        }
        echo '</div>';

        echo '</div>';
    }
} else {
    echo "No posts available.";
}

// Close the database connection
$conn->close();
?>