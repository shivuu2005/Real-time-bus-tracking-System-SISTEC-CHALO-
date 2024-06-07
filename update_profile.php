<?php
$conn = mysqli_connect("localhost", "root", "", "sistec_db");

if (!$conn) {
  die("Connection failed: ". mysqli_connect_error());
}

$name = $_POST["name"];
$bio = $_POST["bio"];
$branch = $_POST["branch"];
$enrollment = $_POST["enrollment"];
$college = $_POST["college"];

$sql = "UPDATE profiles
        SET `name` = '$name', `bio` = '$bio', `branch` = '$branch', `enrollment` = '$enrollment', `college` = '$college'
        WHERE `id` = 1";

if (mysqli_query($conn, $sql)) {
  echo "Profile updated successfully";
  // Empty the form fields
  $_POST = array();
  // Redirect to user profile page
  header("Location: userprofile.php");
  exit;
} else {
  echo "Error: ". $sql. "<br>". mysqli_error($conn);
}

mysqli_close($conn);
?>