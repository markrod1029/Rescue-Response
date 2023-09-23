<?php
include_once("connections/session.php");

	require 'PHPMailer/class.phpmailer.php';
	
	

$id = $_GET['ID'];
$email = $_GET['email'];
    $query = "SELECT * from users where id = '$id'";
	$status	= "Approved";


    
    function generatePassword($length = 8) {
  // Define the characters that will be used to generate the password
  $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

  // Shuffle the characters randomly
  $shuffled_chars = str_shuffle($chars);

  // Take the first $length characters from the shuffled string as the password
  $password = substr($shuffled_chars, 0, $length);

  // Return the generated password
  return $password;
}

// Generate an 8-character password
$password = generatePassword();

  $pass =  password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "UPDATE users SET pass ='$pass', status = '$status' WHERE id = '$id'";

    
		if($conn->query($sql)){
			$_SESSION['success'] = 'Your Account has been approved!';

            $query = mysqli_query($conn,$sql);
            
            
            				
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
        	$mail->WordWrap   = 80; 
              $mail->isHTML(true);
            $mail->Subject = 'San Carlos CDRRMO (Account Notification)';
            $mail->Body    = "Hi!<br><br>
           Congratulations! <br>We are writing to inform that your account is now verified! You can log in your account using the following credentials:<br>
           Email: $email<br>
           Password:$password<br><br>
           If you have forgotten your password, you can reset it by clicking on the 'Forgot Password' on the login page.<br>
            Thank you for being a part of the City Disaster Risk Reduction and Management Office - San Carlos City. If you have any questions or concerns, please do not hesitate to reach us.
            <br><br>Best regards,
            <br>City Disaster Risk Reduction and Management Office";
 
                 
            if(!$mail->Send())
            {
                   echo "Mail Not Sent";
                  
            }
            else
            {
                echo "Mail Sent";
                

            } 

		}
        
		else{
			$_SESSION['error'] = $conn->error;
		}


        header('location: user_approved.php');
