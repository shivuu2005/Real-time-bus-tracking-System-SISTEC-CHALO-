<?php
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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $user);

    // Execute query
    $stmt->execute();
    
    // Get result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Username exists, fetch the hashed password
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verify password
        if (password_verify($pass, $hashed_password)) {
            echo "Login successful!";
            // Redirect to index2.html
            header("Location: index2.html");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid username.";
    }

    // Close statement
    $stmt->close();
}

$conn->close();
?>
