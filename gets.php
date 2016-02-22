<?php
include("dbconn.php");
$names = $_GET['names'];
//$usernames = $_GET['usernames'];

if(isset($names)){
    $sql=mysql_query("SELECT username FROM user_master INNER JOIN location_master ON user_master.loc_code=location_master.loc_code WHERE user_master.loc_code='$names'");
$arrayloc = array();

    while ($res = mysql_fetch_assoc($sql))

        {
            //echo '<option>'.$res['username'].'</option>';   
            $arrayloc[] = array('username' => $res['username']  );
            
        }
        echo json_encode($arrayloc);
}


?>