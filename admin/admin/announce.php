<?php


include_once("connections/session.php");


$sql = "SELECT * FROM alert ORDER BY id DESC";
$alert = $conn->query($sql) or die($conn->error);
$row = $alert->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="img/scclogo.png" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css/announcement.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <title>Announcement</title>
</head>
<body>
    <input type="checkbox" name="" id="menu-toggle">

    <div class="overlay">
        <label for="menu-toggle">
        </label>
    </div>
    <div class="sidebar">
        <div class="sidebar-container">
            <div class="brand">
                <h2>
                    <center><span><img src="img/scclogo.png"  alt=""></span></center>
                </h2>
            </div>

            <div class="sidebar-avatar">
          
                <div>
                   
                    <img src="<?php echo (!empty($user['photo'])) ? '../../img/'.$user['photo'] : '../../img/profile.jpg'; ?>">
                      
                </div>
                    <div class="avatar-info">
                        <div class="avatar-text">
                       
                            <h4><?php echo $user['fullname'];?></h4>
                            <small><?php echo $user['position'];?></small>
                         
                        </div>
                       
                    </div>
                   
               
               
            </div>
                <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="dashboard.php">
                            <span class="las la-adjust"></span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="announce.php" class="active">
                            <span class="las la-bullhorn"></span>
                            <span>Emergency Alert</span>
                        </a>
                    </li>
                    <li>
                        <a href="hotline.php">
                            <span class="las la-phone"></span>
                            <span>Emergency Hotlines</span>
                        </a>
                    </li>
                    <li>
                        <a href="evacuation.php">
                            <span class="las la-hospital-alt"></span>
                            <span>Evacuation Area</span>
                        </a>
                    </li>
                    <li>
                        <a href="user_approved.php">
                            <span class="las la-users"></span>
                            <span>Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="rescuer.php">
                            <span class="las la-users-cog"></span>
                            <span>Rescuer</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin.php">
                            <span class="las la-user-cog"></span>
                            <span>Admin</span>
                        </a>
                    </li>
                    <li>
                        <a href="report.php">
                            <span class="las la-chart-bar"></span>
                            <span>Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <span class="las la-sign-out-alt"></span>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
           
        </div>
    </div>
    
    <div class="main-content">
        <header>
            <div class="header-title-wrapper">
                <label for="menu-toggle">
                    <span class="las la-bars"></span>
                </label>
                <div class="header-title">
                    <h1>Emergency Alert</h1>
                  
                </div>
                <div>
                    
                </div>
            </div>
        </header>

        <main>
            <section>
                <div><button class="btn"><a href="announce_add.php"><span class="las la-plus"></span>Add</a></button></div>
                <div class="contents  mt-1">
                    
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "SELECT * FROM alert";
                            $query = $conn->query($sql);
                            $data = array();
                            while($row = $query->fetch_assoc()){ ?>
                            <tr>
                            <td><?php echo $row['message'];?></td>
                            <td><?php echo $row['date'];?></td>
                            <td>
                                   
                                    <button type="submit" name="delete"><a href="announce_delete.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete this message?')">Delete</a></button>
                                    
                                    
                                </td>
                            </tr>
                            <?php } ?>
                         </tbody>
                               
                        </table>
                    </div>
                    </section>
               

    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
        $('#example').DataTable();
        });
    </script>
</body>
</html>
<style>
    .btn{
    
    padding: 4px;
    margin-top: 13px;
    width: 90px;
}

.btn a{
    text-decoration: none;
    color:#ff6600;
}
.btn:hover{
    text-decoration: none;
    color:#ff6600;
}
</style>


