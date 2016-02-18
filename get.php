<?php
include("dbconn.php");
$names = $_GET['names'];

if(isset($names)){
    $sql=mysql_query("SELECT loc_name FROM location_master WHERE loc_code = '$names'");
    $arraybartu =array();
    while ($res = mysql_fetch_assoc($sql))
        {
            $arrayloc = array();
            $arrayloc['locations'] = $res['loc_name'];
            $arrayloc['loc'] = $res;
            $arraybartu.push($res);
        }
    echo json_encode($arrayloc);
    
}
?>