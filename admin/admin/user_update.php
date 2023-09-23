<?php

include_once("connections/session.php");


if(isset($_POST['submit'])){

    $id = $_POST['id'];
    $fname = htmlspecialchars( $_POST['fname'], ENT_QUOTES, 'UTF-8');
    $lname = htmlspecialchars( $_POST['lname'], ENT_QUOTES, 'UTF-8');
	$location = $_POST['location'];
    $contactnum = htmlspecialchars( $_POST['contactnum'], ENT_QUOTES, 'UTF-8');
  $user = $_POST['user'];
  



  $sql = "UPDATE users SET fname = '$fname',  lname = '$lname', location = '$location', contactnum = '$contactnum', user = '$user' WHERE id='$id'";

  $conn->query($sql) or die($conn->error);

    echo header("Location: user_approved.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <title>User-Update</title>
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
                        <a href="user_approved.php" class="active">
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
                
        
            </div>
        </header>

       <main>
        <section>
        <div class="container">
<?php
        
    $id = $_GET['ID'];

$sql = "SELECT * FROM users WHERE id = '$id'";
$user = $conn->query($sql) or die($conn->error);
$row = $user->fetch_assoc();
?>
  <button class="back"><a href="user_approved.php" class="text-white">Back</a></button>
    <div class="title">Update</div>
    <div class="content">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="user-details">
        <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name="fname" id="fname" value="<?php echo $row['fname'];?>" required>
            <input type="text" name="id" id="fname" value="<?php echo $_GET['ID'];?>" hidden>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" name="lname" id="lname" value="<?php echo $row['lname'];?>" required>
          </div>
          
          <div class="input-box">
            <span class="details">Barangay</span>
        
          <select id="location"  name="location">
            <option><?php echo $row['location'];?> </option>
            </select>
          </div>
          <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="text" name="contactnum"  id="contactnum" minlength="11" maxlength="11"   pattern="\d{11}" title="11-digit Phone Number"  data-mdb-input-mask="+63 0000-000-0000" value="<?php echo $row['contactnum'];?>" required> 
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="user" id="user" value="<?php echo $row['user'];?>" required>
          </div>
        
        
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Update">
          
        </div>
      </form>
    </div>
  </div>
        </section>
       </main>
</body>
</html>
<script>
var barangayLists = {
  "San Carlos City":["Abanon", "M.Soriano St. (Poblacion)", "Agdao, San Carlos", "Anando, San Carlos", "Ano, San Carlos", "Antipangol, San Carlos", "Aponit, San Carlos", "Bacnar, San Carlos", "Balaya, San Carlos", "Balayong, San Carlos", "Baldog, San Carlos", "Balite Sur, San Carlos", "Balococ, San Carlos", "Bani, San Carlos", "Bocboc, San Carlos", "Bugallon-Posadas Street (Poblacion), San Carlos", "Bogaoan, San Carlos", "Bolingit, San Carlos", "Bolosan, San Carlos", "Bonifacio (Poblacion), San Carlos", "Buenglat, San Carlos", "Burgos-Padlan (Poblacion), San Carlos", "Cacaritan, San Carlos", "Caingal, San Carlos", "Calobaoan, San Carlos", "Calomboyan, San Carlos", "Capataan, San Carlos", "Caoayan-Kiling, San Carlos", "Cobol, San Carlos", "Coliling, San Carlos", "Cruz, San Carlos", "Doyong, San Carlos", "Gamata, San Carlos", "Guelew, San Carlos", "Ilang, San Carlos", "Inerangan, San Carlos", "Isla, San Carlos", "Libas, San Carlos", "Lilimasan, San Carlos", "Longos, San Carlos", "Lucban (Poblacion), San Carlos", "Mabalbalino, San Carlos", "Mabini (Poblacion), San Carlos", "Magtaking, San Carlos", "Malacañang, San Carlos", "Maliwara, San Carlos", "Mamarlao, San Carlos", "Manzon, San Carlos", "Matagdem, San Carlos", "Mestizo Norte, San Carlos", "Naguilayan, San Carlos", "Nelintap, San Carlos", "Padilla-Gomez (Poblacion), San Carlos", "Pagal, San Carlos", "Palaming, San Carlos", "Palaris (Poblacion), San Carlos", "Palospos, San Carlos", "Pangalangan, San Carlos", "Pangoloan, San Carlos", "Pangpang, San Carlos", "Paitan-Panoypoy, San Carlos", "Parayao, San Carlos", "Payapa, San Carlos", "Payar, San Carlos", "Perez Boulevard (Poblacion), San Carlos", "PNR Site (Poblacion), San Carlos", "Polo, San Carlos", "Quezon Boulevard (Poblacion), San Carlos", "Quintong, San Carlos", "Rizal Avenue (Poblacion), San Carlos", "Roxas Boulevard (Poblacion), San Carlos", "Salinap, San Carlos", "San Juan, San Carlos", "San Pedro (Poblacion), San Carlos", "Sapinit, San Carlos", "Supo, San Carlos", "Talang, San Carlos", "Taloy (Poblacion), San Carlos", "Tamayo, San Carlos", "Tandoc, San Carlos", "Tarece, San Carlos", "Tarectec, San Carlos", "Tayambani, San Carlos", "Tebag, San Carlos", "Turac, San Carlos", "Tandang Sora (Poblacion), San Carlos"],
  // Add more cities and their corresponding barangays here
};

var barangayDropdown = document.getElementById("location");

// Populate barangay dropdown menu with all barangays
for (var city in barangayLists) {
  var barangays = barangayLists[city];
  for (var i = 0; i < barangays.length; i++) {
    var option = document.createElement("option");
    option.value = barangays[i];
    option.text = barangays[i];
    barangayDropdown.appendChild(option);
  }
}
barangayDropdown.parentNode.appendChild(searchBox);
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
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
  
}

.user-details .input-box select{
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
.user-details .input-box select:focus,
.user-details .input-box select:valid{
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
</style>