<?php

// include_once("includes/conn.php");


?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/scclogo.png" />
    <link rel="stylesheet" href="css/reg.css">
    <script src="https://kit.fontawesome.com/787042df18.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>
  <!-- <nav class="navbar navbar-light" id="nav">
        <a class="navbar-brand" href="#">
          <img src="img/scclogo.png" width="70" height="70" class="d-inline-block align-top" alt="">
         <span>City Disaster Risk Reduction and Management Office</span> 
        </a>
    </nav> -->
    <div class="container">
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
        <div class="title">Register Here</div>
        <div class="content">
          <form action="add_user.php" method="POST" enctype="multipart/form-data">
            <div class="user-details">
              <div class="input-box">
                <span class="details">First Name</span>
                <input type="text" name="fname" placeholder="First Name" required>
              </div>
              <div class="input-box">
                <span class="details">Last Name</span>
                <input type="text" name="lname" placeholder="Last Name" required>
              </div>
              <div class="input-box">
                <span class="details">Phone Number</span>
               
                <input type="text" name="contactnum"  minlength="11" maxlength="11"   pattern="\d{11}" title="11-digit Phone Number"  placeholder="Phone Number" data-mdb-input-mask="+63 0000-000-0000" required> 
              </span>
              </div>

           

        

<!-- 
              <div class="input-box">
              <span class="details">Incident</span>
              <select onchange="countryChange(this);"  name="incident">
              <option value="empty">Select a Incident</option>
              <option value="Medical">Medical</option>
                        <option value="Trauma">Trauma</option>
            </select><br><br>
               -->



         

              <div class="input-box">
                <span class="details">Email</span>
                <input type="text" name="user" placeholder="Email" required>
              </div>

                     <!-- <div class="input-box">
                <span class="details">Location City</span>
               
                <select onchange="countryChange(this);"  name="city">
                <option value="empty">Select a City</option>
            <option value="San Carlos City">San Carlos City</option>
            </select>
              </span>
              </div> -->
  
              <div class="input-box">
              <span class="details">Barangay</span>
          <span class="details"></span>
          <select id="location" name="location">
    <option value="">Select</option>
  </select>
              </span>
              </div>

              <!-- <div class="input-box">
                <span class="details">Password</span>
                <input type="password"   name="pass" placeholder="Enter your password" required>
              </div> -->
              <div class="input-box">
                <span class="details">Valid ID</span>
                <input type="file"   name="valid" placeholder="Valid ID" required>
              </div>
            </div>
            
            <div class="button">
              <input type="submit" name="register" value="Register">
            </div>
          </form>
          <div class="login-signup">
            <span class="text">Already have account?
                <a href="index.php" class="text signup-link text-primary">Login Now</a>
            </span>
        </div>
        </div>
      </div>
    
</body>
</html>
<!-- JavaScript code -->
<script>
var barangayLists = {
  "San Carlos City":["Abanon", "M.Soriano St. (Poblacion)", "Agdao", "Anando", "Ano", "Antipangol", "Aponit", "Bacnar", "Balaya", "Balayong", "Baldog", "Balite Sur", "Balococ", "Bani", "Bocboc", "Bugallon-Posadas Street (Poblacion)", "Bogaoan", "Bolingit", "Bolosan", "Bonifacio (Poblacion)", "Buenglat", "Burgos-Padlan (Poblacion)", "Cacaritan", "Caingal", "Calobaoan", "Calomboyan", "Capataan", "Caoayan-Kiling", "Cobol", "Coliling", "Cruz", "Doyong", "Gamata", "Guelew", "Ilang", "Inerangan", "Isla", "Libas", "Lilimasan", "Longos", "Lucban (Poblacion)", "Mabalbalino", "Mabini (Poblacion)", "Magtaking", "Malacañang", "Maliwara", "Mamarlao", "Manzon", "Matagdem", "Mestizo Norte", "Naguilayan", "Nelintap", "Padilla-Gomez (Poblacion)", "Pagal", "Palaming", "Palaris (Poblacion)", "Palospos", "Pangalangan", "Pangoloan", "Pangpang", "Paitan-Panoypoy", "Parayao", "Payapa", "Payar", "Perez Boulevard (Poblacion)", "PNR Site (Poblacion)", "Polo", "Quezon Boulevard (Poblacion)", "Quintong", "Rizal Avenue (Poblacion)", "Roxas Boulevard (Poblacion)", "Salinap", "San Juan", "San Pedro (Poblacion)", "Sapinit", "Supo", "Talang", "Taloy (Poblacion)", "Tamayo", "Tandoc", "Tarece", "Tarectec", "Tayambani", "Tebag", "Turac", "Tandang Sora (Poblacion)"],
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
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
 
}
#nav{
    background-color: #F9F9F9;
    position:fixed;
    width: 100%;
    padding: 1px;
}
#nav span{
    line-height: 70px;
    font-size: 30px;
    color: #000;
}
::-webkit-scrollbar {
    display: none;
}
.container{
    max-width: 700px;
    width: 100%;
    background-color: #fff;
    border-radius: 5px;
    margin-top: 120px;
  }
  .container .title{
    font-size: 25px;
    font-weight: 500;
    position:relative;
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
    border: 1px solid #EEEE;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
  }
  .user-details .input-box input:focus,
  .user-details .input-box input:valid{
    border-color: #DC5F00;
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
     background: #DC5F00;
   }
   form .button input:hover{
    /* transform: scale(0.99); */
    background: #DC5F00;
    }
    .login-signup{
        text-align: center;}
   @media(max-width: 584px){
   .container{
    max-width: 100%;
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
   

  @media screen and (max-width: 900px){
    #nav span{
        line-height: 70px;
        font-size: 12px;
        color: #fff;
       
      
    }
    #nav{
      display:hidden;
    }
    .forms{
        position: fixed;
        margin-left: 20px;
        margin-top: 150px;
        width: 90%;
        font-size: 13px;
        background: #fff;
        padding: 30px 20px;
        perspective: 2700px;
      }
      .form-content .input-box input{
        font-size: 12px;
      }
      #nav span{
        line-height: 70px;
        font-size: 12px;
        color: #000;
    }

    
.login-signup{
    text-align: center;
    font-size: 14px;
    }

    .wrapper{
        position: fixed;
        max-width: 430px;
        width: 100%;
        padding: 34px;
        border-radius: 6px;
        margin-top: 80px;
        margin-left: 1px;
      }
}
  @media only screen and (max-width: 1200px) {
    body{
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 1px;
    background: white;

    }
    .container{
    max-width: 700px;
    width: 100%;
    background-color: transparent;
    border-radius: 2px;
    margin-top: 5px;
    box-shadow: 0 5px 10px rgba(255, 255, 255);
}
  }

  select{

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
  
</style>