<?php
  session_start();
  if(isset($_SESSION['user_login'])){
    header('location:dashboard.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/scclogo.png" />
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
 
    <script src="https://kit.fontawesome.com/787042df18.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-light" id="nav">
        <a class="navbar-brand" href="#">
          <img src="img/scclogo.png" width="70" height="70" class="d-inline-block align-top" alt="">
         <span>City Disaster Risk Reduction and Management Office</span> 
        </a>
    </nav>
    
        
    <div class="forms">
        <div class="form-content">
        

          <div class="login-form">
              
                  <?php
        if(isset($_SESSION['error'])){
          echo " <br>
            <div class='alert alert-danger alert-dismissible'>
              ".$_SESSION['error']."
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            </div>
          ";;
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              ".$_SESSION['success']."
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>

            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>


            <div class="title">Recover your account</div>
          <form action="forgot_process.php" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" name="user" id="user" placeholder="Enter your Email" >
              </div>
              
            
                  <button type="button" class="btn btn-danger"><a href="index.php" style="color: #fff; text-decoration:none;">Cancel</a></button>&nbsp;&nbsp;
                  <button type="button" class="btn btn-primary"><input type="submit" value="Submit" name="link" id="login" style="background:transparent; border:none; color:#fff;"></button>
                 
    
             
            </div>
           
        </form>
        <br>
        
      </div>
    </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>