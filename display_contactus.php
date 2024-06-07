<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            margin: 20px 0;
            color: #444;
        }
        table {
            width: 90%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #555;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .container {
            padding: 20px;
        }
        .message {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Contact Information</h2>
        <?php
        include 'db_connect.php';

        $sql = "SELECT id, studentName, branch, enrollmentNo, mobilenumber, email, message, created_at FROM contacts";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Branch</th>
                        <th>Enrollment No</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Created At</th>
                    </tr>";

            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['studentName']}</td>";
                echo "<td>{$row['branch']}</td>";
                echo "<td>{$row['enrollmentNo']}</td>";
                echo "<td>{$row['mobilenumber']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['message']}</td>";
                echo "<td>{$row['created_at']}</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p class='message'>No results found</p>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
