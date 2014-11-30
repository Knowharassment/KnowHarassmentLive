<php
     require('dbconnect.php');
     require('sanitize.php');
     error_reporting(-1);
     
//initialize graph variables
     $issue=$_GET['para1'];
     $demo=$_GET['para2'];
     
//setting y-axis
     
     if ($issue==""){
        $issue='SH';
     }
     
     if ($issue=="SH"){
        $y_label='Amount of Sexual Harassment Reported';
     }
     
     if ($issue="SA"){
        $y_label='Amount of Sexual Assault Reported';
     }
     
     if ($issue="CH"){
        $y_label='Amount of cyber-harassment reported';
     }

// setting x-axis
    
     if ($demo=""){
        $demo="gender";
    }
     
     if (demo="gender"){
        $x_label="Gender of Respondents";
     }
     
     if ($demo="age"){
        $x_label="Age of Respondents"
     }
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <title>KnowHarassment</title>
        <!-- Initializing Bootstrap-->
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
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
          "caption": "<?php echo $y_label;?> By Election Year",
          "subCaption": "<?php echo $x_label;?>",
          "xAxisName": "<?php echo $x_label;?>",
          "yAxisName": "<?php echo $y_label;?>",
          "theme": "zune"
       },
       "data": [
<?php

//$result=mysqli_query($link, "SELECT  ") or die (mysql_error());
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
        <div class="container">
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <p>
<php
     echo ($y_label);
     echo ($x_label);
?>
                </p>
        </div>
        </div>
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="chartcontainer"> Chart goes here
                </div>
            </div></div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <form method="get" action="SurveyApp.php" class="bootstrap-frm">
            <label>What Happened?</label>
                <select name="para1" size="1">
                    <option selected value="">please choose...</option>
                    <option value="SH">Sexual Harassment</option>
                    <option value="SA">Sexual Assault</option>
                    <option value="CH">Cyber-harassment</option>
                </select>
            <label>Break it down by:</label>
                <select name="para2" size="1">
                    <option selected value=""> please choose...</option>
                    <option value="gender">Gender</option>
                    <option value="age">Age</option>
            
            </select>
            <input type="submit" value="submit">
        </form>
        </div>
        </div>
        </div>
         <!-- Bootstrap core JavaScript-->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    <script src="offcanvas.js"></script>
    </body>
</html>