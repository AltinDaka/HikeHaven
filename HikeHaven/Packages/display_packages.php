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

// Query to retrieve tourist packages
$sql = "SELECT * FROM packages";
$result = $conn->query($sql);

?>


<!-- Main content area -->
<main>
    <section class="packages" id="packages">
        <h1 class="heading">Other Packages</h1>
        <div class="box-container">
            <?php
            // Check if there are packages to display
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="box">';
                    echo '<div class="image">';
                    if (!empty($row["image"])) {
                        echo '<img src="' . $row["image"] . '" alt="' . $row["destination"] . '">';
                    }
                    echo '</div>';
                    echo '<div class="content">';
                    echo '<h3>' . $row["destination"] . '</h3>';
                    echo '<p>' . $row["activities"] . '<br>' . $row["travel_tips"] . '</p>';
                    echo '<div class="price">$' . $row["pricing"] . '</div>';
                    echo '<a href="packages/full_display_packages.php" class="btn">Explore More</a>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No tourist packages available.</p>';
            }
            ?>
        </div>
    </section>
</main>
<?php
// Close the database connection
$conn->close();
?>
