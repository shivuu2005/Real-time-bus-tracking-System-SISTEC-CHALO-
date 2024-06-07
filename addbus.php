<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Add new bus form -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h2>Add New Bus</h2>
            <label for="bus_number">Bus Number:</label>
            <input type="text" id="bus_number" name="bus_number" required><br><br>
            <label for="rto">RTO:</label>
            <input type="text" id="rto" name="rto" required><br><br>
            <label for="registration_number">Registration Number:</label>
            <input type="text" id="registration_number" name="registration_number" required><br><br>
            <label for="insurance_details">Insurance Details:</label>
            <textarea id="insurance_details" name="insurance_details" required></textarea><br><br>
            <label for="sitting_capacity">Sitting Capacity:</label>
            <input type="number" id="sitting_capacity" name="sitting_capacity" required><br><br>
            <label for="permit">Permit:</label>
            <input type="text" id="permit" name="permit" required><br><br>
            <input type="submit" name="add_bus" value="Add Bus" required>
        </form><br>
        <hr color="red">

        <h1>Bus Details</h1>

        <?php
        // Connect to the database
        $conn = mysqli_connect("localhost", "root", "", "sistec_db");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Add new bus details
        if (isset($_POST['add_bus'])) {
            $bus_number = $_POST['bus_number'];
            $rto = $_POST['rto'];
            $registration_number = $_POST['registration_number'];
            $insurance_details = $_POST['insurance_details'];
            $sitting_capacity = $_POST['sitting_capacity'];
            $permit = $_POST['permit'];

            $query = "INSERT INTO buses (bus_number, rto, registration_number, insurance_details, sitting_capacity, permit) VALUES ('$bus_number', '$rto', '$registration_number', '$insurance_details', '$sitting_capacity', '$permit')";
            mysqli_query($conn, $query);
        }

        // Display existing bus details
        $query = "SELECT * FROM buses";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Bus Number</th><th>RTO</th><th>Registration Number</th><th>Insurance Details</th><th>Sitting Capacity</th><th>Permit</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['bus_number'] . "</td>";
                echo "<td>" . $row['rto'] . "</td>";
                echo "<td>" . $row['registration_number'] . "</td>";
                echo "<td>" . $row['insurance_details'] . "</td>";
                echo "<td>" . $row['sitting_capacity'] . "</td>";
                echo "<td>" . $row['permit'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No buses found.";
        }

        // Close connection
        mysqli_close($conn);
        ?>

        
    </div>
</body>
</html>
