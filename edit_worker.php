<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Worker</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        .message {
            margin-bottom: 10px;
            color: green;
        }
        .error-message {
            margin-bottom: 10px;
            color: red;
        }
    </style>
</head>
<body>
    <h1>Edit Worker</h1>
    <div id="message" class="message"></div>
    <div id="error-message" class="error-message"></div>
    <?php
    require_once 'db_connection.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM workers WHERE id='$id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
    }
    ?>
    <form id="editWorkerForm">
        <input type="hidden" id="id" value="<?php echo $row['id']; ?>">
        Name: <input type="text" id="name" value="<?php echo $row['name']; ?>" required><br>
        Email: <input type="email" id="email" value="<?php echo $row['email']; ?>" required><br>
        Phone: <input type="text" id="phone" value="<?php echo $row['phone']; ?>" required><br>
        Designation: <input type="text" id="designation" value="<?php echo $row['designation']; ?>" required><br>
        Salary: <input type="number" id="salary" value="<?php echo $row['salary']; ?>" required><br>
        Joining Date: <input type="date" id="joining_date" value="<?php echo $row['joining_date']; ?>" required><br>
        Address: <textarea id="address" required><?php echo $row['address']; ?></textarea><br>
        <input type="button" value="Update Worker" onclick="updateWorker()">
    </form>

    <script>
        function updateWorker() {
            var id = document.getElementById('id').value;
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var phone = document.getElementById('phone').value;
            var designation = document.getElementById('designation').value;
            var salary = document.getElementById('salary').value;
            var joiningDate = document.getElementById('joining_date').value;
            var address = document.getElementById('address').value;

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        document.getElementById('message').innerHTML = xhr.responseText;
                        document.getElementById('error-message').innerHTML = '';
                    } else {
                        document.getElementById('error-message').innerHTML = 'Error updating worker: ' + xhr.status;
                        document.getElementById('message').innerHTML = '';
                    }
                }
            };

            xhr.open('POST', 'edit_worker_process.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('id=' + id + '&name=' + name + '&email=' + email + '&phone=' + phone + '&designation=' + designation + '&salary=' + salary + '&joining_date=' + joiningDate + '&address=' + address);
        }
    </script>
</body>
</html>
