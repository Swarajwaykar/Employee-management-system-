<?php
require_once 'db_connection.php';

$query = "SELECT * FROM workers";
$result = mysqli_query($conn, $query);

echo '<h2>Worker List</h2>';
echo '<table>';
echo '<tr>';
echo '<th>Name</th>';
echo '<th>Email</th>';
echo '<th>Phone</th>';
echo '<th>Designation</th>';
echo '<th>Salary</th>';
echo '<th>Joining Date</th>';
echo '<th>Address</th>';
echo '<th>Action</th>';
echo '</tr>';

while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['name'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['phone'] . '</td>';
    echo '<td>' . $row['designation'] . '</td>';
    echo '<td>' . $row['salary'] . '</td>';
    echo '<td>' . $row['joining_date'] . '</td>';
    echo '<td>' . $row['address'] . '</td>';
    echo '<td><a href="edit_worker.php?id=' . $row['id'] . '">Edit</a></td>';
    echo '</tr>';
}

echo '</table>';

mysqli_close($conn);
?>
