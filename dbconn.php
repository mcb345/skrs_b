<?php
  $username = "root";
    $password = "12345";
    $hostname = "";

    $mycon = mysql_connect($hostname, $username, $password) or die("could not connect to database");
	$selected =mysql_select_db("sapuratest", $mycon);
?>