<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "worker_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to check if the connection is still valid
function isConnectionValid($connection) {
    return ($connection instanceof mysqli) && !$connection->connect_errno;
}

// Function to close the connection if it is valid and open
function closeConnection($connection) {
    if (isConnectionValid($connection)) {
        $connection->close();
    }
}
?>
