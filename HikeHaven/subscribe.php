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

// Initialize the subscription message variable
$subscriptionMessage = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    $email = $_POST["email"];

    // Insert the email into the subscribers table
    $sql = "INSERT INTO subscribers (email) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        // Subscription successful
        $subscriptionMessage = "Thank you for subscribing!";
        echo '<a href="index.php">Go Back</a><br>';
    } else {
        // Subscription failed
        $subscriptionMessage = "Subscription failed. Please try again later.";
        echo '<a href="index.php">Go Back</a><br>';
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!-- Display the subscription message without HTML -->
<?php
if (!empty($subscriptionMessage)) {
    echo $subscriptionMessage;
}
?>
