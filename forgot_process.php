<?php
require 'PHPMailer/class.phpmailer.php';
    require ('includes/conn.php');
    session_start();



    if (isset($_POST['link'])) {
         
         $email = $_POST['user'];

        $sql="SELECT * FROM users WHERE user = '$email'";
        $result = $conn->query($sql);
    
        if ($result->num_rows >= 1) {
            
            if ($row = $result->fetch_assoc()) {
                   $fullname = $row['fname'].' '.$row['lname'];
                
                $numbers = '';
                for($i = 0; $i < 10; $i++){
                    $numbers .= $i;
                }
                $reset_token = substr(str_shuffle($numbers), 0, 6);

                date_default_timezone_set('Asia/Manila');
                $date = date("Y-m-d");


                $sql = "UPDATE users SET resettoken ='$reset_token', resettokenexp = '$date' WHERE user = '$email'";

                if (($conn->query($sql)===TRUE)) {
                  
                    $_SESSION['success'] = 'The password has been reset. Please check the authentication code that has been sent to your email.';
                    $_SESSION['email'] = $email;

            $mail = new PHPMailer(true); 

        	$mail->IsSMTP();                           
        	$mail->SMTPAuth   = false;                 
        	$mail->Port       = 25;                    
        	$mail->Host       = "localhost"; 
        	$mail->Username   = "preparatory-log.online";   
        	$mail->Password   = "Markrod29";            
        	$mail->IsSendmail();  
        	$mail->From       = "preparatory-log.online";
        	$mail->FromName   = "markrodcadayong17@gmail.com";
        
        	$mail->AddAddress($email);
            $mail->Subject = 'Password Reset Code City Disaster Risk Reduction and Management Office';
        	$mail->WordWrap   = 80; 
        
              $mail->isHTML(true);
            $mail->Body    = "Hi $fullname,<br>
            We received a request to reset your password.<br>
            Enter the following password reset code: '$reset_token'";
 
                 
            if(!$mail->Send())
            {
                   echo "Mail Not Sent";
                    header('location:forgot.php');
            }
            else
            {
               	echo '<script language="javascript">';
    	        echo 'alert("Thank you for reaching us! We will respond as early as possible.")';
    	        echo '</script>';
                 header('location:reset.php');
                 
            } 

                    }else{
                    $_SESSION['error'] = 'Something is wrong';
                     header('location:forgot.php');

                    }

            }else{
            $_SESSION['error'] = 'Server Down';
           
                  header('location:forgot.php');
            }   


            header('location:reset.php');

            
        }else{
  
            $_SESSION['error'] = 'Email is not found';
          header('location:forgot.php');

        }
        
        
    
        	
}        	    
        
                
