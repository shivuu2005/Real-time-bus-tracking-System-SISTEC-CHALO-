<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistec_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$studentName = $_POST['studentName'];
$branch = $_POST['branch'];
$enrollmentNo = $_POST['enrollmentNo'];
$busNo = $_POST['busNo'];
$driverName = $_POST['driverName'];
$complaintDate = $_POST['complaintDate'];
$incidentDetails = $_POST['incidentDetails'];

// Sanitize form data (prevent SQL injection)
$studentName = mysqli_real_escape_string($conn, $studentName);
$branch = mysqli_real_escape_string($conn, $branch);
$enrollmentNo = mysqli_real_escape_string($conn, $enrollmentNo);
$busNo = mysqli_real_escape_string($conn, $busNo);
$driverName = mysqli_real_escape_string($conn, $driverName);
$complaintDate = mysqli_real_escape_string($conn, $complaintDate);
$incidentDetails = mysqli_real_escape_string($conn, $incidentDetails);

// Insert data into database
$sql = "INSERT INTO complaints (studentName, branch, enrollmentNo, busNo, driverName, complaintDate, incidentDetails)
        VALUES ('$studentName', '$branch', '$enrollmentNo', '$busNo', '$driverName', '$complaintDate', '$incidentDetails')";

if ($conn->query($sql) === TRUE) {
    echo "Thank you! Your complaint has been successfully recorded.";
} else {
    echo "Oops! Something went wrong. Please try again later.";
}

$conn->close();
?>
