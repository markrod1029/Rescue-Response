<?php include 'includes/session.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="css/proof.css">
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/x-icon" href="img/scclogo.png" />
    <script async src="https://www.google-analytics.com/analytics.js"></script>
	<title>Proof</title>
</head>
<body>

	<section id="sidebar">

			<center><img src="img/scclogo.png" alt="" width="50px" height="50px" ></center>
			

		<ul class="side-menu top">
			<li class="active">
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
			<li>
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
			
            
			<ul class="box-info">

			<!-- <?php
        if(isset($_SESSION['error'])){
			echo "
			  <div class='alert alert-danger alert-dismissible' style='width:500px;'  >
				<button type='button' class='close' data-dismiss='alert'  aria-hidden='true'>&times;</button>
				<h5><i class='icon fa fa-warning'></i> Error!</h5>
				".$_SESSION['error']."
			  </div>
			";
			unset($_SESSION['error']);
		  }
		  if(isset($_SESSION['success'])){
			echo "
			  <div class='alert alert-success alert-dismissible' style='width:500px;'>
				<button type='button' class='close' data-dismiss='alert'  aria-hidden='true'>&times;</button>
				<h5><i class='icon fa fa-check'></i> Success!</h5>
				".$_SESSION['success']."
			  </div>
			";
			unset($_SESSION['success']);
		  }
  
		
		?> -->

				<li>
                <div class="title">Proof</div>
                <div class="content">
                <form action="CRUD/user_location.php" method="post" enctype="multipart/form-data">
                <div class="user-details">
                <div class="input-box">
                    <span class="details">Image</span>
                    <input type="file" name="image" id="name" placeholder="Attach Image" required>
                    <input type="hidden" style="width:500px;" value="<?php echo $user['fname']. ' '.$user['lname'];?>" name="name"><br>
                    <input type="hidden" style="width:500px;" value="<?php echo $user['id'];?>" name="id" ><br>
                    <input type="hidden" name="address" id="address" placeholder="Attach Image" value="<?php echo $_POST['address']?>" required>
                    <input type="hidden" name="lat" id="lat" placeholder="Attach Image" value="<?php echo $_POST['lat']?>" required>
                    <input type="hidden" name="long" id="long" placeholder="Attach Image" value="<?php echo $_POST['long']?>" required>
                </div>
                <div class="input-box">
                    <span class="details">Details</span>
                    <textarea name="incident_details" id="actions_taken" cols="27" rows="5" style="padding:10px;" placeholder="Details" required></textarea>
                </div>
                </div>
                <div class="button">
                <input type="submit" name="submit" value="Submit">
                </div>
                </form>
            </div>

   
				</li>
				
			</ul>

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
	@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap');

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



#content main {
	width: 100%;
	padding: 36px 24px;
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
	font-size: 28px;
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





#content main .box-info {

	margin-top: 36px;
}
#content main .box-info li {
	padding: 24px;
	background: var(--light);
	border-radius: 10px;
	align-items: center;

}
#content main .box-info li .bx {
	width: 80px;
	height: 80px;
	border-radius: 10px;
	font-size: 36px;
	display: flex;
	justify-content: center;
	align-items: center;
}






#content main .table-data {
	display: flex;
	flex-wrap: wrap;
	grid-gap: 24px;
	margin-top: 24px;
	width: 100%;
	color: var(--dark);
}
#content main .table-data > div {
	border-radius: 20px;
	background: var(--light);
	padding: 24px;
	overflow-x: auto;
}
#content main .table-data .head {
	display: flex;
	align-items: center;
	grid-gap: 16px;
	margin-bottom: 24px;
}
#content main .table-data .head h3 {
	margin-right: auto;
	font-size: 24px;
	font-weight: 600;
}
#content main .table-data .head .bx {
	cursor: pointer;
}

#content main .table-data .order {
	flex-grow: 1;
	flex-basis: 500px;
}


.title{
    font-size: 25px;
    font-weight: 500;
    position: relative;
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

    background: rgb(234, 65, 23);
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
		font-size: 9px;
		font-weight: 600;
		margin-bottom: 10px;
		color: var(--dark);
	}
	#content main .table-data .head {
		min-width: 420px;
	}
	#content main .table-data .order table {
		min-width: 420px;
	}
	#content main .table-data .todo .todo-list {
		min-width: 420px;
	}

    form .user-details .input-box{
        margin-bottom: 15px;
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
</style>

