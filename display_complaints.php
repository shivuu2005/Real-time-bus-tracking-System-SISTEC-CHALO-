<?php
include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: #f4f4f4;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f1f1f1;
}

form {
    margin-bottom: 20px;
}

form input[type="text"], form textarea {
    width: 100%;
    padding: 10px;
    margin: 5px 0 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

form input[type="submit"] {
    padding: 10px 20px;
    border: none;
    background-color: #28a745;
    color: white;
    cursor: pointer;
    border-radius: 4px;
}

form input[type="submit"]:hover {
    background-color: #218838;
}

    </style>
</head>
<body>
    <h1>Complaints List</h1>
    <?php
    $sql = "SELECT id, studentName, branch, enrollmentNo, busNo, driverName, complaintDate, incidentDetails FROM complaints";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Branch</th>
                    <th>Enrollment No</th>
                    <th>Bus No</th>
                    <th>Driver Name</th>
                    <th>Complaint Date</th>
                    <th>Incident Details</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['studentName']}</td>";
            echo "<td>{$row['branch']}</td>";
            echo "<td>{$row['enrollmentNo']}</td>";
            echo "<td>{$row['busNo']}</td>";
            echo "<td>{$row['driverName']}</td>";
            echo "<td>{$row['complaintDate']}</td>";
            echo "<td>{$row['incidentDetails']}</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No complaints found</p>";
    }

    $conn->close();
    ?>
</body>
</html>
