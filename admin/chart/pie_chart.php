<?php
$mon = date('m');
$month = date('M');

$sql = "SELECT * FROM incident_info WHERE incident = 'Medical' AND sub_incident = 'Stroke' AND month = '$mon' ";
$tquery = $conn->query($sql);
$Stroke = $tquery->num_rows;



$sql = "SELECT * FROM incident_info WHERE incident = 'Medical' AND sub_incident = 'Highblood' AND month = '$mon' ";
  $squery = $conn->query($sql);
  $Highblood = $squery->num_rows;


  

  $sql = "SELECT * FROM incident_info WHERE incident = 'Medical' AND sub_incident = 'Others' AND month = '$mon' ";
  $aquery = $conn->query($sql);
  $Others = $aquery->num_rows;


  

  

$dataPoints = array( 
	array("label"=> "Stroke", "y"=> $Stroke),
	array("label"=> "Highblood", "y"=> $Highblood),
	array("label"=> "Others", "y"=> $Others),

)

  
?>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


<script>



var chart = new CanvasJS.Chart("chartContainer2",
    {
        animationEnabled: true,

        title: {
            text: "Medical (<?php echo $month?>)",
            fontSize: 24,
            fontWeight: "normal",
        },
        data: [
        {
            
            type: "pie",
		indexLabel: "{y}",
		indexLabelFontSize: 20,
        toolTipContent: "<b>{label}</b>: {y} (#percent%)",
		fontFamily: "calibri",
		legendText: "{label}" ,
    
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            
            
        },
        ]
    });
chart.render();
</script> 






<?php

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
  $Others = $otquery->num_rows;


  $dataPoints = array( 
	array("label"=> "Self Accident", "y"=> $Self),
	array("label"=> "Vehicle Accident", "y"=> $Vehicle),
	array("label"=> "Drowning", "y"=> $Drowning),
	array("label"=> "Others", "y"=> $Others),

)

?>
<script>



var chart = new CanvasJS.Chart("chartContainer3",
    {
        animationEnabled: true,

        title: {
            text: "Trauma (<?php echo $month?>)",
            fontSize: 24,
            fontWeight: "normal",
        },
        data: [
        {
            
            type: "pie",
		indexLabel: "{y}",
		indexLabelFontSize: 20,
        toolTipContent: "<b>{label}</b>: {y} (#percent%)",
		fontFamily: "calibri",
		legendText: "{label}" ,
    
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            
            
        },
        ]
    });
chart.render();
</script> 



<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

