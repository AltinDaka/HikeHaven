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

$sql = "SELECT blog_posts.*, user.name AS author_name
    FROM blog_posts
    INNER JOIN user ON blog_posts.user_id = user.id
    ORDER BY blog_posts.created_at DESC";

$result = $conn->query($sql);

// Display blog posts
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="swiper-slide slide">';
        
        // Check if there's an image associated with the blog post
        if (!empty($row["image"])) {
            // Output the image after sanitizing
            $sanitizedImage = htmlspecialchars($row["image"]);
            echo '<img src="' . $sanitizedImage . '" alt="Post Image">';
        }

        echo '<div class="icons">';
        echo '<a href="#"> <i class="fas fa-calendar"></i> ' . htmlspecialchars($row["created_at"]) . ' </a>';
        echo '<a href="#"> <i class="fas fa-user"></i> By ' . htmlspecialchars($row["author_name"]) . ' </a>';
        echo '</div>';
        echo '<h3>' . htmlspecialchars($row["title"]) . '</h3>';
        echo '<p>' . htmlspecialchars($row["content"]) . '</p>';

        // Check if the logged-in user is the author of the blog post
        if (isset($_SESSION["user_id"]) && $row["user_id"] == $_SESSION["user_id"]) {
            echo '<a href="blog/edit_blog.php?id=' . $row["id"] . '" class="btn">Edit Post</a>';
            echo '<a href="blog/delete_blog.php?id=' . $row["id"] . '" class="btn">Delete</a>';
        } else {
            echo '<a href="#" class="btn">Only ' . htmlspecialchars($row["author_name"]) . ' can edit this post!</a>';
        }
        echo '</div>';
    }
} else {
    echo "No posts available.";
}

// Close the database connection
$conn->close();
?>
