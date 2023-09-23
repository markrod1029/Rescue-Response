<?php

include 'includes/session.php';

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
    <title>User - Evacuation Details</title>
    <link rel="stylesheet" href="css/edetails.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/scclogo.png" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
 
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
    </ul>      
    </nav>
    <div class="center">
    <div class="center"> <button class="back" style="width:50px;height:30px;font-size:15px;border-radius:5px; margin-bottom:20px;background:#0033cc;border:none"><a href="evacuation.php" style="color: white;text-decoration:none;">Back</a></button></div>
    </div>

    <table>
    <thead>
                    <tr>
                        <th><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;<?php echo $row['name'];?></th>
                  
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $row['location'];?></td>
                      
                    </tr>
                </tbody>
    </table>
    <div class="content">
        <label>Point Person</label>
        <p><?php echo $row['point_person'];?></p>
    </div>
    <div class="content">
        <label>Contact Number</label>
        <p><?php echo $row['number'];?></</p>
    </div>
    <div class="content">
        <label>Status</label>
        <p><?php echo $row['status'];?></p>
    </div>
</body>
</html>