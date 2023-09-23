<?php

 include 'includes/session.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/x-icon" href="img/scclogo.png" />
    <script async src="https://www.google-analytics.com/analytics.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<title>Profile-Security</title>
</head>
<body>

	<section id="sidebar">

			<center><img src="img/scclogo.png" alt="" width="50px" height="50px" ></center>
			

		<ul class="side-menu top">
			<li>
				<a href="dashboard.php">
					<i class='bx bxs-dashboard' ></i>
					
				</a>
			</li>
			<li>
				<a href="hotlines.php">
					<i class='bx bxs-phone' ></i>
					
				</a>
			</li>
			<li>
				<a href="evacuation.php">
					<i class='bx bxs-clinic' ></i>
					
				</a>
			</li>
			
			
			
		</ul>
		<ul class="side-menu">
			<li class="active">
				<a href="profile.php">
					<i class='bx bx-user-circle' ></i>
					
				</a>
			</li>
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					
				</a>
			</li>
		</ul>
	</section>

	<section id="content">
	
	<nav>

		

			
			<?php
$id = $user['id'];
$location = $conn->query("SELECT COUNT(*) as total FROM  location_admin WHERE user_id = '$id' AND status ='0'") or die(mysqli_error());
$count = $location->fetch_array();

$alert = $conn->query("SELECT COUNT(*) as total FROM  alert ") or die(mysqli_error());
$count1 = $alert->fetch_array();
?>
<a href="announcement.php?ID=<?php echo $user['id']?>" class="notification">
<i class="las la-bullhorn"></i>
	<span class="badge bg-danger" id="count" style="color:white;  border-radius: 60%;position: relative;top: -10px;left: -7px;font-size: 8px;"><?php echo $count1['total']; ?></span>
</a>
<a href="notification.php" class="notification">
<i class="las la-bell"></i>
	<span class="badge bg-danger" id="counts" style="color:white;  border-radius: 60%;position: relative;top: -10px;left: -7px;font-size: 8px;"><?php echo $count['total']; ?></span>
</a>
			
		</nav>
		<main>
			
            <div class="table-data">
				<div class="center">
				<?php
				if(isset($_SESSION['error'])){
				echo "
					<div class='alert alert-danger alert-dismissible'>
					<h6><i class='icon fa fa-warning'></i> Error!</h6>
					".$_SESSION['error']."
					</div>
				";
				unset($_SESSION['error']);
				}
				if(isset($_SESSION['success'])){
				echo "
					<div class='alert alert-success alert-dismissible'>
					".$_SESSION['success']."
					</div>
				";
				unset($_SESSION['success']);
				}
			?>    
                       
                        <div class="card-content">
                        <img src="<?php echo (!empty($user['photo'])) ? 'img/'.$user['photo'] : 'img/profile.jpg'; ?>">
                            <div class="card-info">
                                <h3><?php echo $user['fname']." ". $user['lname'];?></h3>
                                <h1><?php echo $user['location'];?></h1>
                            </div>
                            
                        </div>
                        <div class="details">
                           <a href="profile.php">Profile</a>&nbsp;&nbsp;&nbsp;<a href="security.php" class="active">Security Setting</a>
                            <div class="content">
                            <form action="CRUD/update_profile.php?ID=<?php echo $user['id'];?>" method="post" class="form" enctype="multipart/form-data">  
                                   
                                    
                                    <div class="input-box">
                                        <label>Current Password</label>
                                        <input type="password" name="old" id="pass" >
                                    </div>
                                    <div class="input-box">
                                        <label>New Password</label>
                                        <input type="password" name="new" id="pass" >
                                    </div>
                                    <div class="input-box">
                                        <label>Confirm Password</label>
                                        <input type="password" name="confirm" id="pass" >
                                    </div>


                                    
                                      
                                   
                                    <button class="save" name="pass">Update</button>
                                  </form>
                            </div>
                        </div>
                    
				</div>
            </div>
		
		</main>

	</section>

	
<script>
	const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})

</script>
</body>
</html>
<style>
	a:hover{
		text-decoration: none;
	}
	.details a{
		color: #000;
		text-decoration:none;
	}
	.details a.active{
		color: #db4a07;
		text-decoration:underline;
	}
	@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

a {
	text-decoration: none;
}

li {
	list-style: none;
}

:root {
	--poppins: 'Poppins', sans-serif;
	--lato: 'Lato', sans-serif;

	--light: #F9F9F9;
	--orange: #ff6600;
	--light-blue: #CFE8FF;
	--grey: #eee;
	--dark-grey: #AAAAAA;
	--dark: #342E37;
	--red: #DB504A;
	--yellow: #FFCE26;
	--light-yellow: #FFF2C6;
	--orange: #FD7238;
	--light-orange: #FFE0D3;
}

html {
	overflow-x: hidden;
}

body.dark {
	--light: #0C0C1E;
	--grey: #060714;
	--dark: #FBFBFB;
}

body {
	background: var(--grey);
	overflow-x: hidden;
}





/* SIDEBAR */

#sidebar {
	position: fixed;
	top: 0;
	left: 0;
	width: 280px;
	height: 100%;
	background: var(--light);
	z-index: 2000;
	font-family: var(--lato);
	transition: .3s ease;
	overflow-x: hidden;
	scrollbar-width: none;
}



#sidebar::--webkit-scrollbar {
	display: none;
}

#sidebar {
	width: 60px;
}
#sidebar img {
	margin-top: 10px;
	margin-bottom: 10px;
}

#sidebar .side-menu {
	width: 100%;
	margin-top: 2px;
}
#sidebar .side-menu li {
	height: 48px;
	background: transparent;
	margin-left: 6px;
	border-radius: 48px 0 0 48px;
	padding: 4px;
}
#sidebar .side-menu li.active {
	background: var(--grey);
	position: relative;
}
#sidebar .side-menu li.active::before {
	content: '';
	position: absolute;
	width: 40px;
	height: 40px;
	border-radius: 50%;
	top: -40px;
	right: 0;
	box-shadow: 20px 20px 0 var(--grey);
	z-index: -1;
}
#sidebar .side-menu li.active::after {
	content: '';
	position: absolute;
	width: 40px;
	height: 40px;
	border-radius: 50%;
	bottom: -40px;
	right: 0;
	box-shadow: 20px -20px 0 var(--grey);
	z-index: -1;
}
#sidebar .side-menu li a {
	width: 100%;
	height: 100%;
	background: var(--light);
	display: flex;
	align-items: center;
	border-radius: 48px;
	font-size: 16px;
	color: var(--dark);
	white-space: nowrap;
	overflow-x: hidden;
}
#sidebar .side-menu.top li.active a {
	color: var(--orange);
}
#sidebar.hide .side-menu li a {
	width: calc(48px - (4px * 2));
	transition: width .3s ease;
    text-decoration: none;
}

#sidebar .side-menu li a.logout {
	color: var(--red);
}
#sidebar .side-menu.top li a:hover {
	color: var(--orange);
}
#sidebar .side-menu li a .bx {
	min-width: calc(60px  - ((4px + 6px) * 2));
	display: flex;
	justify-content: center;
}

#content {
	position: relative;
	width: 100%;
	left: 50px;
	transition: .3s ease;
}
#sidebar.hide ~ #content {
	width: calc(100% - 60px);
	left: 60px;
}
#content li{
	margin-right:40px;
}




/* NAVBAR */
#content nav {
	height: 56px;
	background: var(--light);
	padding: 0 24px;
	display: flex;
	align-items: center;
	grid-gap: 24px;
	font-family: var(--lato);
	position: sticky;
	top: 0;
	left: 0;
	z-index: 1000;
}
#content nav::before {
	content: '';
	position: absolute;
	width: 40px;
	height: 40px;
	bottom: -40px;
	left: 0;
	border-radius: 50%;
	box-shadow: -20px -20px 0 var(--light);
}
#content nav a {
	color: var(--dark);
}
#content nav .bx.bx-menu {
	cursor: pointer;
	color: var(--dark);
}
#content nav .nav-link {
	font-size: 16px;
	transition: .3s ease;
	
}
#content nav .nav-link:hover {
	color: var(--orange);
}
#content nav form {
	max-width: 400px;
	width: 100%;
	margin-right: auto;
}
#content nav form .form-input {
	display: flex;
	align-items: center;
	height: 36px;
}
#content nav form .form-input input {
	flex-grow: 1;
	padding: 0 16px;
	height: 100%;
	border: none;
	background: var(--grey);
	border-radius: 36px 0 0 36px;
	outline: none;
	width: 100%;
	color: var(--dark);
}
#content nav form .form-input button {
	width: 36px;
	height: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
	background: var(--orange);
	color: var(--light);
	font-size: 18px;
	border: none;
	outline: none;
	border-radius: 0 36px 36px 0;
	cursor: pointer;
}
#content nav .notification {
	font-size: 20px;
	position: relative;
}
#content nav .notification .num {
	position: absolute;
	top: -6px;
	right: -6px;
	width: 20px;
	height: 20px;
	border-radius: 50%;
	border: 2px solid var(--light);
	background: var(--red);
	color: var(--light);
	font-weight: 700;
	font-size: 12px;
	display: flex;
	justify-content: center;
	align-items: center;
}


/* NAVBAR */





/* MAIN */
#content main {
	width: 100%;
	padding: 36px 10px;
	font-family: var(--poppins);
	max-height: calc(100vh - 56px);
	overflow-y: auto;
}
#content main .head-title {
	display: flex;
	align-items: center;
	justify-content: space-between;
	grid-gap: 16px;
	flex-wrap: wrap;
}
#content main .head-title .left h1 {
	font-size: 30px;
	font-weight: 600;
	margin-bottom: 10px;
	color: var(--dark);
}
#content main .head-title .left .breadcrumb {
	display: flex;
	align-items: center;
	grid-gap: 16px;
}
#content main .head-title .left .breadcrumb li {
	color: var(--dark);
}
#content main .head-title .left .breadcrumb li a {
	color: var(--dark-grey);
	pointer-events: none;
}
#content main .head-title .left .breadcrumb li a.active {
	color: var(--orange);
	pointer-events: unset;
}


#content main .table-data {
	display: flex;
	flex-wrap: wrap;
	grid-gap: 24px;
	
	width: 90%;
	color: var(--dark);
}
#content main .table-data > div {
	border-radius: 20px;
	background: transparent;
	padding: 10px;
	overflow-x: auto;
}


#content main .table-data .center {
	flex-grow: 1;
	flex-basis: 500px;

}
#content main .table-data .center table {
	width: 100%;
	border-collapse: collapse;
}
#content main .table-data .center table th {
	padding-bottom: 12px;
	font-size: 13px;
	text-align: left;
	border-bottom: 1px solid var(--grey);
}
#content main .table-data .center table td {
	padding: 16px 0;
}


#content main .table-data .center table tbody tr:hover {
	background: var(--grey);
}

.card-content{
	
    background: transparent;
    box-shadow: var(--shadow);
    border-radius: 15px;
  
    text-align: center;
}
.card-content img{
    width: 100px;
    height: 100px;
    border-radius: 50%;
}

.card-content .details{
    color: var(--dark);
    font-weight: bold;
    font-size: 12px;
}
.card-content a.active{
	text-decoration:none;
}
.card-info{
	
    margin-bottom: 1.5rem;
}
.card-info h3,
.card-info h1{
    color: var(--color-main);
	font-size:20px;
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
.card-id{
    background: var(--main-accent);
    border: 1px solid var(--color-main);
    padding: 1rem;
    border-radius: 10px;
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
/* MAIN */
/* CONTENT */



.form {
    margin-top: 20px;
  }
  .form .input-box {
    width: 100%;
    margin-top: 3px;
  }
  .input-box label {
    color: #333;
    font-size: 12px;
  }
  .form :where(.input-box input, .select-box) {
    position: relative;
    height: 30px;
    width: 100%;
    outline: none;
    font-size: 12px;
    color: #707070;
    margin-top: 2px;
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 0 10px;
  }
  .input-box input:focus {
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
  }
  .form .column {
    display: flex;
    column-gap: 15px;
  }
 
 
  .form button {
    height: 40px;
    width: 100%;
    color: #fff;
    font-size: 12px;
    font-weight: 400;
    margin-top: 30px;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
    background: #ff6600;
  }
  .form button:hover {
    background: #ff6600;
  }
  .dropdown-menu li {
    position: relative;
    }






@media screen and (max-width: 768px) {
	#sidebar {
		width: 60px;
	}

	#content {
		width:100%;
		left: 50px;
	}

	#content nav .nav-link {
		display: none;
	}
   
   
}






@media screen and (max-width: 576px) {
	#content nav form .form-input input {
		display: none;
	}
#content main .head-title .left .breadcrumb li a.active {
	color: var(--orange);
	pointer-events: unset;
}
	#content nav form .form-input button {
		width: auto;
		height: auto;
		background: transparent;
		border-radius: none;
		color: var(--dark);
	}
	

	#sidebar .brand h6{
		font-size: 8px;
		display: none;
	}
	#content nav form.show .form-input input {
		display: block;
		width: 100%;
	}
	#content nav form.show .form-input button {
		width: 36px;
		height: 100%;
		border-radius: 0 36px 36px 0;
		color: var(--light);
		background: var(--red);
	}

	#content nav form.show ~ .notification,
	#content nav form.show ~ .profile {
		display: none;
	}

	#content main .box-info {
		grid-template-columns: 1fr;
	}

	#content main .head-title .left h1 {
		font-size: 11px;
        margin-bottom: 10px;
		
	}
   
	#content main .table-data .head {
		min-width: 420px;
	}
	#content main .table-data .center table {
		min-width: 420px;
        font-size: 10px;
	}
	

}
</style>

<?php


?>



