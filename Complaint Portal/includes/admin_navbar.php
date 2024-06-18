<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: rgb(0, 102, 51);
            color: white;
            position: fixed;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            margin-top:20px;
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            
        }
        .sidebar .nav-link i {
            margin-right: 10px;
            
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a class="navbar-brand" href="admin.php">
            <img src="../images/logo-removebg-preview.PNG" alt="" width="50" height="40" class="d-inline-block align-text-top">
            UOM Complaint Portal
        </a>
        <nav class="nav flex-column">
            <a class="nav-link" href="Admin.php">
                <i class="fa fa-chart-bar" style="font-size:20px;"></i>
                Statics
            </a>
            <a class="nav-link" href="All_Complaints.php">
                <i class="fa fa-comments" style="font-size:20px;"></i>
                All Complaints
            </a>
            <a class="nav-link" href="All_Users.php">
                <i class="fa fa-users" style="font-size:20px;"></i>
                All Users
            </a>
            <a class="nav-link" href="Validate_User.php">
                <i class="fa fa-users" style="font-size:20px;"></i>
                Validate Users
            </a>

            <a class="dropdown-item" href="Ad_Account.php">
                 <i class="fa fa-user-circle" style="font-size:20px;color:White;"></i>
                 &nbsp;&nbsp; Account
            </a>
            <a class="dropdown-item" href="logout.php">
                <i class="fa fa-user-times" style="font-size:20px;color:White;"></i>
                &nbsp;&nbsp; Logout
            </a>
        </nav>
    </div>
    <div class="content">
        <!-- Main content goes here -->
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
