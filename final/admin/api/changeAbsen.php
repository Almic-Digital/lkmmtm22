<?php 
include "connect.php";

header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD']=='POST'){
    $hari = $_POST['hari'];
    $waktu = $_POST['waktu'];
    $regis = $_POST['regis'];
    $status = $_POST['status'];
    

    $res = array(
        'status'=>1,
        'error'=>''
    );

    $sql = "UPDATE `absensi` SET `hari`='".$hari."',`regis`=".$regis.",`jam`='".$waktu."',`status`=".$status." WHERE 1";
    if($query = mysqli_query($con,$sql)){

    }else{
        $res['status']=0;
        $res['error']=$sql;
    }

    

    echo json_encode($res);
}

?>