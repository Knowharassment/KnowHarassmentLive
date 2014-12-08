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
                <ul class="nav-sidebar">
                    <li><a href="surveyresultsch.php" style="color: black;">Cyber-harassment Data</a></li>
                    <li><a href="surveyresultssh.php" style="color: black;">Sexual Harassment</a></li>
                    <li class="active"><a href="surveyresultssa.php" style="color: black;">Sexual Assault</a></li>
                </ul>
            <li><a href="knowharassmentatksu.html" style="color: black;">Crime Data</a></li>
            </ul>
          </div>
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding: 0 0 0 3em;">

        <div id="titleheader" style="padding: 0 0 0 0;"> Cyberharassment at Kent State
        </div>

            <br>
            <div id="subhead">Sexual Assault</div>
                
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
                
                <input type="radio" name="para1" value="SH" checked>Sexual Harassment
            <input type="radio" name="para1" value="SA">Sexual Assault
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