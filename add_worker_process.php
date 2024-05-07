<?php
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $designation = $_POST['designation'];
    $salary = $_POST['salary'];
    $joiningDate = $_POST['joining_date'];
    $address = $_POST['address'];

    $query = "INSERT INTO workers (name, email, phone, designation, salary, joining_date, address) VALUES ('$name', '$email', '$phone', '$designation', '$salary', '$joiningDate', '$address')";

    if (mysqli_query($conn, $query)) {
        // Get updated worker list HTML
        ob_start();
        include 'worker_list.php'; // This should be the same file used in the homepage
        $workerListHTML = ob_get_clean();

        // Return updated worker list HTML only
        echo $workerListHTML;
    } else {
        echo "Error adding worker: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
