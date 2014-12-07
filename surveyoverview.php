<?php
//This page delivers information about the people who took our survey
     require('dbconnect.php');
     require('sanitize.php');
     error_reporting(-1);
     error_reporting(E_ALL ^ E_NOTICE);
     
//initialize graph variables from <form>
     $issue=$_GET['para1'];
     $demo=$_GET['para2'];

// Begin chart labels
// Setting Caption
    if($issue=="SH"){
        $caption="Cases of Sexual Harassment";
        if($demo=="gender"){
            $subcaption="by gender";
        } elseif ($demo=="age"){
            $subcaption="by age";
        };
    };
     
//setting y-axis
     
     if ($issue==""){
        $issue="SH";
     } elseif ($issue=="SH"){
        $y_label='Amount of Sexual Harassment Reported';
     } elseif ($issue=="SA"){
        $y_label='Amount of Sexual Assault Reported';
     } elseif ($issue=="CH"){
        $y_label='Amount of cyber-harassment Reported';
     };

// setting x-axis
    
     if ($demo==""){
        $demo="gender";
    } elseif ($demo=="gender"){
        $x_label="Gender of Respondents";
     }elseif ($demo=="age"){
        $x_label="Age of Respondents";
     };
//End chart labels
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>KnowHarassment</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Themes -->
    <link href="offcanvas.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
      <script type="text/javascript" src="fusioncharts/fusioncharts.js"></script>
<script type="text/javascript" src="fusioncharts/themes/fusioncharts.theme.fint.js"></script>
<script type="text/javascript">

FusionCharts.ready(function(){
    var revenueChart = new FusionCharts({
        type: "column2d",
        renderAt: "chart-container",
        width: "100%",
        height: "100%",
        dataFormat: "json",
        dataSource: {
            "chart": {
                "caption": "<?php echo $caption;?>",
                "subCaption": "<?php echo $subcaption;?>",
        
                "xAxisName": "<?php echo $x_label;?>",
                "yAxisName": "<?php echo $y_label;?>",
                
				"canvasBgAlpha": "0",
                "showAlternateHgridColor": "1",
				"captionFontSize": "16",
				"subcaptionFontSize": "14",
				"outCnvBaseFont": "helvetica",
				"outCnvbaseFontSize": "11",
				"outCnvbaseFontColor": "#000000",
				"valueFontColor": "#ffffff",
                "theme": "fint",
				
            },
            "data": [
<?php
// Begin Chart selection logic
// Sexual Harassment Charts
    if($issue=="SH"){ 
        //By Gender
        if($demo=="gender"){
            $result=mysqli_query($link, "SELECT Q4, COUNT(Q16) FROM KnowHarassment_Results WHERE Q16='yes' AND Q4='male'") or die (mysql_error());
            $total_num_rows=mysqli_num_rows($result);
            $current_row_num=1;
            while($row = mysqli_fetch_array($result)) {
            if($current_row_num==$total_num_rows){
?> 
                {
                    "label": "<?php echo $row[0]; ?>",
                    "value": "<?php echo $row[1]; ?>",
                    "color": "#000066"
                },
    <?php 
 } else {
    ?>
          {  
             "label": "<?php echo $row[0]; ?>",
             "value": "<?php echo $row[1]; ?>",
             "color": "#000066"
          },
                <?php    
  };
$current_row_num=$current_row_num+1;
};
            $result=mysqli_query($link, "SELECT Q4, COUNT(Q16) FROM KnowHarassment_Results WHERE Q16='yes' AND Q4='female'") or die (mysql_error());
            $total_num_rows=mysqli_num_rows($result);
            $current_row_num=1;
            while($row = mysqli_fetch_array($result)) {
            if($current_row_num==$total_num_rows){
?> 
                {
                    "label": "<?php echo $row[0]; ?>",
                    "value": "<?php echo $row[1]; ?>",
                    "color": "#000066"
                },
    <?php 
 } else {
    ?>
          {  
             "label": "<?php echo $row[0]; ?>",
             "value": "<?php echo $row[1]; ?>",
             "color": "#000066"
          },
                <?php    
  };
$current_row_num=$current_row_num+1;
};   
    //end SH by gender
    //begin SH by age
    } elseif($demo=="age") {
        $a = 17;
        //loop through all possible ages to create multiple data points
        while($a++) {
            $result=mysqli_query($link, "SELECT Q5, COUNT(Q16) FROM KnowHarassment_Results WHERE Q16='yes' AND Q5=$a") or die (mysql_error());
            $total_num_rows=mysqli_num_rows($result);
            $current_row_num=1;
            while($row = mysqli_fetch_array($result)) {
                //skipping empty values
                if($row[1]==0){
                    break;
                } else {
                    if ($current_row_num==$total_num_rows){ ?> 
                        {
                            "label": "<?php echo $row[0]; ?>",
                            "value": "<?php echo $row[1]; ?>",
                            "color": "#000066"
                        },
                    <?php
                        } else { ?>
                        {  
                        "label": "<?php echo $row[0]; ?>",
                        "value": "<?php echo $row[1]; ?>",
                        "color": "#000066"
                        },
                    <?php
                        };
                };
                    
                $current_row_num=$current_row_num+1;
            };
        if($a==80){
            break;
        };
        }; //ending age while loop
        }; //end SH by age chart
    
    };
// End of Sexual Harassment Charts

?>
 ]
      }
 
  });
  revenueChart.render("chart-container");
}); 

</script>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">
    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="pagecontainer">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html"><img src="images/TypeLogoMenu.png" id="navbarlogo"></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar" style="padding-right:20px;">
          <ul class="nav navbar-nav">

            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="editorials.html">Stories</a></li>
			<li class="active"><a href="surveymain.php">Our Data</a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->
    </div><!-- /.navbar -->
      
<!--Content Begins Here-->
            <div class="container-fluid" id="datapagecontainer">
      <div class="row">
        <div class="col-sm-4 col-md-2 col-lg-2 col-xs-4 sidebar">
          <p id="chartsidebartitle">
              KnowHarassment's Database
              <hr style="color: black;">
            </p>
            <ul class="nav-sidebar">
            <li class="active"><a href="surveymain.php" style="text-color: black;">Survey Data</a></li>
            <li><a href="knowharassmentatksu.html" style="color: black;">Crime Data</a></li>
            </ul>
          </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding: 0 0 0 3em;">

        <div id="titleheader" style="padding: 0 0 0 0;"> Cyberharassment at Kent State
        </div>

            <br>
            <div id="subhead">The Survey Database</div>
                
            <p>We wanted to learn as much as possible about harassment issues here at Kent State. In October we distrubited a survey in an attempt to get answers straight from the student body. The responses that we've recieved have vindicated our mission. Below, you'll have a chance to see the responses in many ways.
                <br><Br>
<strong>
Below you can choose which harassment issue you'd like to explore. You can also choose to view the data in different ways. 
</strong>
</p>
            </div>
              <div class="col-lg-10 col-md-7 col-sm-12 col-xs-12" id="chart-container">
                Expect the Chart Here
              </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="chartcontrol">
                <fieldset>
                    <legend>Chart Control:</legend>
        <form method="get" action="surveymain.php" class="form-horizontal">
            <label>What Happened?</label>
                <select name="para1" size="1">
                    <option selected value="">please choose...</option>
                    <option value="SH">Sexual Harassment</option>
                    <option value="SA">Sexual Assault</option>
                    <option value="CH">Cyber-harassment</option>
                </select>
            <br>
            <label>Break it down by:</label>
                <select name="para2" size="1">
                    <option selected value=""> please choose...</option>
                    <option value="gender">Gender</option>
                    <option value="age">Age</option>
            
            </select>
            <br>
            <input type="submit" value="submit">
        </form>
                    </fieldset>
                    </div></div></div>
      <hr>

         <div id="footer">
    KnowHarassment 2014. © &nbsp; &nbsp; <A href="TermsofUse.html">Terms of use.</a>
      </div>
    
        </div>
        </div>
        
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    <script src="offcanvas.js"></script>
        <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

  </body>
</html>
