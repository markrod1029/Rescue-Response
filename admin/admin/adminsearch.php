<?php

include_once("connections/session.php");


$search = $_GET['search'];
$sql = "SELECT * FROM admins WHERE fullname LIKE '%$search%' || position LIKE '%$search%' ORDER BY id ASC";
$admin = $conn->query($sql) or die($conn->error);
$row = $admin->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CDRRMO - Admin Account</title>
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
                    <a href="admin.php" class="active"><i class="fa-solid fa-circle-user"></i>
                    <span>My Account</span>
                    </a>
                </li>

                <li>
                    <a href="report.php"><i class="fa-solid fa-folder-open"></i>
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
                <i class="fa-solid fa-user-gear"></i>
                Admin Account
                </h1>
               
            </div>
        </header>
        <div class="grid">
            <br>
            <div class="table">
        <div class="header">
            <p>Admin Details</p>
           
            <form action="adminsearch.php" method="get">
            <div class="search">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                <input type="search" name="search" id="search" placeholder="Search">  
            </div>
            </form>
            <div class="add">
            
                <button><a href="adminadd.php"><i class="fa-solid fa-plus"></i> Add</a></button>
            </div>
        </div>
        <div class="table">
            <table>
                <thead>
                    <tr>
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Position</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php do{ ?>
                <tr>
                    <td><?php echo $row['fullname'];?></td>
                    <td><?php echo $row['contact'];?></td>
                    <td><?php echo $row['position'];?></td>
                    <td>
                    
                        <button class="buttons"><a href="admindetails.php?ID=<?php echo $row['id'];?>"><i class="fa-solid fa-eye"></i></a></button>
                        <button class="buttons"><a href="adminupdate.php?ID=<?php echo $row['id'];?>"><i class="fa-solid fa-pen-to-square"></i></a></button>
                        <button class="buttons" type="submit" name="delete"><a href="admindelete.php?id=<?php echo $row['id'];?>"><i class="fa-solid fa-trash"></i></a></button>
   
                
                    </td>
                </tr>
                <?php }while($row = $admin->fetch_assoc()) ?>
               </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
</body>
</html>