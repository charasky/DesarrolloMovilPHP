<?php 

require_once '../includes/DbOperations.php';

//chekiar lueog

//$response = array(); 
if($_SERVER['REQUEST_METHOD']=='POST'){
    $obj = json_decode($_POST['params']);
    //print $obj-> {'op'};

    $db = new DbOperations();
    foreach ($obj as $k=>$v){
        if($v == 'TRUE'){
            $db->enabledUser($k);
            //echo $k;
        }else{
            $db->deleteUser($k);
            //echo $k;
        }
    }
}else{
	$response['error'] = true; 
	$response['message'] = "Invalid Request";
}

//echo json_encode($response);

 
       



