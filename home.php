
<?php include 'includes/session.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Dashboard</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
 
    
        <script async src="https://www.google-analytics.com/analytics.js"></script>
        <meta name="description" content="Simplest possible examples of HTML, CSS and JavaScript.">
        <meta name="author" content="//samdutton.com">
        <link rel="stylesheet" href="css/dash.css">
        <link rel="stylesheet" href="css/home.css">
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

    <nav>
          
        <ul>
        <li><a href="">CDRRMO</a></li>
        
        <a href="profile.php?ID=<?php echo $user['id'];?>"><img src="<?php echo (!empty($user['photo'])) ? 'img/'.$user['photo'] : 'img/profile.jpg'; ?>"> </a>


        <?php
        $id = $user['id'];
    	$location = $conn->query("SELECT COUNT(*) as total FROM  location_admin WHERE user_id = '$id' AND status ='0'") or die(mysqli_error());
		$count = $location->fetch_array();

        $alert = $conn->query("SELECT COUNT(*) as total FROM  alert ") or die(mysqli_error());
		$count1 = $alert->fetch_array();
    ?>

    
   <?php
    
        
    ?>

         <a href="notification.php?ID=<?php echo $user['id']?>"  style="color:black;"><i class="fa-solid fa-bell"><span class="badge bg-danger" id="count"><?php echo $count['total']; ?></span></i></a>
           

        <a href="anoucement.php" style="color:black;"> <i class="fa-solid fa-bullhorn"><span class="badge bg-danger" id="counts" style="  border-radius: 60%;position: relative;top: -10px;left: -7px;font-size: 8px;"><?php echo $count1['total']; ?></span></i></a>
     
          


        </ul>
       
    </nav>
 
          
    <div id="container">

        <h1>Your Current Location</h1>

        <div class="evacuate location" >
        <button style="color:#fff;background:green;width: 460px;height: 50px;border:none;margin-left:5px">
        Detect my location
        </button>


<script src="detect/script.js"></script>
        </div>
      
      </div>
    <div class="login">


            <form action="user_location.php" method="post">  
            
            <center>
            <input type="hidden" style="width:500px;" value="<?php echo $user['fname']. ' '.$user['lname'];?>" name="name"><br>
            <input type="hidden" style="width:500px;" value="<?php echo $user['id'];?>" name="id"><br>
            <input type="hidden" style="width:500px;" value="Send Location" name="address" id="input"><br>
            <input type="hidden" style="width:500px;"  value="Send Location" name="lat" id="lat"><br>
            <input type="hidden" style="width:500px;" value="Send Location" name="long" id="long">
            </center>

            <input onclick="return confirm('Are you sure you want to Send Your Location?')"  type="submit" value="Send Location" name="submit" id="login">
    
        <div class="evacuate">
            <button><a href="evacuation.php">Evacuation Center</a></button>
        </div>
    </form>
    </div>
</body>
</html>

