<?php
require('dbconnect.php');
include 'sanitize.php';
?>
<DOCTYPE HTML>
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
<div align="center" style="margin-top: 5em; margin-bottom: 5em; font-family: helvetica, arial, sanserif;">
<?php
	$user = $_GET["question"];
	//if statement will evaluate which query to run and then return the answer to the user.
	if ($user=="one") {
		echo "<p>" . "Thank you for your question. The average age of our survey participants is: ";
		$result = mysqli_query($link,"SELECT AVG(Q5) FROM KnowHarassment_Results");
		//$pass = mysqli_fetch_array($result);
		while($row = mysqli_fetch_array($result)) {
			echo $row['AVG(Q5)'];
			echo "years old." ."<br>";
			} 
	} elseif ($user=="two") {
		echo "<p>" . "Thank you for your question. We were surprised to find out that ";
		$result = mysqli_query($link,"SELECT COUNT(Q10) FROM KnowHarassment_Results WHERE Q10='yes'");
		//$pass = mysqli_fetch_array($result);
		while($row = mysqli_fetch_array($result)) {
			echo "<strong>" . $row['COUNT(Q10)'] . "</strong>";
			echo " people reported that they had been sexually assaulted" . "<br>";
			}
	} elseif ($user=="three") {
		echo "<p>" . "Thank you for your question. We were surprised to find out that ";
		$result = mysqli_query($link,"SELECT COUNT(Q16) FROM KnowHarassment_Results WHERE Q16='yes'");
		//$pass = mysqli_fetch_array($result);
		while($row = mysqli_fetch_array($result)) {
			echo "<strong>" . $row['COUNT(Q16)'] . "</strong>";
			echo " people reported that they had been sexually harassed" . "<br>";
			}
	} elseif ($user=="four") {
		echo "<p>" . "Thank you for your question. We were surprised to find out that ";
		$result = mysqli_query($link,"SELECT COUNT(Q22) FROM KnowHarassment_Results WHERE Q22='yes'");
		//$pass = mysqli_fetch_array($result);
		while($row = mysqli_fetch_array($result)) {
			echo "<strong>" . $row['COUNT(Q22)'] . "</strong>";
			echo " people reported that they had been sexually harassed" . "<br>";
			}
	} else {
		echo "five";
	};
?>


</div>



<hr>
<br><br><br><br><br><br><br><br><br><br><br>
<h3> Look below for our full survey set.</h3>
<?php

$result = mysqli_query($link,"SELECT * FROM KnowHarassment_Questions");
echo "<table>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['Question_ID'] . "</td>";
  echo "<td>" . $row['Question_Text'] . "</td>";
  echo "</tr>";
};

echo "</table>";
?>
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
</html>