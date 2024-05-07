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

    $query = "INSERT INTO workers (name, email, phone, designation, salary, joining_date, address) 
              VALUES ('$name', '$email', '$phone', '$designation', '$salary', '$joiningDate', '$address')";

    if (mysqli_query($conn, $query)) {
        // Fetch details of the newly added worker
        $newWorkerQuery = "SELECT * FROM workers WHERE name='$name' AND email='$email'";
        $result = mysqli_query($conn, $newWorkerQuery);
        if ($result && mysqli_num_rows($result) > 0) {
            $newWorker = mysqli_fetch_assoc($result);
            // Display the details of the newly added worker
            echo '<div id="new-worker">';
            echo 'New Worker Added:';
            echo '<ul>';
            echo '<li>Name: ' . $newWorker['name'] . '</li>';
            echo '<li>Email: ' . $newWorker['email'] . '</li>';
            echo '<li>Phone: ' . $newWorker['phone'] . '</li>';
            echo '<li>Designation: ' . $newWorker['designation'] . '</li>';
            echo '<li>Salary: ' . $newWorker['salary'] . '</li>';
            echo '<li>Joining Date: ' . $newWorker['joining_date'] . '</li>';
            echo '<li>Address: ' . $newWorker['address'] . '</li>';
            echo '</ul>';
            echo '</div>';
        } else {
            echo 'New worker details not found.';
        }
    } else {
        echo "Error adding worker: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
