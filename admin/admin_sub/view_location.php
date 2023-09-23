<?php


include_once("connections/session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="img/scclogo.png" />
    <title>CDRRMO - Dashboard</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/location.css">
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
                    <a href="evacuation.php" ><i class="fa-solid fa-person-walking-arrow-right"></i>
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
                <i class="fa-solid fa-location-dot"></i>
                Keep their track
                </h1>
            </div><br>
            <button class="back" style="width:50px;height:30px;border-radius:5px; margin-bottom:70px;background:rgb(4, 134, 67);border:none"><a href="dashboard.php" style="color: white;">Back</a></button>

        </header>
        <div class="con">
        <div class="left">
<?php
        $ID = $_GET['ID'];
        $view = "SELECT *, users.id AS uid, location.id AS lid FROM location 
        LEFT JOIN users ON users.id=location.user_id  Where user_id = '$ID'";
        $result = $conn->query($view);
        $row = $result->fetch_assoc();
                    ?>
 
<form method="POST" style =" text-align:center; margin-top:130px">
    <p>
    <label><?php echo $row['fname'].' '.$row['lname'];?></label><br>
        <input type="hidden" name="latitude" value="<?php echo $row['lat'];?>" >
    </p>
 
    <p>
        <input type="hidden" name="longitude" value="<?php echo $row['long'];?>">
    </p>
 
    <input type="submit" name="submit_coordinates" value="Locate " style ="margin-left:5px;">
</form>
        </div>


        <div class="right" >
   
<?php
    if (isset($_POST["submit_coordinates"]))
    {
        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];
        ?>
 
        <iframe style="width:700px;height:400px;position:relative; top:20px; left:50px;" src="https://maps.google.com/maps?q=<?php echo $latitude; ?>,<?php echo $longitude; ?>&output=embed"></iframe>
 
        <?php
    }
?>
        </div>
    </div>

</body>
</html>