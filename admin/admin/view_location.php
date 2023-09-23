<?php


include_once("connections/session.php");




$ID = $_GET['ID'];


if(isset($_POST['submit'])){
echo $sub = $_POST['sub'];
    $sql = "UPDATE location SET rescuer_id = '$sub' WHERE id='$ID'";
    $conn->query($sql) or die($conn->error);

    echo header("Location: dashboard.php");

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="img/scclogo.png" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <title>User-Location</title>
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
            <?php
                $view = "SELECT *, users.id AS uid, location.id AS lid FROM location 
                LEFT JOIN users ON users.id=location.user_id  Where  location.id = '$ID'";
                $result = $conn->query($view);
                $row = $result->fetch_assoc();
                ?>  
                <h3 class="section-head"><?php echo $row['fname'].' '.$row['lname'];?><span class="las la-map-marked-alt"></span></h3> 


                <div class="contents">

                    <form method="POST">
                               
                <select class="form-select" name="sub" aria-label="Default select example">
                <option selected>Assign Rescuer</option>
                        
                <?php
                                        $sql = "SELECT * FROM sub_admin ";
                                        $query = $conn->query($sql);
                                        while($prow = $query->fetch_assoc()){
                                            echo "
                                            <option value='".$prow['id']."'>".$prow['name']."</option>
                                            ";
                                        }
                                        ?>
                </select>
                <br>
                <center><input type="submit" name="submit" value="Send To Rescuer" class="locate"></center><br>
                    
 
                        <p>
                            <input type="hidden" name="latitude" value="<?php echo $row['lat'];?>" >
                        </p>
                        <p>
                            <input type="hidden" name="longitude" value="<?php echo $row['long'];?>">
                        </p>
                    
                       
                    
                        <center><input type="submit" name="submit_coordinates" value="Locate" class="locate"></center><br>
                       
                    </form>
                  
                        
                        <?php
                            if (isset($_POST["submit_coordinates"]))
                            {
                                $latitude = $_POST["latitude"];
                                $longitude = $_POST["longitude"];
                                ?>
                        
                               <br> <center><iframe src="https://maps.google.com/maps?q=<?php echo $latitude; ?>,<?php echo $longitude; ?>&output=embed"></iframe></center>
                        
                                <?php
                            }
                        ?>

                    </div>

                    <img class="img-circle" src="<?php echo (!empty($row['proof'])) ? '../../img/'.$row['proof'] : '../../img/profile.jpg'; ?>" alt="user" >
                    </section>
               

    </div>
    
  
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
.section-head{
        color:#ff6600;
        font-size: 20px;
        padding:10px;
    }
    .section-head span{
        padding-left:10px;
    }
    .locate{
        width:200px;
        height:40px;
        border: none;
        background:#adc6ff;
        color: #4b5876;
    }
    iframe{
        margin-top:10px;
        width: 800px;
        height: 300px;
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
    .locate{
        width:200px;
        height:40px;
        border: none;
        background:#adc6ff;
        color: #4b5876;
        
    }
    .contents{
        display:grid;
        grid-template-columns: repeat(1, 1fr);
    }
        iframe{
        
        margin-top:10px;
        width: 300px;
        height: 500px;
        position:relative;
        }
}
}
 
</style>
