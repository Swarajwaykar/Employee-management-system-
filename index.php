<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker Management System</title>
</head>
<body>
    <?php
    // Include database connection
    require_once 'db_connection.php';
    ?>

    <h1>Add Worker</h1>
    <form action="add_worker.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br><br>
        <label for="designation">Designation:</label>
        <input type="text" id="designation" name="designation" required><br><br>
        <label for="salary">Salary:</label>
        <input type="number" id="salary" name="salary" required><br><br>
        <label for="joining_date">Joining Date:</label>
        <input type="date" id="joining_date" name="joining_date" required><br><br>
        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea><br><br>
        <input type="submit" value="Add Worker">
    </form>

    <!-- Worker List Section -->
    <h1>Worker List</h1>
    <div id="workerList">
        <?php include 'worker_list.php'; ?>
    </div>
</body>
</html>
