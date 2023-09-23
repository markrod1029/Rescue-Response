<?php

include_once("connections/session.php");

$month = date('m');

if(isset($_POST['submit'])){

//   $date = $_POST['date'];
//   $time = $_POST['time'];
  $incident = htmlspecialchars( $_POST['incident'], ENT_QUOTES, 'UTF-8');
  $sub_incident = htmlspecialchars( $_POST['sub_incident'], ENT_QUOTES, 'UTF-8');
  $actions_taken = htmlspecialchars( $_POST['actions_taken'], ENT_QUOTES, 'UTF-8');
  $no_victim_patient = htmlspecialchars( $_POST['no_victim_patient'], ENT_QUOTES, 'UTF-8');
  $place_incident = htmlspecialchars( $_POST['place_incident'], ENT_QUOTES, 'UTF-8');
  $injury_damage = htmlspecialchars( $_POST['injury_damage'], ENT_QUOTES, 'UTF-8');
  $transported_to = htmlspecialchars( $_POST['transported_to'], ENT_QUOTES, 'UTF-8');
  $responded_by = htmlspecialchars( $_POST['responded_by'], ENT_QUOTES, 'UTF-8');
  $others = htmlspecialchars( $_POST['others'], ENT_QUOTES, 'UTF-8');
  $id = $_GET['user'];
    $location_id = $_GET['ID'];

    $sql = "INSERT INTO `incident_info`(`date`, `month`, `call_time`, `incident`,
     `sub_incident`, `others`, `place_incident` , `injury_damage`, `actions_taken`, 
     `transported_to`, `responded_by` , `no_victim_patient`, victim_names, `user_id`, `location_id`)
     VALUES (NOW(), '$month', NOW(), '$incident',  '$sub_incident', '$others',  '$place_incident',  '$injury_damage',  '$actions_taken',
    '$transported_to', '$responded_by',  '$no_victim_patient', '$victim_names', '$id', '$location_id')";
    $conn->query($sql) or die($conn->error);
  

  $status = 1;

  $sql = "UPDATE location_admin SET status = '$status' WHERE user_id='$id'";
  $conn->query($sql) or die($conn->error);


  $sql1 = "UPDATE location SET status = '$status' WHERE user_id='$id'";
  $conn->query($sql1) or die($conn->error);


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
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/787042df18.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <title>Report-Add</title>
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
  <button class="back"><a href="report.php" class="text-white">Back</a></button>
    <div class="title">Add Report</div>
    <div class="content">
    <form action="" method="post"  enctype="multipart/form-data">
        <div class="user-details">
        <!-- <div class="input-box">
            <span class="details">Date</span>
            <input type="date" name="date" id="date" placeholder="Enter the date" required>
          </div>


          <div class="input-box">
            <span class="details">Call Time</span>
            <input type="time" name="time" id="call_time" placeholder="Enter the call time" required>
          </div> -->
          <div class="input-box">
  <span class="details">Incident</span>
  <select onchange="incidentChange(this);" name="incident">
    <option value="empty">Select</option>
    <option value="Medical">Medical</option>
    <option value="Trauma">Trauma</option>
  </select>
</div>

<div class="input-box">
  <span class="details">Type</span>
  <select id="sub-incident" name="sub_incident">
    <option value="0">Select</option>
  </select>
</div>
  <div class="input-box">
            <span class="details">No. of Victim/Patient</span>
            <input type="number" name="no_victim_patient" id="no_victim_patient" placeholder="Enter the number of victim/patient" required>
          </div>
<div id="other-input" class="input-box" style="display: none;">
  <span class="details">Other:</span>
  <input type="text" name="others" id="other-incident" placeholder="Please specify other incident">
</div>

        
          <div class="input-box">
            <span class="details">Name of Victim/Patient</span>
            <input type="text" name="name_patient" id="no_victim_patient" placeholder="Enter the Name of victim/patient" required>
          </div>
         
          
          <div class="input-box">
            <span class="details">Place of Incident</span>
            <input type="text" name="place_incident" id="place_incident" placeholder="Enter the place of incident" required>
          </div>
          <div class="input-box">
            <span class="details">Injury/Damage</span>
            <input type="text" name="injury_damage" id="injury_damage" placeholder="Enter the injury damage" required>
          </div>
          <div class="input-box">
            <span class="details">Transported To</span>
            <input type="text" name="transported_to" id="transported_to" placeholder="Enter where transported to" required>
          </div>
         
          <div class="input-box">
            <span class="details">Responded By</span>
            <input type="text" name="responded_by" id="responded_by" placeholder="Enter who responded" required>
          </div>
          
          <div class="input-box">
            <span class="details">Action Taken</span>
            <textarea name="actions_taken" id="actions_taken" cols="40" rows="5" style="padding:10px;" placeholder="Enter what action taken" required></textarea>
          </div>
        </div>
        
        <div class="button">
          <input type="submit" name="submit" value="Submit">
          
        </div>
      </form>
    </div>
        </section>
       </main>

       <script>
  var subIncidentLists = {
    'empty': ['Select Sub-Incident'],
    'Medical': ['Stroke', 'Highblood', 'Other'],
    'Trauma': ['Self Accident', 'Vehicle Accident', 'Drowning', 'Other'],
  };

  function incidentChange(selectObj) {
    var idx = selectObj.selectedIndex;
    var incident = selectObj.options[idx].value;
    var subIncidentList = subIncidentLists[incident];
    var subIncidentSelect = document.getElementById('sub-incident');
    subIncidentSelect.innerHTML = '';

    for (var i = 0; i < subIncidentList.length; i++) {
      var subIncidentOption = document.createElement('option');
      subIncidentOption.value = subIncidentList[i];
      subIncidentOption.text = subIncidentList[i];
      subIncidentSelect.appendChild(subIncidentOption);
    }

    var otherInput = document.getElementById('other-input');
    if (subIncidentSelect.value === 'Other') {
      otherInput.style.display = 'block';
    } else {
      otherInput.style.display = 'none';
    }
  }

  var subIncidentSelect = document.getElementById('sub-incident');
  subIncidentSelect.addEventListener('change', function() {
    var otherInput = document.getElementById('other-input');
    if (this.value === 'Other') {
      otherInput.style.display = 'block';
    } else {
      otherInput.style.display = 'none';
    }
  });
</script>

<style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
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
.content form{
    overflow-y: scroll;
    overflow:hidden;
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
  
}

.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #fc8e08;
}
 
 form .button{
   height: 45px;
   margin: 35px 0
 }
 form .button input{
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: rgb(255, 77, 32);
 }
 form .button input:hover{
  /* transform: scale(0.99); */
  background: rgb(234, 65, 23);
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
select{

height: 45px;
width: 100%;
outline: none;
font-size: 16px;
border-radius: 5px;
padding-left: 15px;
border: 1px solid #ccc;
border-bottom-width: 2px;
transition: all 0.3s ease;
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

 @media(max-width: 584px){
 .container{
  max-width: 100%;
  margin-top:50px;
}
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }

}
  @media only screen and (max-width: 1200px) {
    body{
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 1px;
    background: white;

    }
    .container{
    max-width: 700px;
    width: 100%;
    background-color: transparent;
    border-radius: 2px;
    margin-top: 5px;
    box-shadow: 0 5px 10px rgba(255, 255, 255);
}
  }


  
</style>