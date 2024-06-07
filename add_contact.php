<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $studentName = $_POST['studentName'];
    $branch = $_POST['branch'];
    $enrollmentNo = $_POST['enrollmentNo'];
    $mobilenumber = $_POST['mobilenumber'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $created_at = date('Y-m-d H:i:s');

    $sql = "INSERT INTO contacts (studentName, branch, enrollmentNo, mobilenumber, email, message, created_at)
            VALUES ('$studentName', '$branch', '$enrollmentNo', '$mobilenumber', '$email', '$message', '$created_at')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="POST" action="add_contact.php">
    Name: <input type="text" name="studentName"><br>
    Branch: <input type="text" name="branch"><br>
    Enrollment No: <input type="text" name="enrollmentNo"><br>
    Mobile Number: <input type="text" name="mobilenumber"><br>
    Email: <input type="text" name="email"><br>
    Message: <textarea name="message"></textarea><br>
    <input type="submit" value="Submit">
</form>
