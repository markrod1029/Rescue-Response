<?php
  session_start();
  include 'includes/conn.php';
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


            <div class="title">New Password</div>
          <form action="newpass.php" method="post">
            <div class="input-boxes">
              <div class="input-box">
              <i class="las la-lock"></i>
                <input type="password" name="new" id="user" placeholder="New Password" >
              </div>
              <div class="input-box">
              <i class="las la-lock"></i>
                <input type="password" name="confirm" id="user" placeholder="Confirm Password" >
                <input type="hidden" name="email" class="form-control" value='<?php echo $_SESSION['email'] ?>'>
              </div>
              
              
              <div class="button input-box">
                <input type="submit" value="Submit" name="update" id="login">
              </div> 
             
            </div>
           
        </form>
        <br>
        
      </div>
    </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>



<?php


if (isset($_POST["update"]))
{
     // Get all input fields
    $email = $_POST['email'];

    $new_password = $_POST["new"];
    $confirm_password = $_POST["confirm"];


     // Check if current password is correct
     $sql = "SELECT * FROM users WHERE user = '" . $email . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_object($result);

         // Check if password is same
        if ($new_password == $confirm_password)
        {

            

                $update = "UPDATE users SET pass='" . password_hash($new_password, PASSWORD_DEFAULT) . "',resettoken='NULL',resettokenexp=NULL WHERE user = '$email'";
                mysqli_query($conn, $sql);

            if ($conn->query($update)===TRUE) {

                $_SESSION['success'] = 'Password has been successfully changed';

                echo "
                <script>
                window.location.href='index.php'                     
                </script>";

            }

            else{

            $_SESSION['error'] = $conn->error;

            }


            
        }
        else
        {
            $_SESSION['error'] = 'The password you entered does not match';
     
            echo "
            <script>
            window.location.href='newpass.php'                     
            </script>";

        }
    
}
?>
