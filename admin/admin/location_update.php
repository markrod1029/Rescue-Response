
<?php 

include_once("connections/session.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Dashboard</title>
 
        <script async src="https://www.google-analytics.com/analytics.js"></script>
        <meta name="description" content="Simplest possible examples of HTML, CSS and JavaScript.">
        <meta name="author" content="//samdutton.com">
        <link rel="stylesheet" href="css/nav.css">
        <link rel="stylesheet" href="css/dash.css">
        <link rel="shortcut icon" type="image/x-icon" href="img/scclogo.png" />
        <meta itemprop="name" content="simpl.info: simplest possible examples of HTML, CSS and JavaScript">
<meta itemprop="image" content="/images/icons/icon192.png">
<meta id="theme-color" name="theme-color" content="#fff">
        <script src="https://kit.fontawesome.com/787042df18.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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
                    <br>
                <i class="fa-solid fa-location-dot"></i>
                Rescuer's Location
                </h1>
               
            </div><br>
          
        </header>
       
            <br>
    
            <div id="container">



        <div class="location" >
        <button style="color:#fff;background:green;border:none;padding:5px; width:80%;height:70px;border-radius:5px">Detect our location</button>


<script src="detect/script.js"></script>
        </div>
      
      </div>
    <div class="login">


    <?php
$id = $_GET['ID'];
$sql = "SELECT * FROM location WHERE user_id='$id'";
$admin = $conn->query($sql) or die($conn->error);
$row = $admin->fetch_assoc();
?>

            <form action="location_admin.php" method="post">  
            
            <center>
            <input type="hidden" style="width:500px;" value="<?php echo $row['user_id']?>" name="user_id"><br>
            <input type="hidden" style="width:500px;" value="Send Location" name="address" id="input"><br>
            <input type="hidden" style="width:500px;"  value="Send Location" name="lat" id="lat"><br>
            <input type="hidden" style="width:500px;" value="Send Location" name="long" id="long">
            </center>

            <input onclick="return confirm('Are you sure you want to Send Your Location?')"  type="submit" value="Send our Location" name="submit" id="login" style="color:#fff;background:red;border:none;padding:5px; width:30%;height:50px;border-radius:5px">
    

        
    </form>

  
    </div>



    
</body>
</html>

