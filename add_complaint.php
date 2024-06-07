<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $studentName = $_POST['studentName'];
    $branch = $_POST['branch'];
    $enrollmentNo = $_POST['enrollmentNo'];
    $busNo = $_POST['busNo'];
    $driverName = $_POST['driverName'];
    $complaintDate = $_POST['complaintDate'];
    $incidentDetails = $_POST['incidentDetails'];

    $sql = "INSERT INTO complaints (studentName, branch, enrollmentNo, busNo, driverName, complaintDate, incidentDetails)
            VALUES ('$studentName', '$branch', '$enrollmentNo', '$busNo', '$driverName', '$complaintDate', '$incidentDetails')";

    if ($conn->query($sql) === TRUE) {
        echo "New complaint added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="POST" action="add_complaint.php">
    Name: <input type="text" name="studentName" required><br>
    Branch: <input type="text" name="branch" required><br>
    Enrollment No: <input type="text" name="enrollmentNo" required><br>
    Bus No: <input type="text" name="busNo" required><br>
    Driver Name: <input type="text" name="driverName" required><br>
    Complaint Date: <input type="date" name="complaintDate" required><br>
    Incident Details: <textarea name="incidentDetails" required></textarea><br>
    <input type="submit" value="Submit">
</form>
