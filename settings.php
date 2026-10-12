<?php
// Database credentials for local server
define('DB_HOST', 'localhost'); 
define('DB_USER', 'root'); // These credentials are simply for accenessing the pages, they do not need a password. These are not the credentials used to log in. 
define('DB_PASSWORD', '');
define('DB_NAME', 'database');

// Establish database connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {

}
?>