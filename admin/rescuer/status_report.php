<?php

include_once("includes/conn.php");


?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/reg.css">
    <script src="https://kit.fontawesome.com/787042df18.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-light" id="nav">
        <a class="navbar-brand" href="#">
          <img src="img/scclogo.png" width="70" height="70" class="d-inline-block align-top" alt="">
         <span>City Disaster Risk Reduction and Management Office</span> 
        </a>
    </nav>
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
                <span class="input-group-text" style="border:none; background: transparent;">+63&nbsp;
                <input type="text" name="contactnum" placeholder="Phone Number"  required> 
              </span>
              </div>
    


              <div class="input-box">
            <span class="details">Incident</span>
            <select onchange="countryChange(this);"  name="incident">
  <option value="empty">Select a City</option>
  <option value="San Carlos City">San Carlos City</option>
</select><br><br>



          <span class="details"></span>
          <select id="incident"  name="sub_incident">
  <option value="0">Options</option>
</select>
          </div>


              <div class="input-box">
                <span class="details">Username</span>
                <input type="text" name="user" placeholder="Username" required>
              </div>
              <div class="input-box">
                <span class="details">Password</span>
                <input type="password"   name="pass" placeholder="Enter your password" required>
              </div>
              <div class="input-box">
                <span class="details">Upload Valid ID</span>
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
<script type="text/javascript">
//<![CDATA[ 
// array of possible countries in the same order as they appear in the country selection list 
var countryLists = new Array(4) 
countryLists["empty"] = ["Select a Barangay"]; 
countryLists["San Carlos City"] = ["Abanon", "M.Soriano St. (Poblacion)", "Agdao", "Anando", "Ano", "Antipangol", "Aponit", "Bacnar", "Balaya", "Balayong", "Baldog", "Balite Sur", "Balococ", "Bani", "Bocboc", "Bugallon-Posadas Street (Poblacion)", "Bogaoan", "Bolingit", "Bolosan", "Bonifacio (Poblacion)", "Buenglat", "Burgos-Padlan (Poblacion)", "Cacaritan", "Caingal", "Calobaoan", "Calomboyan", "Capataan", "Caoayan-Kiling", "Cobol", "Coliling", "Cruz", "Doyong", "Gamata", "Guelew", "Ilang", "Inerangan", "Isla", "Libas", "Lilimasan", "Longos", "Lucban (Poblacion)", "Mabalbalino", "Mabini (Poblacion)", "Magtaking", "Malacañang", "Maliwara", "Mamarlao", "Manzon", "Matagdem", "Mestizo Norte", "Naguilayan", "Nelintap", "Padilla-Gomez (Poblacion)", "Pagal", "Palaming", "Palaris (Poblacion)", "Palospos", "Pangalangan", "Pangoloan", "Pangpang", "Paitan-Panoypoy", "Parayao", "Payapa", "Payar", "Perez Boulevard (Poblacion)", "PNR Site (Poblacion)", "Polo", "Quezon Boulevard (Poblacion)", "Quintong", "Rizal Avenue (Poblacion)", "Roxas Boulevard (Poblacion)", "Salinap", "San Juan", "San Pedro (Poblacion)", "Sapinit", "Supo", "Talang", "Taloy (Poblacion)", "Tamayo", "Tandoc", "Tarece", "Tarectec", "Tayambani", "Tebag", "Turac", "Tandang Sora (Poblacion)"]; 
countryLists["Trauma"] = ["Self Accident", "Vehicle Accident", "Drowning", "Others"]; 

function countryChange(selectObj) { 
// get the index of the selected option 
var idx = selectObj.selectedIndex; 
// get the value of the selected option 
var which = selectObj.options[idx].value; 
// use the selected option value to retrieve the list of items from the countryLists array 
cList = countryLists[which]; 
// get the country select element via its known id 
var cSelect = document.getElementById("incident"); 
// remove the current options from the country select 
var len=cSelect.options.length; 
while (cSelect.options.length > 0) { 
cSelect.remove(0); 
} 
var newOption; 
// create new options 
for (var i=0; i<cList.length; i++) { 
newOption = document.createElement("option"); 
newOption.value = cList[i];  // assumes option string and value are the same 
newOption.text=cList[i]; 
// add the new option 
try { 
cSelect.add(newOption);  // this will fail in DOM browsers but is needed for IE 
} 
catch (e) { 
cSelect.appendChild(newOption); 
} 
} 
} 
//]]>
</script>
<style>
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