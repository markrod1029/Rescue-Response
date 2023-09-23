<?php


include_once("connections/session.php");

$id = $_GET['ID'];

$sql = "SELECT * FROM sub_admin WHERE id='$id'";
$admin = $conn->query($sql) or die($conn->error);
$row = $admin->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CDRRMO - Sub-Admin Account</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/scclogo.png" />
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/details.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/787042df18.js" crossorigin="anonymous"></script>
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
                    <a href="sub_admin.php" class="active"><i class="fa-solid fa-people-group"></i>
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
               Team
                </h1>
               
            </div>
        </header>
        <br>
        <button class="back" style="width:50px;height:30px;border-radius:5px; margin-bottom:20px;background:rgb(4, 134, 67);border:none"><a href="sub_admin.php" style="color: white;">Back</a></button>
     

        <div class="wrapper">
    <div class="left">
    <img src="<?php echo (!empty($row['photo'])) ? '../../img/'.$row['photo'] : '../../img/profile.jpg'; ?>" 
        alt="user" width="100">
        
        <h4><?php echo $row['name'];?></h4>
         <p><?php echo $row['position'];?></p>
    </div>
    <div class="right">
        <div class="info">
            <h3>Information</h3>
            <div class="info_data">
                 <div class="data">
                    <h4>ID</h4>
                    <p><?php echo $row['id'];?></p>
                 </div>
                 <div class="data">
                   <h4>Contact Number</h4>
                    <p><?php echo $row['contact'];?></p>
              </div>
            </div>
        </div>
        
        <div class="info">
          
          <div class="info_data">
               <div class="data">
                  <h4>Email/Username</h4>
                  <p><?php echo $row['username'];?></p>
               </div>
               <div class="data">
                 <h4>Password</h4>
                  <p><?php echo $row['password'];?></p>
            </div>
          </div>
      </div>
      
    </div>
</div>

 
    </div>
    </div>
</body>
</html>