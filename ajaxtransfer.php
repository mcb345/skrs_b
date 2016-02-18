<?php
include 'dbconn.php';
print_r($_POST);
if(isset($_POST['idlist'])== true && isset($_POST['locations'])== true){
    echo 'okokok';
    print_r($_POST['idlist']);
    foreach($_POST['idlist'] as $key => $value){
        $query = "INSERT INTO transfer_request_detail VALUES('', '', '','".$value."', '".$_POST['locations']."', '','', '', '')";
        print_r($query);
        mysql_query($query);
    };
    
}else{
    echo 'kokopkok';
}

?>