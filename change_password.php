<?php
// Connect to your database
$conn = mysqli_connect("localhost", "root", "", "sistec_db");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Define the $users array
$users = array(
    array('id' => '1', 'username' => 'shivam1', 'password' => '$2y$10$MTIb8jZwqIFNN.StVyb79eJrPtx1HGmJjDiDS6C1.d1cYaiigypJu')
);

// Get the current password, new password, and confirm new password from the form
$current_password = $_POST['password'];
$new_password = $_POST['new-password'];
$confirm_password = $_POST['confirm-password'];

// Check if the current password is correct
$user_id = 1; // assuming the user ID is 1, you should get this from the session or login system
$current_password_hash = $users[$user_id-1]['password']; // get the current password hash from the database
if (password_verify($current_password, $current_password_hash)) {
    // Check if the new password and confirm new password match
    if ($new_password == $confirm_password) {
        // Hash the new password
        $new_password_hash = password_hash($new_password, PASSWORD_BCRYPT);
        
        // Update the password in the database
        $query = "UPDATE users SET password = '$new_password_hash' WHERE id = $user_id";
        mysqli_query($conn, $query);
        
        echo "Password changed successfully!";
    } else {
        echo "New password and confirm new password do not match.";
    }
} else {
    echo "Current password is incorrect.";
}

mysqli_close($conn);
?>