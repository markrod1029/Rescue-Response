
   <?php
  session_start();
  if(isset($_SESSION['admin'])){
    header('location:dashboard.php');
  }




?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="img/scclogo.png" />
    <title>CDRRMO - Login</title>
    <link rel="stylesheet" href="css/index.css">
    <script src="https://kit.fontawesome.com/787042df18.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
</head>
<?php include 'connections/connection.php'; ?>
<body class="hold-transition skin-blue layout-top-nav login-page">

<div class="container">
        <div class="svg">
            <img src="img/login.svg" alt="">
        </div>
        <div class="login">
            <form action="login_process.php" method="post">
            <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h6><i class='icon fa fa-warning'></i> Error!</h6>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
                <img src="img/scclogo.png" alt="">
                <h3 class="title">Login</h3>
                <div class="txt-field">
                
                <input type="text" name="username" id="username" required>
                <span></span>         
            <label>Username</label>
        </div>
        <div class="txt-field">
            
            <input type="password" name="password" id="password" required>
            <span></span>
            <label>Password</label>
            </div>
            <div class="forgotpass">Forgot Password?</div>
            <input type="submit" value="Login" name="login" id="login">
        <!-- <div class="reg">
            Not registered? <a href="#">Register Here</a>
        </div> -->


            </form>

      
        </div>
    </div>
      
</body>
</html>




