<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistec_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$studentName = $_POST['studentName'];
$branch = $_POST['branch'];
$enrollmentNo = $_POST['enrollmentNo'];
$mobilenumber = $_POST['mobilenumber'];
$email = $_POST['email'];
$message = $_POST['incidentDetails'];

// Sanitize form data (prevent SQL injection)
$studentName = mysqli_real_escape_string($conn, $studentName);
$branch = mysqli_real_escape_string($conn, $branch);
$enrollmentNo = mysqli_real_escape_string($conn, $enrollmentNo);
$mobilenumber = mysqli_real_escape_string($conn, $mobilenumber);
$email = mysqli_real_escape_string($conn, $email);
$message = mysqli_real_escape_string($conn, $message);

// Insert data into database
$sql = "INSERT INTO contacts (studentName, branch, enrollmentNo, mobilenumber, email, message)
        VALUES ('$studentName', '$branch', '$enrollmentNo', '$mobilenumber', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
