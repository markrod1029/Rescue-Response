<?php

include_once("connections/session.php");

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
                    <a href="dashboard.php" class="active"><i class="fa-solid fa-grip"></i>
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
             <td><?php echo $user['name'];?></td>
                </h1>
                <p><td><?php echo $user['position'];?></td></p> 
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
                    <th>Name</th>
                    <th>User's Current Location</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                   $sql = "SELECT *, users.id AS uid, location.id AS lid FROM location 
                   LEFT JOIN users ON users.id=location.user_id WHERE status = 0";

                    $query = $conn->query($sql);
                    $data = array();
                    while($row = $query->fetch_assoc()){?>
                <tr>
                    <td><?php echo $row['fname'].' '.$row['lname'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td>
                    
                        <button class="buttons"><a href="view_location.php?ID=<?php echo $row['uid'];?>"><i class="fa-solid fa-location-crosshairs"></i></a></button>
                        <button class="buttons"><a href="location_update.php?ID=<?php echo $row['uid'];?>"><i class="fa-solid fa-paper-plane"></i></a></button>
                        <button class="buttons" type="submit" name="delete"><a href="location_delete.php?ID=<?php echo $row['lid'];?>"><i class="fa-solid fa-trash"></i></a></button>
                        <a style="outline: none;border: none;padding: 4px;border-radius: 5px; background-color:orange; color:white" href="location_status.php?ID=<?php echo $row['uid'];?>">Status</a>
   
                
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