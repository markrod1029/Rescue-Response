<?php

include_once("connections/session.php");


// $sql = "SELECT * FROM sub_admin ORDER BY id DESC";
// $admin = $conn->query($sql) or die($conn->error);
// $rows = $admin->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="img/scclogo.png" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

    <title>Dashboard</title>
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
                <img src="<?php echo (!empty($user['photo'])) ? '../../img/'.$user  ['photo'] : '../../img/profile.jpg'; ?>">
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
                        <a href="dashboard.php" class="active">
                            <span class="las la-adjust"></span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="announce.php">
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
                    <h1>Dashboard</h1>
                  
                </div>
                <div>
                    
                </div>
            </div>
        </header>

        <main>
            <section>
                <h3 class="section-head">Locate and Rescue</h3>
                <div class="contents mt-1">
                    
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Incident Details</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "SELECT *, users.id AS uid, location.id AS lid FROM location 
                            LEFT JOIN users ON users.id=location.user_id
                            LEFT JOIN sub_admin ON sub_admin.id = location.rescuer_id WHERE location.status = 0";

                            $query = $conn->query($sql);
                            $data = array();
                            while($row = $query->fetch_assoc()){?>
                            <tr>
                                <td><?php echo $row['fname'].' '.$row['lname'];?></td>
                                <td><?php echo $row['incident_details'];?></td>
                                <td><?php echo $row['address'];?></td>
                                <td>

                                <?php

                                if( $row['rescuer_id']== 0){

                                ?>
                                    <button><a href="view_location.php?ID=<?php echo $row['lid'];?>">Locate</a></button>
                                    
                                <?php
                                }
                                else{
                                ?>
                               
                                    <p>Assigned: &nbsp;<small><?php echo $row['name']; ?></small></p>

                                <?php
                                }?>
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
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

:root{
    --color-main: #ff6600;
    --bg: #fbfefd;
    --main-accent: #e9eefd;
    --main-text: #4b5876;
    --shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;
}
*{
    padding: 0;
    margin: 0;
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
    list-style: none;
    box-sizing: border-box;
}
body{
    background: var(--bg);
    overflow-x: hidden;
}
#menu-toggle{
    display: none;
}
#menu-toggle:checked ~ .sidebar {
    left: -345px;
}
#menu-toggle:checked ~ .main-content {
    margin-left: 0;
    width: 100vw;
}
img{
    width: 100%;
    height: auto;
}
.sidebar{
    width: 345px;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    padding: 1rem 1.2rem;
    transition: left 300ms;
}
.sidebar-container{
    height: 100%;
    width: 100%;
    background: #fff;
    border-radius: 20px;
    box-shadow: var(--shadow);
    padding: 1.2rem;
    overflow-y: auto;
}
    .sidebar-container::-webkit-scrollbar {
        width: 6px;
    }
    .sidebar-container::::-webkit-scrollbar-track {
        background: #f1f1f1; 
    }
    .sidebar-container::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px; 
    }
    .sidebar-container::::-webkit-scrollbar-thumb:hover {
        background: #555; 
    }
.brand img{
    width:100px;
    
}
.brand h3 span{
    color: var(--color-main);
    font-size: 2.5rem;
    display: inline-block;
    margin-right: .5rem;
}
.sidebar-avatar{
    display: grid;
    grid-template-columns: 70px auto;
    align-items: center;  
    border: 2px solid var(--color-main);
    padding: .1rem .7rem;
    border-radius: 7px;
    margin: 1rem 0rem;
}
.sidebar-avatar img{
    width: 70px; 
    height: 70px; 
    border-radius: 50%;
}

.avatar-info{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-left: 4px;
}
.avatar-info h4{
    font-size: 1rem;
    font-weight: 600;
}
.avatar-info h4 small{
    font-size: .5rem;
    color: var(--main-text);
}
.sidebar-menu li{
    margin-bottom: .2rem;
  
}
.sidebar-menu a{
    color: var(--main-text);
    display: block;
    padding: .7rem 0rem;
    text-decoration: none;
}
.sidebar-menu a:hover{
    color: var(--color-main);
}
.sidebar-menu a.active{
    background: var(--main-accent);
    padding: .7rem;
    border-radius: 5px;
}
.sidebar-menu a span:first-child{
    display: inline-block;
    margin-right: .8rem;
    font-size: 1.5rem;
    color: var(--color-main);
}
.btn{
    padding: .7rem 1rem;
    border: none;
    border-radius: 10px;
}
.btn-main{
    background: var(--color-main);
    color: #fff;
}
.main-content{
    margin-left: 345px;
    width: calc(100vw - 345px);
    padding: 1rem .8rem;
    padding-right: 2rem;
    transition: margin-left 300ms;
}

header{
    display: flex;
    justify-content: space-between;
    padding-top: .5rem;
}
.header-title-wrapper{
    display: flex;
}
.header-title-wrapper label{
    display: inline-block;
    color: var(--color-main);
    margin-right: 2rem;
    font-size: 1.8rem;
}
.header-title h1{
    color: var(--main-text);
    font-weight: 600;
}
.header-title p{
    color: var(--color-main);
    font-size: .9rem;
}
.header-title p span{
    color: red;
    font-size: 1.2rem;
    display: inline-block;
    margin-left: .5rem;
}

main{
    padding-top: .3rem;
    padding-bottom: 1rem;
}
h3{
    font-size: 1.4rem;
    color: var(--main-text);
    font-weight: 600;
    margin-bottom: .1rem;
}
.contents{
    padding: 1.5rem;
    border-radius: 10px;
    margin-bottom: 3rem;
}
.section-head{
    color:var(--color-main);
    margin-top:15px;
}

button{
    outline: none;
    border: none;
    padding: 4px;
    color:#fff;
    
}
td{
    font-size: 12px;
}
td p{
    font-style: italic;
    color: #000;
}
td small{
    font-weight:900;
}
td button a{
    text-decoration: none;
    color: #fff;
}
td button a:hover{
    text-decoration: none;
    color: #fff;
}
td button:first-child{
    background-color:#203ee8;
}
td button:nth-child(2){
    background-color: #09ab19;
}

.overlay{
    position: fixed;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    z-index: 10;
    display: none;
    background: rgba(255,255,255,0.5);
}
.overlay label{
    display: block;
    height: 100%;
    width: 100%;
}

@media only screen and (max-width:500px){
    header, .header-title-wrapper{
        align-items: center;
    }
    .header-title h1{
        font-size: 1.2rem;
    }
    .header-title p{
        display: none;
    }
}
@media only screen and (max-width:860px){
    .analytics{
        grid-template-columns: repeat(1, 1fr);
    }
    .block-grid{
        grid-template-columns: 100%;
    }
   
}
@media only screen and (max-width:500px){
    .contents{
        grid-template-columns: 100%;
    }
    .section-head{
        display:none;
    }
    .contents{
        display: flex;
    }
    button{
        outline: none;
        border: none;
        padding: 4px;
        color:#fff;
    }
    td{
    font-size: 8px;
}
table{
    margin:1rem;
}
}
</style>

