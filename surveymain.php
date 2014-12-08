<?php
     require('dbconnect.php');
     require('sanitize.php');
     error_reporting(-1);
     error_reporting(E_ALL ^ E_NOTICE);
     
//initialize graph variables from <form>
     $issue=$_GET['para1'];
     $demo=$_GET['para2'];

// Setting Chart display parameters including Captions and labels
    if ($issue==""){
        $issue="SH";
    };
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
// Sexual Assault Charts
    if($issue=="SA"){ 
        //By Gender
        if($demo=="gender"){
            $result=mysqli_query($link, "SELECT Q4, COUNT(Q10) FROM KnowHarassment_Results WHERE Q10='yes' AND Q4='male'") or die (mysql_error());
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
            $result=mysqli_query($link, "SELECT Q4, COUNT(Q10) FROM KnowHarassment_Results WHERE Q10='yes' AND Q4='female'") or die (mysql_error());
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
    //end SA by gender
    //begin SA by age
    } elseif($demo=="age") {
        $a = 17;
        //loop through all possible ages to create multiple data points
        while($a++) {
            $result=mysqli_query($link, "SELECT Q5, COUNT(Q10) FROM KnowHarassment_Results WHERE Q10='yes' AND Q5=$a") or die (mysql_error());
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
// End of Sexual Assault Charts

// Cyber Harassment Charts
    if($issue=="CH"){ 
        //By Gender
        if($demo=="gender"){
            $result=mysqli_query($link, "SELECT Q4, COUNT(Q22) FROM KnowHarassment_Results WHERE Q22='yes' AND Q4='male'") or die (mysql_error());
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
            $result=mysqli_query($link, "SELECT Q4, COUNT(Q22) FROM KnowHarassment_Results WHERE Q22='yes' AND Q4='female'") or die (mysql_error());
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
      }
 
  });
revenueChart.render("chart-container");
}); 

FusionCharts.ready(function () {
    var ageGroupChart = new FusionCharts({
        type: 'pie2d',
        renderAt: 'piechart-container',
        width: '100%',
        height: '300px',
        dataFormat: 'json',
        dataSource: {
            "chart": {
                "caption": "<?php echo $caption;?>",
                "subCaption": "<?php echo $subcaption;?>",
                
                "enableSmartLabels": "0",
                "showPercentValues": "1",
                "showTooltip": "0",
                "decimals": "1",
                "theme": "fint"
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
// Sexual Assault Charts
    if($issue=="SA"){ 
        //By Gender
        if($demo=="gender"){
            $result=mysqli_query($link, "SELECT Q4, COUNT(Q10) FROM KnowHarassment_Results WHERE Q10='yes' AND Q4='male'") or die (mysql_error());
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
            $result=mysqli_query($link, "SELECT Q4, COUNT(Q10) FROM KnowHarassment_Results WHERE Q10='yes' AND Q4='female'") or die (mysql_error());
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
    //end SA by gender
    //begin SA by age
    } elseif($demo=="age") {
        $a = 17;
        //loop through all possible ages to create multiple data points
        while($a++) {
            $result=mysqli_query($link, "SELECT Q5, COUNT(Q10) FROM KnowHarassment_Results WHERE Q10='yes' AND Q5=$a") or die (mysql_error());
            $total_num_rows=mysqli_num_rows($result);
            $current_row_num=1;
            while($row = mysqli_fetch_array($result)) {
                //skipping empty values
                if($row[1]==0){
                    break;
                } else {
                    if ($current_row_num==$total_num_rows){ ?> 
                        {
                            "label": "<?php echo $row[0]; ?> yrs old",
                            "value": "<?php echo $row[1]; ?>",
                            "color": "#000066"
                        },
                    <?php
                        } else { ?>
                        {  
                        "label": "<?php echo $row[0]; ?> yrs old",
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
// End of Sexual Assault Charts

// Cyber Harassment Charts
    if($issue=="CH"){ 
        //By Gender
        if($demo=="gender"){
            $result=mysqli_query($link, "SELECT Q4, COUNT(Q22) FROM KnowHarassment_Results WHERE Q22='yes' AND Q4='male'") or die (mysql_error());
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
            $result=mysqli_query($link, "SELECT Q4, COUNT(Q22) FROM KnowHarassment_Results WHERE Q22='yes' AND Q4='female'") or die (mysql_error());
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
                            "label": "<?php echo $row[0]; ?> yrs old",
                            "value": "<?php echo $row[1]; ?>",
                            "color": "#000066"
                        },
                    <?php
                        } else { ?>
                        {  
                        "label": "<?php echo $row[0]; ?> yrs old"",
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
        "events": {
            "dataplotrollover": function (evt, data) {
                var txt = "Age group : " + data.categoryLabel + ",<br/>No. of responses : " + data.value;
               document.getElementById('indicatorDiv').innerHTML = txt;
            },
            "dataplotrollout": function (evt, data) {
                document.getElementById('indicatorDiv').innerHTML = 
                    "Hover on any of the pie slice to view details.";
            },
           
            
        }
    });

    ageGroupChart.render();
    
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
            <ul class="nav nav-sidebar">
            <li class="active"><a href="surveymain.php" style="text-color: black;">Survey Data</a></li>
                <ul class="nav nav-sidebar">
                    <li><a href="surveyresultsch.php" style="color: black;">Cyber-harassment Data</a></li>
                    <li><a href="surveyresultssh.php" style="color: black;">Sexual Harassment</a></li>
                    <li><a href="surveyresultssa.php" style="color: black;">Sexual Assault</a></li>
                </ul>
            <li><a href="knowharassmentatksu.html" style="color: black;">Crime Data</a></li>
            </ul>
          </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding: 0 0 0 3em;">

        <div id="titleheader" style="padding: 0 0 0 0;"> Cyberharassment at Kent State
        </div>

            <br>
            <div id="subhead">The Survey Overview</div>
                
            <p>We wanted to learn as much as possible about harassment issues here at Kent State. In October we distrubited a survey in an attempt to get answers straight from the student body. The responses that we've recieved have vindicated our mission. Below, you'll have a chance to see the responses in many ways.
                <br><Br>
<strong>
Below you can see who responded to our survey. 
</strong>
</p>
            </div></div>
            <div class="row" style="max-height: 30em;">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="chart-container">
                Expect the Chart Here
              </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="piechart-container">
                    expect the pie chart
                </div></div>
                <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="indicatorDiv">   
                Hover over pieces of the pie for more information.
                </div>
            </div>
      </div><!-- pagecontainer -->
      <hr>

         <div id="footer">
    KnowHarassment 2014. © &nbsp; &nbsp; <A href="TermsofUse.html">Terms of use.</a>
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
