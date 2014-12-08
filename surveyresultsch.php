<?php
     require('dbconnect.php');
     require('sanitize.php');
    require('ColorSwatches.php');
     //error_reporting(-1);
     //error_reporting(E_ALL ^ E_NOTICE);
     
//initialize graph variables from <form>
     $issue=$_GET['para1'];
     $demo=$_GET['para2'];

// Setting Chart display parameters including Captions and labels
    $issue="CH"
    if ($demo==""){
        $demo="gender";
    };
    if($issue=="SH"){
        $caption="Cases of Sexual Harassment";
        $y_label='Amount of Sexual Harassment Reported';
        if($demo=="gender"){
            $subcaption="by gender";
            $x_label="Gender of Respondents";
        } elseif ($demo=="age"){
            $subcaption="by age";
            $x_label="Age of Respondents";
        };
    }elseif($issue=="SA"){
        $caption="Cases of Sexual Assault";
        $y_label='Amount of Sexual Assault Reported';
        if($demo=="gender"){
            $subcaption="by gender";
            $x_label="Gender of Respondents";
        } elseif ($demo=="age"){
            $subcaption="by age";
            $x_label="Age of Respondents";
        };
    }elseif($issue=="CH"){
        $caption="Cases of Cyber-Harassment";
        $y_label='Amount of cyber-harassment Reported';
        if($demo=="gender"){
            $subcaption="by gender";
            $x_label="Gender of Respondents";
        } elseif ($demo=="age"){
            $subcaption="by age";
            $x_label="Age of Respondents";
        };
    };
        if($issue=="TN"){
            $caption="Total Number of Responses";
            $subcaption="By Total Count";
            $y_label="Total Responses";
            $x_label="Total Responses";
        }elseif($issue=="TG"){
            $caption="Total Number of Responses";
            $subcaption="By Gender";
            $y_label="Total Responses";
            $x_label="Gender";
        }elseif($issue=="TA"){
            $caption="Total Number of Responses";
            $subcaption="By Age";
            $y_label="Total Responses";
            $x_label="Age";
        }elseif($issue=="TSY"){
            $caption="Total Number of Responses";
            $subcaption="By Academic Level";
            $y_label="Total Responses";
            $x_label="Academic Level";
        }elseif($issue=="TE"){
            $caption="Total Number of Responses";
            $subcaption="By Ethnicity";
            $y_label="Total Responses";
            $x_label="Ethnicity";
        }elseif($issue==    "TSO"){
            $caption="Total Number of Responses";
            $subcaption="By Sexual Orientation";
            $y_label="Total Responses";
            $x_label="Sexual Orientation";
        };
    
//End chart labeling
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
        height: "300px",
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
$color=0;
// End of Sexual Assault Charts

// Cyber Harassment Charts
    if($issue=="CH"){ 
        //By Gender
        if($demo=="gender"){
            $result=mysqli_query($link, "SELECT Q4, COUNT(Q22) FROM KnowHarassment_Results WHERE Q22='yes' AND Q4='male'") or die (mysql_error());
            $total_num_rows=mysqli_num_rows($result);
            $current_row_num=1;
            $color=0;
            while($row = mysqli_fetch_array($result)) {
                
            if($current_row_num==$total_num_rows){
?> 
                {
                    "label": "<?php echo $row[0]; ?>",
                    "value": "<?php echo $row[1]; ?>",
                    "color": "<?php echo $color_array[$color]; ?>"
                },
    <?php 
 } else {
    ?>
          {  
             "label": "<?php echo $row[0]; ?>",
             "value": "<?php echo $row[1]; ?>",
             "color": "<?php echo $color_array[$color]; ?>"
          },
                <?php    
  };
$color=$color++;
$current_row_num=$current_row_num+1;
};
            $result=mysqli_query($link, "SELECT Q4, COUNT(Q22) FROM KnowHarassment_Results WHERE Q22='yes' AND Q4='female'") or die (mysql_error());
            $total_num_rows=mysqli_num_rows($result);
            $current_row_num=1;
            $color=0;
            while($row = mysqli_fetch_array($result)) {
                
            if($current_row_num==$total_num_rows){
?> 
                {
                    "label": "<?php echo $row[0]; ?>",
                    "value": "<?php echo $row[1]; ?>",
                    "color": "<?php echo $color_array[$color]; ?>"
                },
    <?php 
 } else {
    ?>
          {  
             "label": "<?php echo $row[0]; ?>",
             "value": "<?php echo $row[1]; ?>",
             "color": "<?php echo $color_array[$color]; ?>"
          },
                <?php    
  };
$color=$color++;
$current_row_num=$current_row_num+1;
};   
    //end SH by gender
    //begin SH by age
    } elseif($demo=="age") {
        $a = 17;
        //loop through all possible ages to create multiple data points
        while($a++) {
            $result=mysqli_query($link, "SELECT Q5, COUNT(Q22) FROM KnowHarassment_Results WHERE Q22='yes' AND Q5=$a") or die (mysql_error());
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
        },
  });
revenueChart.render("chart-container");
}); 
</script>
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
        <div class="col-sm-4 col-md-3 col-lg-3 col-xs-4 sidebar">
          <p id="chartsidebartitle">
              The<br>
              <strong>KnowHarassment</strong><br>
              Database
            </p>
            
            <ul class="nav nav-sidebar">
                <hr style="color: black;">
            <li><a href="surveymain.php" style="color: black;">Survey Overview</a></li>
                    <li class="active"><a href="surveyresultsch.php" style="color: black;">Cyber-Harassment</a></li>
                    <li><a href="surveyresultssh.php" style="color: black;">Sexual Harassment</a></li>
                    <li><a href="surveyresultssa.php" style="color: black;">Sexual Assault</a></li>
                <hr>
            <li><a href="knowharassmentatksu.html" style="color: black;">KSU Crime Data</a></li>
            </ul>
          </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding: 0 0 0 3em;">

        <div id="titleheader" style="padding: 0 0 0 0;"> Cyberharassment at Kent State
        </div>

            <br>
            <div id="subhead">Cyberharassment</div>
                
            <p>We wanted to learn as much as possible about harassment issues here at Kent State. In October we distrubited a survey in an attempt to get answers straight from the student body. The responses that we've recieved have vindicated our mission. Below, you'll have a chance to see the responses in many ways.
                <br><Br>
<strong>
Below you can choose which harassment issue you'd like to explore. You can also choose to view the data in different ways. 
</strong>
</p>
            </div></div>
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="chart-container">
                Expect the Chart Here
              </div></div>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" id="piechart-container">
                    expect the pie chart
                </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" id="indicatorDiv">
                    expect the pie chart
                </div>
            </div>
            <div class="row chartcontrol">
                <fieldset>
                    <legend>Chart Control:</legend>
        <form method="get" action="surveymain.php" class="form-horizontal">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <label>What Happened?</label>
            <input type="radio" name="para1" value="CH">Cyberharassment
            </div>
                <!--<select name="para1" size="1">
                    <option selected value="">please choose...</option>
                    <option value="SH">Sexual Harassment</option>
                    <option value="SA">Sexual Assault</option>
                    <option value="CH">Cyber-harassment</option>
                </select>-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <label>Break it down by:</label>
                <input type="radio" name="para2" value="gender" checked> Gender
            <input type="radio" name="para2" value="age"> Age
            </div>
                
                <!--<select name="para2" size="1">
                    <option selected value=""> please choose...</option>
                    <option value="gender">Gender</option>
                    <option value="age">Age</option>
            
            </select>-->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <input type="submit" value="submit" style="margin: 0 auto 0 auto;">
            </div>
        </form>
                    </fieldset>
                    </div>
                </div><!-- chartcontrol -->
            </div><!-- pagecontainer -->
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