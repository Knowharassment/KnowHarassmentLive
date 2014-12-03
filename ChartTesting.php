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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>KnowHarassment</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="offcanvas.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
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
                "caption": "Sexual Harassment Cases at Kent State University",
                "subCaption": "Reported cases Per Year",
                "xAxisName": "Year",
                "yAxisName": "Number of reported cases",
				"canvasBgAlpha": "0",
                "showAlternateHgridColor": "1",
				"bgImage": "https://dl.dropboxusercontent.com/u/39907471/lgo_ncaa_kent_state_golden_flashes.png",
                "bgImageAlpha":"40",
                "bgImageDisplayMode":"Fit",
				"captionFontSize": "16",
				"subcaptionFontSize": "14",
				"outCnvBaseFont": "helvetica",
				"outCnvbaseFontSize": "11",
				"outCnvbaseFontColor": "#000000",
				"valueFontColor": "#ffffff",
                "theme": "fint"
				
            },
            "data": [
                {
                    "label": "2011",
                    "value": "27",
                    //Using color to change color of the bar
                    "color": "#000066"
                },
             
                {
                    "label": "2012",
                    "value": "22",
                    "color": "#000066"
                },
             
                {
                    "label": "2013",
                    "value": "24",
                    "color": "#000066"
                },
               
               
                
            ]
        }
    }).render("chart-container");

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
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="nav navbar-nav">

            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li class="active"><a href="editorials.html">Stories</a></li>
			<li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Our Data<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="knowharassmentatksu.html">Police Report Map</a></li>
                <li><a href="policedata.html">Police Report Data</a></li>
                <li><a href="#">Survey Data</a></li>
                </ul>
              </li><!--
<li><a href="https://www.facebook.com/KnowHarassment"><img src="images/fb512x512.png"></a></li>
			<li><a href="https://twitter.com/KnowHarassment"><img src="images/tw512x512.png"></a></li>
-->
              
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->
    </div><!-- /.navbar -->
      
<!--Content Begins Here-->
            <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 col-lg-3 col-xs-2 sidebar">
            <div id="chartsidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
            </div><!-- chartsidebar -->
          </div>              
              <div class="col-lg-8 col-md-10 col-sm-7 col-xs-7" id="chart-container">
                Expect the Chart Here
              </div></div>
              <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="chartcontrol">
                <fieldset>
                    <legend>Chart Control:</legend>
        <form method="get" action="ChartTesting.php" class="form-horizontal">
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
                    </div>
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
