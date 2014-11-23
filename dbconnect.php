<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1); 
$link = mysqli_connect('localhost','jaraber-test','dscirocks','jaraber_mailing_list',0,'/var/lib/mysql/mysql.sock') or die(mysql_error($link));
?>
