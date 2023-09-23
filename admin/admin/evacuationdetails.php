<?php

include_once("connections/session.php");


$id = $_GET['ID'];

$sql = "SELECT * FROM evacuations WHERE id='$id'";
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
    <link rel="stylesheet" href="css/detail.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
rel="stylesheet"
/>
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
                Evacuation
                </h1>
               
            </div>
        </header>
        <button class="back" style="width:50px;height:30px;border-radius:5px; margin-bottom:20px;background:rgb(4, 134, 67);border:none"><a href="evacuation.php" style="color: white;">Back</a></button>
     

     <div class="wrapper">
 <div class="right">
     <div class="info">
         <h3>Information</h3>
         <div class="info_data">
              <div class="data">
                <h4>Place</h4>
                 <p><?php echo $row['name'];?></p>
           </div>
         </div>
     </div>
     <div class="info"> 
       <div class="info_data">
            <div class="data">
               <h4>Location</h4>
               <p><?php echo $row['location'];?></p>
            </div>
            <div class="data">
              <h4>Point Person</h4>
               <p><?php echo $row['point_person'];?></p>
         </div>
       </div>
       </div>
       <div class="info"> 
       <div class="info_data">
            <div class="data">
               <h4>Phone Number</h4>
               <p><?php echo $row['number'];?></p>
            </div>
            <div class="data">
              <h4>Status</h4>
               <p><?php echo $row['status'];?></p>
         </div>
       </div>
       </div>
   </div>
   
 </div>
</div>

    </div>
    </div>
</body>
</html>