<?php
include("dbconn.php");
$usernames = $_GET['usernames'];

if(isset($usernames)){
    $sqls=mysql_query("SELECT * FROM user_master INNER JOIN location_master ON user_master.loc_code=location_master.loc_code WHERE user_master.username='$usernames'");

if (! $sqls){
   echo mysql_error();
}
    while ($ress = mysql_fetch_assoc($sqls))

        {
            echo $ress['loc_code'];   
            //$arrayloc[] = array('username' => $res['username']  );
            
        }
}
 ?>