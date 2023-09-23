<?php
// error_reporting(0);

include_once("connections/session.php");

include '../timezone.php'; 
$today = date('Y-m-d');
$year = date('Y');
if(isset($_GET['year'])){
  $year = $_GET['year'];
}


$month = date('M');



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="img/scclogo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/report.css">
    <title>Report</title>
    
     
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
                <div class="header-title">
                    <h1>Reports</h1>
                    <p>Report of the Month<span class="las la-chart-line"></span></p>
                </div>
                <div>
                    
                </div>
            </div>
        </header>

        <main>
            <section>
            <button class="btn btn-success" style="width:100px;outline:none;"><a href="report_details.php" style="color:#fff;text-decoration:none"><i class="las la-info-circle"></i>&nbsp;Details</a></button>
            <button class="btn btn-primary" style="width:100px;outline:none;"><a href="report_add.php" style="color:#fff;text-decoration:none"><i class="las la-plus-square"></i>&nbsp;New</a></button>

                <div class="graph-content">
                <center><div><canvas id="line-chart"></canvas></div> </center>

                </div>
            
                <div class="analytics">

                        <div class="graph-content">
                            <div id="chartContainer2"></div>
                        </div>
                    
    
                        <div class="graph-content">
                            <div id="chartContainer3"></div>
                        </div>
                        <?php include_once("chart/pie_chart.php")?>

                </div>
          
            </section>

            
            <section>

            <?php
                $mon = date('m');
                $months = date('M');
            $sql = "SELECT * FROM incident_info WHERE incident = 'Medical' AND sub_incident = 'Stroke' AND month = '$mon' ";
            $tquery = $conn->query($sql);
            $Stroke = $tquery->num_rows;
            
            
            $sql = "SELECT * FROM incident_info WHERE incident = 'Medical' AND sub_incident = 'Highblood' AND month = '$mon' ";
                $squery = $conn->query($sql);
                $Highblood = $squery->num_rows;
            
            
                $sql = "SELECT * FROM incident_info WHERE incident = 'Medical' AND sub_incident = 'Others' AND month = '$mon' ";
                $aquery = $conn->query($sql);
                $Others = $aquery->num_rows;

             $medical =   $Stroke + $Highblood +   $Others;

          
             if($medical == null){

                $stro =   0;
                $high =    0;
                 $oth =    0;
             }

             else{
                $stro =    $Stroke  / $medical * 100;
                $high =    $Highblood  / $medical * 100;
                 $oth =    $Others  / $medical * 100;
   
             }
             
             
            if( $stro >   $high && $stro > $oth  ){
                $fm = $stro;
                $fmc = 'Stroke';

                if( $high > $oth ){
                    $sm = $high;
                    $smc = 'Highblood';
                    $tm = $oth;
                    $tmc = 'Others';
                }
                else{
                    $sm = $oth;
                    $smc = 'Others';
                    $tm = $high;  
                    $tmc = 'Highblood';
                }
            }

            
            else  if( $high >   $stro && $high > $oth  ){
                $fm = $high;
                $fmc = 'Highblood';

                if( $stro > $oth ){
                    $sm = $stro;
                    $smc = 'Stroke';
                    $tm = $oth;
                    $tmc =  'Others';
                }
                else{
                    $sm = $oth;
                    $smc = 'Others';
                    $tm = $stro;  
                    $tmc =  'Stroke';
                }
            }

            else {

                $fm = $oth;
                $fmc = 'Others';

                if( $stro > $high ){
                    $sm = $stro;
                    $smc = 'Stroke';
                    $tm = $high;
                    $tmc =  'Highblood';
                }
                else{
                    $sm = $high;
                    $smc = 'Highblood';
                    $tm = $stro;  
                    $tmc =  'Stroke';
                }
            }




            



            $sql = "SELECT * FROM incident_info WHERE incident = 'Trauma' AND sub_incident = 'Self Accident' AND month = '$mon' ";
            $tquery = $conn->query($sql);
            $Self = $tquery->num_rows;



            $sql = "SELECT * FROM incident_info WHERE incident = 'Trauma' AND sub_incident = 'Vehicle Accident' AND month = '$mon' ";
            $squery = $conn->query($sql);
            $Vehicle = $squery->num_rows;

            $sql = "SELECT * FROM incident_info WHERE incident = 'Trauma' AND sub_incident = 'Drowning' AND month = '$mon' ";
            $squery = $conn->query($sql);
            $Drowning = $squery->num_rows;

            

            $sql = "SELECT * FROM incident_info WHERE incident = 'Trauma' AND sub_incident = 'Others' AND month = '$mon' ";
            $otquery = $conn->query($sql);
            $Others1 = $otquery->num_rows;
            

            $trauma =   $Self + $Vehicle +   $Drowning + $Others1 ;


            if($trauma == null){

                $sel =   0;
                $vech =   0;
                $drow =   0;
                $oths =   0;
             }

             else{
                $sel =    $Self  / $trauma * 100;
                $vech =    $Vehicle  / $trauma * 100;
                $drow =    $Drowning  / $trauma * 100;
                $oths =    $Others1  / $trauma * 100;
   
             }


           
            include_once("chart/report_sub_incident.php")

            ?>

          <div class="pres">
            <h2>Medical</h2>
           <p>The data shows that most of the medical responses are due to  <?php echo $fmc.' ('. $fm ?>%)
                , and <?php echo $smc.' ('. $sm ?>%). The data also shows that 
                <?php echo $tmc.' ('. $tm ?>%) of the medical responses are due to other reasons.</p>
           
        </div>
            <div class="pres">
        <h2>Trauma</h2>
    <p>The data shows that most of the trauma responses are due to <?php echo $fstc. '('. $fst ?>%),
            <?php echo $stc. '('. $st ?>%), and <?php echo $ttc. '('. $tt ?>%). 
                The data also shows that <?php echo $ftc. '('. $ft ?>%) of the trauma responses are due to other reasons.</p>
            
        </div>


        
            </section>
       
        </main>
        
     
</body>
</html>
<style>
    .datas {
	padding: 15px;
	width: 500px;
	border-radius: 0%;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 9rem;
   

}
 h2{
    color: #8d8fa1;
    font-size:15px;
    font-weight:400;
}
.datas .data {
	margin: 5px 5px;
}

.data p {
	margin-bottom: 1px;
	color: #000;
	font-size: 12px;
}

.data .progress-line {
	position: relative;
	width: 10%;
	height: 12px;
	background: rgba(255, 255, 255, 0.05);
	border-radius: 0%;
}



@keyframes circle-animate {
	25% {
		left: 0;
		opacity: 1;
	}
	100% {
		opacity: 1;
		left: calc(var(--wd) - 8px);
	}
}

.data .progress-line span {
	position:relative;
	display: inline-block;
	height: 100%;
	width: 0;
	
	background: var(--bg);
	border-radius: 0%;

	animation: span-animate 2s forwards ease-out;
}

.data .progress-line span::after {
	position: absolute;
	content: var(--tx);
	color: #000;
	
	padding: 3px 6px;
	font-size: 12px;
	font-weight: 200;
	border-radius: 4px;
	margin-left: 50px;
	opacity: 0;
	height: 50%;
	animation: hint 0.2s forwards 2.2s;
}

@keyframes span-animate {
	25% {
		width: 0;
	}
	100% {
		width: var(--wd);
	}
}



@keyframes hint {
	to {
		transform: translateY(-5px);
		opacity: 1;
	}
}





</style>