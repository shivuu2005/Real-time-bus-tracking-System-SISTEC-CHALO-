<!DOCTYPE html>
<html>
<head>
  <title>Add Driver</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center mb-4">Add Driver</h1>
    <div class="row">
      <div class="col-md-6 offset-md-3">
      <?php $name = ""; $mobile_no = ""; $email = ""; $adhar = ""; $licence = ""; $bus_no = ""; 
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
       $name = $_POST["name"];
       $mobile_no = $_POST["mobile_no"];
       $email = $_POST["email"];
       $adhar = $_POST["adhar"];
       $licence = $_POST["licence"];
       $bus_no = $_POST["bus_no"];
 
       $sql = "INSERT INTO drivers (name, mobile_no, email, adhar, licence, bus_no) VALUES (?, ?, ?, ?, ?, ?)";
       $stmt = $conn->prepare($sql);
       $stmt->bind_param("sisiss", $name, $mobile_no, $email, $adhar, $licence, $bus_no);
 
       if ($stmt->execute()) {
         echo "<div class='alert alert-success'>New driver added successfully!</div>";
       } else {
         echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
       }
 
       // Clear form fields
       $name = "";
       $mobile_no = "";
       $email = "";
       $adhar = "";
       $licence = "";
       $bus_no = "";
     }
 
     $sql = "SELECT * FROM drivers";
     $result = $conn->query($sql);
     ?>
     <form method="post">
       <div class="mb-3">
         <label for="name" class="form-label">Name:</label>
         <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>" class="form-control" required>
       </div>
       <div class="mb-3">
         <label for="mobile_no" class="form-label">Mobile No:</label>
         <input type="tel" name="mobile_no" id="mobile_no" value="<?php echo htmlspecialchars($mobile_no); ?>" class="form-control" required>
       </div>
       <div class="mb-3">
         <label for="email" class="form-label">Email:</label>
         <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" class="form-control" required>
       </div>
       <div class="mb-3">
         <label for="adhar" class="form-label">Adhar:</label>
         <input type="text" name="adhar" id="adhar" value="<?php echo htmlspecialchars($adhar); ?>" class="form-control" required>
       </div>
       <div class="mb-3">
         <label for="licence" class="form-label">Licence:</label>
         <input type="text" name="licence" id="licence" value="<?php echo htmlspecialchars($licence); ?>" class="form-control" required>
       </div>
       <div class="mb-3">
         <label for="bus_no" class="form-label">Bus No:</label>
         <input type="text" name="bus_no" id="bus_no" value="<?php echo htmlspecialchars($bus_no); ?>"class="form-control" required>
       </div>
       <button type="submit" class="btn btn-primary">Add Driver</button>
     </form>
     <?php
     if ($result->num_rows > 0) {
       // output data of each row
       echo "<table class='table mt-4'>
               <tr>
                 <th>ID</th>
                 <th>Name</th>
                 <th>Mobile No</th>
                 <th>Email</th>
                 <th>Adhar</th>
                 <th>Licence</th>
                 <th>Bus No</th>
               </tr>";
       while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["id"]. "</td><td>" . htmlspecialchars($row["name"]). "</td><td>" . htmlspecialchars($row["mobile_no"]). "</td><td>" . htmlspecialchars($row["email"]). "</td><td>" . htmlspecialchars($row["adhar"]). "</td><td>" . htmlspecialchars($row["licence"]). "</td><td>" . htmlspecialchars($row["bus_no"]). "</td></tr>";
       }
       echo "</table>";
     } else {
       echo "<div class='alert alert-info mt-4'>0 results</div>";
     }
 
     $conn->close();
     ?>
   </div>
 </div>
  </div>
</body>
</html>