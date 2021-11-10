<?php

include "connect.php";

$nrp = strtoupper($_REQUEST['nrp']);

$sql = "INSERT INTO `openrec`(`nrp`) VALUES ('".$nrp."')";

$return = array(
    "status" => 1,
    "error" => "",
    'redirect' => ""
);

if($result = mysqli_query($con, $sql)){
    $return['status']=1;
    $return['error']="Insert Data Success";
    $return['redirect']="../submitnrp.html";
    
}

echo json_encode($return);

?>