<?php

include "connect.php";

$nrp = strtoupper($_REQUEST['nrp']);

$sql1 = "SELECT * FROM `openrec` WHERE nrp = '".$nrp."'";

$result1 = mysqli_query($con, $sql1);

$row = mysqli_num_rows($result1);

if($row == 0){
    $sql = "INSERT INTO `openrec`(`nrp`) VALUES ('".$nrp."')";

    $return = array(
        "status" => 1,
        "error" => "",
        'redirect' => ""
    );

    if($result = mysqli_query($con, $sql)){
        $return['status']=1;
        $return['error']="Insert Data Success";
        $return['redirect']="login.html";
    
    }
}else{
        $return['status']=0;
        $return['error']="NRP already exist";
        $return['redirect']="login.html";
}



echo json_encode($return);

?>