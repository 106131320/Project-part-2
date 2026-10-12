<?php
// Database credentials for local server
define('DB_HOST', 'localhost'); //This line establishes where the databse is located. If moved into production this would need to be changed
define('DB_USER', 'root'); // These credentials are simply for accenessing the pages, hence why they do not need a password. These are not the credentials used to log in. However given database access is open, any passwords stored in the database should be properly hashed
define('DB_PASSWORD', '');
define('DB_NAME', 'database');

// Establish database connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Optional message for testing
    // echo "<p style='color:green;'>Database connection successful!</p>";
}
?>