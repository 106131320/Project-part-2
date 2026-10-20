<?php
// Database credentials for local server
$host = "localhost";
$user = "root"; // These credentials are simply for accenessing the pages, they do not need a password. These are not the credentials used to log in. 
$pwd = "";
$sql_db = "database";

// Establish database connection
mysqli_report(MYSQLI_REPORT_OFF);
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

// Check connection
if (!$conn) {
    error_log("DB connection failed (" . mysqli_connect_errno() . "): " . mysqli_connect_error());
    echo "<p>" . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>";
    die("<p>Unable to connect to the db. Please try again later.</p>");
}
?>