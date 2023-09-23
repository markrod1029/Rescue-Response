<?php

include_once("includes/conn.php");

$sql = "SELECT * FROM hotline ORDER BY id ASC";
$line = $conn->query($sql) or die($conn->error);
$row = $line->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
 
	<link rel="stylesheet" href="ccs/hotline.css">

	<title>City Disaster Risk Reduction and Management Office</title>
</head>
<body>

	
	<section id="content">
	
		<nav>
			<img src="img/scclogo.png" alt="" height="60px" width="60px">
			<a href="#" class="nav-link">City Disaster Risk Reduction and Management Office</a>
			
			
			
		</nav>
		
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Emergency Hotlines</h1>
					
				</div>
				
			</div>

			
			<div class="table-data">
				<div class="center">
					
					<table>
						<thead>
							<tr>
								<th>Department</th>
                                <th>Mobile</th>
								<th>Landline</th>
								
							</tr>
						</thead>
						<tbody>
						<?php
                   $sql = "SELECT * FROM hotline";
                   $query = $conn->query($sql);
                   $data = array();
                   while($row = $query->fetch_assoc()){
                ?>
							<tr>
								<td><?php echo $row['name'];?></td>
                                <td><?php echo $row['phone_num'];?></td>
								<td><?php echo $row['hotline_num'];?></td>
							</tr>
                         
							<?php } ?>
							
						</tbody>
					</table>
				</div>
		
				
		</main>
		
	
	</section>

	
</body>
</html>
<style>
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




/* NAVBAR */
#content nav {
	width: 100%;
    height: 80px;
	background: var(--light);
	padding: 0 24px;
	display: flex;
	align-items: center;
	grid-gap: 24px;
	font-family: var(--lato);
	position: sticky;
	
}

#content nav a {
	color: var(--dark);
}
#content nav .bx.bx-menu {
	cursor: pointer;
	color: var(--dark);
}
#content nav .nav-link {
	font-size: 30px;
	transition: .3s ease;
	
}
#content nav .nav-link:hover {
	color: var(--orange);
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
	width: 100%;
	color: var(--dark);
}
#content main .table-data > div {
	border-radius: 20px;
	background: var(--light);
	padding: 24px;
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
.login-signup{
        text-align: center;}

@media screen and (max-width: 768px) {


	#content {
		width: 100%;
		left: 200px;
	}

	#content nav .nav-link {
		font-size: 15px;
	}
   
}






@media screen and (max-width: 576px) {


	#content main .box-info {
		grid-template-columns: 1fr;
	}

	#content main .head-title .left h1 {
		font-size: 20px;
        margin-bottom: 10px;
		
	}
   
	#content main .table-data .head {
		min-width: 420px;
        font-size: 12px;
	}
	#content main .table-data .center table {
		min-width: 420px;
        font-size: 10px;
	}
	

}
</style>