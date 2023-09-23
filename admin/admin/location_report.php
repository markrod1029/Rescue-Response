<?php

include_once("connections/session.php");


$sql = "SELECT * FROM admins ORDER BY id DESC";
$admin = $conn->query($sql) or die($conn->error);
$row = $admin->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CDRRMO - Dashboard</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/scclogo.png" />
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/tables.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/787042df18.js" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="sidebar">
        <div class="side-brand">              
        <img src="img/scclogo.png" alt="">
        </div>
        <div class="side-menu">
            <ul>
            <li>
                    <a href="dashboard.php"><i class="fa-solid fa-grip"></i>
                    <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="announce.php"><i class="fa-solid fa-bullhorn"></i>
                    <span>Emergency Alert</span>
                    </a>
                </li>
                <li>
                    <a href="evacuation.php"><i class="fa-solid fa-person-walking-arrow-right"></i>
                    <span>Evacuation</span>
                    </a>
                </li>
                <li>
                    <a href="user.php"><i class="fa-solid fa-users"></i>
                    <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="sub_admin.php"><i class="fa-solid fa-people-group"></i>
                    <span>My Team</span>
                    </a>
                </li>
                <li>
                    <a href="admin.php"><i class="fa-solid fa-circle-user"></i>
                    <span>My Account</span>
                    </a>
                </li>

                <li>
                    <a href="report.php" class="active"><i class="fa-solid fa-folder-open"></i>
                    <span>Report</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <div class="header-title">
                <h1>
                <i class="fa-solid fa-location-dot"></i>
                Dashboard
                </h1> 
            </div>
        </header>
        <div class="grid">
            <br>
        <div class="table">
        <div class="header">
            <p>Location</p>
        </div>
        <div class="table">
            <table>
                <thead>
                    <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>User's Current<br> Location</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $ID = $_GET['ID'];
                $sql = "SELECT *, users.id AS uid, location_admin.id AS lid FROM location_admin 
                 LEFT JOIN users ON users.id=location_admin.user_id  Where user_id = '$ID' AND status ='1'";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){?>
                <tr>
                    <td><?php echo $row['date'];?></td>  
                <td><?php echo $row['fname'].' '.$row['lname'];?></td>
                    <td><?php echo $row['address'];?></td>  
                    <td><?php echo $row['lat'];?></td>  
                    <td><?php echo $row['long'];?></td>  
                    <td style="color:green;">
                    Completed 
                    </td>
                </tr>
                <?php } ?>
               </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
</body>
</html>