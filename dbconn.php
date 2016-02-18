<?php
  $username = "root";
    $password = "";
    $hostname = "";

    $mycon = mysql_connect($hostname, $username, $password) or die("could not connect to database");
	$selected =mysql_select_db("sapuratest", $mycon);
?>