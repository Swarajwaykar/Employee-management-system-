<?php
require_once 'db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM workers WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        echo "Worker deleted successfully.";
    } else {
        echo "Error deleting worker: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}

mysqli_close($conn);
?>
