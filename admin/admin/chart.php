<?php

include_once("connections/session.php");




  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <canvas id="line-chart" width="800" height="450"></canvas>




    <?php
  $and = 'AND YEAR(date) = '.$year;
  $months = array();
  $Medical = array();
  $Trauma = array();
  for( $m = 1; $m <= 12; $m++ ) {
    $sql = "SELECT * FROM incident_info WHERE MONTH(date) = '$m' AND incident = 'Medical' $and";
    $oquery = $conn->query($sql);
    array_push($Medical, $oquery->num_rows);

    $sql = "SELECT * FROM incident_info WHERE MONTH(date) = '$m' AND  incident = 'Trauma'  $and";
    $lquery = $conn->query($sql);
    array_push($Trauma, $lquery->num_rows);

    $num = str_pad( $m, 2, 0, STR_PAD_LEFT );
    $month =  date('M', mktime(0, 0, 0, $m, 1));
    array_push($months, $month);
  }

  $months = json_encode($months);
  $Trauma = json_encode($Trauma);
  $Medical = json_encode($Medical);

?>


<script>
new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels:  <?php echo $months ; ?>,
    datasets: [{ 
        data: <?php echo $Medical ; ?>,
        label: "Medical",
        borderColor: "#3e95cd",
        fill: false
      }, { 
        data: <?php echo $Trauma ; ?>,

        label: "Truama",
        borderColor: "rgb(255, 77, 32)",
        fill: false
      },
    ]
  },
  options: {
    title: {
      display: true,
      text: 'World population per region (in millions)'
    }
  }
});
</script>
