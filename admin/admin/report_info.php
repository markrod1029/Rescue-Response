<?php

include_once("connections/session.php");


$id = $_GET['ID'];


$view = "SELECT *, users.id AS uid, incident_info.id AS lid  FROM incident_info 
LEFT JOIN users ON users.id=incident_info.user_id
LEFT JOIN location ON location.id=incident_info.location_id WHERE incident_info.id ='$id'
 ";
$result = $conn->query($view);

// $sql = "SELECT * FROM evacuations WHERE id='$id'";
// $area = $conn->query($sql) or die($conn->error);
$row = $result->fetch_assoc();
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
    <title>Report-Information</title>
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
                        <a href="report.php" class="active">
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
                
        
            </div>
        </header>

       <main>
       <section>
       <div class="container">
       <button class="back"><a href="report_details.php" class="text-white">Back</a></button>
        <div class="title">Information</div>
           
            <div class="content">
                <div class="card">
                    <div class="card-content">
                        <div class="card-info">
                            <h3><?php echo $row['fname']." ". $row['lname'];?></h3>
                            <h1><?php echo $row['location'];?></h1>
                        </div>
                        <div class="details">
                            <h3>Date: <small><?php echo $row['date'];?></small></h3>
                        </div>
                       
                        <div class="details">
                            <h3>Call Time: <small><?php echo $row['call_time'];?></small></h3>
                        </div>
                        <div class="details">
                            <h3>Category: <small><?php echo $row['incident'];?></small></h3>
                        </div>
                        <div class="details">
                            <h3>Incident: <small><?php echo $row['sub_incident'];?></small></h3>
                        </div>
                          <div class="details">
                            <h3>Others: <small><?php echo $row['others'];?></small></h3>
                        </div>
                        <div class="details">
                            <h3>Place of Incident: <small><?php echo $row['place_incident'];?></small></h3>
                        </div>
                        <div class="details">
                            <h3>Injury Damage: <small><?php echo $row['injury_damage'];?></small></h3>
                        </div>
                        <div class="details">
                            <h3>Actions Taken: <small><?php echo $row['actions_taken'];?></small></h3>
                        </div>
                        <div class="details">
                            <h3>Transported To: <small><?php echo $row['transported_to'];?></small></h3>
                        </div>
                        <div class="details">
                            <h3>Responded By: <small><?php echo $row['responded_by'];?></small></h3>
                        </div>
                        <div class="details">
                            <h3>No. of Victim/Patient: <small><?php echo $row['no_victim_patient'];?></small></h3>
                        </div>
                         <div class="details">
                            <h3>Name of Victim/Patient: <small><?php echo $row['victim_names'];?></small></h3>
                        </div>

                             
                        <div class="card-id">
                            
                        <img src="<?php echo (!empty($row['proof'])) ? '../../img/'.$row['proof'] : '../../img/profile.jpg'; ?>" alt="user">
                        </div>
                       
                    </div>
                </div>
                        </div>
                        </div>


       
             
        </section>
       </main>
    </div>
</body>
</html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

:root{
    --color-main: #ff6600;
    --bg: #fbfefd;
    --bg2: #dce55f;
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
.brand span img{
    width: 100px;
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

.main-content{
    margin-left: 345px;
    width: calc(100vw - 345px);
    padding: 1rem 1.2rem;
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

.container{
  max-width: 900px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
  border:none;
}
.container .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;

}
.container button{
    background: rgb(71, 71, 249);
    height: 40px;
    width: 70px;
    border: none;
    border-radius: 3px;
    margin-bottom: 10px;
}
.container button a{
    color: #fff;
    text-decoration: none;
}
.container button:hover{
    background: rgb(55, 55, 238);
}
.content{
    margin-bottom: 3rem;
    border:none;
    
}

.section-head{
    font-size: 1.4rem;
    color: var(--main-text);
    font-weight: 600;
    margin-bottom: 1rem;
}

.card-content{
    padding: 1rem 2rem;
    text-align: left;
   
}
.card-content img{
    width: 100px;
    height: 100px;
    margin: 1rem 0rem;
    border-radius: 50%;
}

.card-content .details small{
    color: #000;
    font-weight: 600;
}
.card-content .details h3{
    color: var(--main-text);
    font-weight: 400;
    font-size: 15px;
}
.card-info{
    margin-bottom: 1rem;
}
.card-info h3,
.card-info h1{
    color: var(--color-main);
}
.card-info h1{
    font-weight: 600;
    margin-top: .2rem;
}
.card-info h1{
    font-weight: 600;
    font-size: 1rem;
    color: #555;
}

.card-id img{
    width:100%;
    height:auto;
    border-radius:0%;
}
.card-id h4{
    color: #555;
    font-weight: 400;
    margin-bottom: .5rem;
}
.card-id h2{
    font-weight: 600;
    color: var(--main-text);
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
    .contents{
        display: flex;
    }
    .btn{
        outline: 1px solid #ff6600;;
        padding: 4px;
        border-radius: 20px;
        margin-bottom: 10px;
    }
    td button{
        width: 21px;
        height: 30px;
        outline: none;
        border: none;
        padding: 4px;
        border-radius: 1px;
        place-items: center;
    }
    td span{
        text-align: center;
    }
    
    td button a{
        text-decoration: none;
        color: #fff;
       
    }

}

</style>