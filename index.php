<?php
require('dbconnect.php');
require('sanitize.php');
error_reporting(-1);
$crime=$_GET['crime'];
if ($crime==''){$crime='Murder_Count';}

if($crime=='Murder_Count'){
  $crime_label='Number of Murders';
}

if($crime=='Rape_Count'){
  $crime_label='Number of Rapes';
}

if($crime=='Robbery_Count'){
  $crime_label='Number of Robberies';
}

if($crime=='Assault_Count'){
  $crime_label='Number of Assaults';
}

if($crime=='Property_Crime_Count'){
  $crime_label='Number of Property Crimes';
}

if($crime=='Burglary_Count'){
  $crime_label='Number of Burglaries';
}

if($crime=='Larceny_Theft_Count'){
  $crime_label='Number of Larceny Thefts';
}

if($crime=='Motor_Vehicle_Theft_Count'){
  $crime_label='Number of Motor Vehicle Thefts';
}

if($crime=='Violent_Crime_Count'){
  $crime_label='Number of Violent Crimes';
}

$state=$_GET['state'];
if ($state==''){$state='Ohio';}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Corelation between Crimes and Election Results by State</title>
<script type="text/javascript" src="fusioncharts/fusioncharts.js"></script>
<script type="text/javascript" src="fusioncharts/themes/fusioncharts.theme.zune.js"></script>
<script type="text/javascript">
FusionCharts.ready(function(){
    var revenueChart = new FusionCharts({
      type: "column2d",
      renderAt: "chartContainer",
      width: "900",
      height: "400",
      dataFormat: "json",
      dataSource: {
       "chart": {
          "caption": "<?php echo $crime_label;?> By Election Year",
          "subCaption": "<?php echo $state;?>",
          "xAxisName": "Electoral Year",
          "yAxisName": "<?php echo $crime_label;?>",
          "theme": "zune"
       },
       "data": [
<?php

$result=mysqli_query($link, "SELECT CrimesByState.Year_Crime_Committed, CrimesByState.State, CrimesByState.$crime, CrimesByState.Population, election_results.Presidential_Party_Affiliation
FROM CrimesByState, election_results
WHERE CrimesByState.State='$state'
AND election_results.State='$state'
AND election_results.Election_Year=CrimesByState.Year_Crime_Committed
ORDER BY CrimesByState.Year_Crime_Committed DESC") or die (mysql_error());
$total_num_rows=mysqli_num_rows($result);
$current_row_num=1;
while($row = mysqli_fetch_array($result)) {
  if($current_row_num==$total_num_rows){
?>       
          {  
             "label": "<?php echo $row[0]; ?>",
             "value": "<?php echo $row[2]; ?>",
             "color": "<?php if($row[4]=='R'){ echo "ff0000";} 
	elseif($row[4]=='D'){echo "0000ff";} else { echo "00ff00"; }?>"
          }
<?php 
  } else {
    ?>
          {  
             "label": "<?php echo $row[0]; ?>",
             "value": "<?php echo $row[2]; ?>",
             "color": "<?php if($row[4]=='R'){ echo "ff0000";} elseif($row[4]=='D'){echo "0000ff";} else { echo "00ff00"; }?>"
          },
          <?php    
  }
$current_row_num=$current_row_num+1;
}
?>

        ]
      }
 
  });
  revenueChart.render("chartContainer");
}); 
 
</script>
</head>
<body>
<div id="header"></div>
<div id="chartWrapper"> 
  <div id="chartContainer">Chart will load here</div>
  <form method="get" action="index.php" class="bootstrap-frm">
    <label>State:</label><?php include('statelist.php');?>
    <label>Crime:</label><?php include('crimelist.php');?>
    <input type="submit" value="submit">
  </form>
</div>
<div id="article">
<h2><?php echo $crime_label;?> in the State of <?php echo $state;?></h2>
<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
</div>
<div id="footer"><img class="displayed" src="imgs/footer.png"></div>

</body>
</html>