<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #005bb5;
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
        }

        header .logo img {
            position: absolute;
            top: 4px;
            left: 20px;
            height: 69px;
            width: 99px;
            border-radius: 10px;
        }

        header .admin-info {
            position: absolute;
            top: 10px;
            right: 20px;
        }

        header h1 {
            margin: 0;
        }

        .container {
            text-align: center;
            padding: 50px;
            background-color: white;
            margin: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn {
            display: inline-block;
            padding: 15px 30px;
            margin: 20px;
            font-size: 18px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-red {
            background-color: #dc3545;
        }

        .btn-red:hover {
            background-color: #c82333;
        }

        @media (max-width: 600px) {
            .btn {
                display: block;
                width: 80%;
                margin: 10px auto;
            }
            header .logo img {
            position: absolute;
            top: 14px;
            left: 20px;
            height: 39px;
            width: 59px;
            border-radius: 10px;
        }
        
        header h1 {
            margin: 0 auto;
            font-size: 20px;

        }
        header .admin-info {
            display: none
        }
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <img src="static/img/logo.png" alt="logo">
        </div>
        <h1><i>Sistec Chalo</i></h1>
        <div class="admin-info">
            <span>Welcome, Admin</span>
        </div>
    </header>

    <div class="container">
        <h1>Hi!  Admin </h1>
        <a href="display_contactus.php" class="btn btn-blue">View Messages</a>
        <a href="display_complaints.php" class="btn btn-blue">View Complaints</a>
        <a href="addbus.php" class="btn btn-blue">Add Bus</a>
        <a href="add_driver.php" class="btn btn-blue">Add Driver</a>
    </div>
</body>

</html>
