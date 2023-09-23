<?php

include_once("connections/session.php");


$sql = "SELECT * FROM evacuations ORDER BY id DESC";
$area = $conn->query($sql) or die($conn->error);
$row = $area->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CDRRMO - Evacuation</title>
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
                    <a href="evacuation.php" class="active"><i class="fa-solid fa-person-walking-arrow-right"></i>
                    <span>Evacuation</span>
                    </a>
                </li>
                <li>
                    <a href="user.php"><i class="fa-solid fa-users"></i>
                    <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="report.php"><i class="fa-solid fa-circle-user"></i>
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
                <i class="fa-solid fa-people-roof"></i>
                Evacuation
                </h1>
               
            </div>
        </header>
        <div class="grid">
            <br>
            <div class="table">
        <div class="header">
            <p>Evacuation Details</p>
           
            <form action="evacuationsearch.php" method="get">
            <div class="search">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                <input type="search" name="search" id="search" placeholder="Search Location">  
            </div>
            </form>
            <div class="add">
            
                <button><a href="evacuationadd.php"><i class="fa-solid fa-plus"></i> Add</a></button>
            </div>
        </div>
        <div class="table">
            <table>
                <thead>
                    <tr>
                    <th>Evacuation</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                   $sql = "SELECT * FROM evacuations";
                   $query = $conn->query($sql);
                   $data = array();
                   while($row = $query->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['location'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td>
                        <button class="buttons" ><a href="evacuationdetails.php?ID=<?php echo $row['id'];?>"><i class="fa-solid fa-eye"></i></a></button>
                        <button class="buttons"><a href="evacuationupdate.php?ID=<?php echo $row['id'];?>"><i class="fa-solid fa-pen-to-square"></i></a></button>
                        <button class="buttons" type="submit" name="delete"><a href="evacuationdelete.php?id=<?php echo $row['id'];?>"><i class="fa-solid fa-trash"></i></a></button>
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