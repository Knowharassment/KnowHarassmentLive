<?php
require('dbconnect.php');
include 'sanitize.php';
$result = mysqli_query($link,"SELECT * FROM KnowHarassment_Questions");
?>
<DOCTYPE HTML>
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
  </head>
<body>
<!--
Start Navigation Menu
-->
<div class="container">
    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
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

            <li class="active"><a href="index.html">Home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="editorials.html">Stories</a></li>
			<li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Our Data<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="knowharassmentatksu.html">Police Report Map</a></li>
                <li><a href="#">Police Report Data</a></li>
                <li><a href="surveyquery.php">Survey Data</a></li>
                </ul>
              </li>
			<li><a href="https://www.facebook.com/KnowHarassment">Facebook</a></li>
			<li><a href="https://twitter.com/KnowHarassment">Twitter</a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->
    </div>
<!--
End Navigation Menu
-->

<div align="center" style="margin-top: 1em; font-family: helvetica, arial, sanserif;">
	<form action="http://webprod01.science.kent.edu/ClassFolder/KnowHarassment/surveyresults.php" method="get" id="Query">
		<fieldset>
		<legend>What would you like to know about the data we collected?</legend>
		<select name="question" size="5">
			<option value="one">What is the average age of the survey participants?</option>
			<option value="two">How many people were sexually assaulted?</option>
			<option value="three">How many people were sexually harassed?</option>
			<option value="four">How many people were cyber-harassed?</option>
			<option value="five">Where does cyber-harassment occur?</option>
		</select>
		<br>
		<br>
		<input type="submit" name="questionsubmit" />

</fieldset>
</form>
</div>
    <footer>
        <p>&copy; Coded by Gerber&Przywarty Industries</p>
      </footer>

    <!--/.container-->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    <script src="offcanvas.js"></script>
</body>
</html>z