<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="static/comman.css">
    
</head>
<style>
    .body {
        position: relative;
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        height: 100vh;
    }
    .password-container {
            position: relative;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    .profile-card {
        background-image: url("/userpanel/img/cover.jpg");
        background-size: 300px 150px;
        background-repeat: no-repeat;
        position: relative;
        border-radius: 10px;
        box-shadow: 5px 2px 7px rgba(255, 46, 46, 0.936);
        width: 300px;
        text-align: center;
        margin: 20px auto;
        padding: 30px;
    }

    .profile-image img {
        border-radius: 50%;
        width: 150px;
        height: 150px;
        object-fit: cover;
    }

    .profile-info {
        margin-top: 20px;
    }

    .profile-name {
        font-size: 24px;
        margin: 0;
        color: #333;
    }

    .profile-bio {
        font-size: 16px;
        color: #777;
        margin: 10px 0;
        line-height: 1.7;
    }

    .profile-social {
        margin-top: 20px;
    }

    .button {
        font-size: 15px;
        color: #000000;
        margin: 6px auto;
        padding: 4px 16px;
        border: 1px rgb(168, 22, 22) solid;
        border-radius: 10px;
        background: rgb(16, 218, 50);
        cursor: pointer;
    }

    .button:hover {
        background-color: #7cf182;
    }

    .input-field {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        
    }
    

    form {
        text-align: left;
    }

    form label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
    }
    .profile-info2{
        position: relative;
        border-radius: 10px;
        box-shadow: 5px 2px 7px rgba(255, 46, 46, 0.936);
        width: 300px;
        text-align: center;
        margin: 20px auto;
        padding: 30px;
    }
</style>
<header>
    <nav class="navbar">
        <div class="container">
            <div class="col1">
                <a href="/index2.html"><img src="static/img/logo.png"></a>
            </div>
            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="col2">
                 
                <a href="index2.html"><button class="button">Home</button></a>
                <a href="search.html"><button class="button">Bus Info.</button></a>
                <a href="buslocation.html"><button class="button">Bus Location</button></a>
                <a href="complaint.html"><button class="button">Complaint</button></a>
                <a href="aboutus.html"><button class="button">About Us</button></a>
                <a href="contactus.html"><button class="button">Contact Us</button></a>
                <a href="userprofile.html"><button class="button">Profile</button></a>
                <script>
                    document.querySelector('.menu-toggle').addEventListener('click', function() {
                        document.querySelector('.col2').classList.toggle('active');
                    });
                </script>
            </div>
        </div>
    </nav>
</header>
<body class="body">
    <div class="profile-card">
        <div class="blur"></div>
       
        <div class="profile-info">
          <!-- index.html -->
<?php
// Fetch profile data from database
$conn = mysqli_connect("localhost", "root", "", "sistec_db");
if (!$conn) {
  die("Connection failed: ". mysqli_connect_error());
}

$sql = "SELECT * FROM profiles WHERE id = 1";
$result = mysqli_query($conn, $sql);
$profile_data = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>

<form method="post" action="update_profile.php">
 
  <label for="name">Name</label>
  <input type="text" id="name" class="input-field" value="<?php echo $profile_data['name']; ?>" name="name">
  
  <label for="bio">Bio</label>
  <input type="text" id="bio" class="input-field" value="<?php echo $profile_data['bio']; ?>" name="bio">
  
  <label for="branch">Branch</label>
  <input type="text" id="branch" class="input-field" value="<?php echo $profile_data['branch']; ?>" name="branch">
  
  <label for="enrollment">Enrollment No.</label>
  <input type="text" id="enrollment" class="input-field" value="<?php echo $profile_data['enrollment']; ?>" name="enrollment">
  
  <label for="college">College</label>
  <input type="text" id="college" class="input-field" value="<?php echo $profile_data['college']; ?>" name="college">
  
  <button class="button" type="submit">Save Changes</button>
</form>

        </div>
        <form action="change_password.php" method="post">
        <action></action>
    </div>
    <div class="profile-info2">
       <h2>change password</h2><br><br>
       <label for="password">Current Password</label>
       <input type="password" id="password" class="input-field" name="password">
   
    <label for="password">New Password</label>
    <input type="password" id="password" class="input-field" name="new-password">

    <label for="confirm-password">Confirm New Password</label>
    <input type="password" id="confirm-password" class="input-field" name="confirm-password">
    
    <button class="button" type="submit">Change Password</button>
</div>
</form>
</body>
<footer>
    <h3>SISTec Ratibad Bus Services</h3>
    <p>&copy; SISTec Ratibad Campus<br><br>Sikandrabad, Near Ratibad, Bhadbhada Road, Bhopal (M.P.) 462044<br><br>Contact for any Help: <b>Pramod Biswal sir</b><br><br>📞 Contact Number: <b>+91 7049325773</b></p>
    <div class="icon">
        <a href="#"><img class="img" src="static/img/insta.jpg" height="50px" alt="Instagram"></a>
        <a href="#"><img class="img" src="static/img/wp.jpg" height="50px" alt="WhatsApp"></a>
        <a href="#"><img class="img" src="static/img/tg.jpg" height="50px" alt="Telegram"></a>
        <a href="#"><img class="img" src="static/img/yt.jpg" height="50px" alt="YouTube"></a>
    </div>
</footer>
</html>
