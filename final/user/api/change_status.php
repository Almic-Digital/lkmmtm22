<?php 
include "connect.php";

header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD']=='POST'){
    $nrp = $_SESSION['nrp'];

    $res = array(
        'status'=>1,
        'error'=>''
    );


    $sql = "UPDATE `peserta` SET `status` = 0 WHERE `nrp` = '".$nrp."'  ";
    $query = mysqli_query($con,$sql);

    $sql = "INSERT INTO `rekap_change_status`(`nrp`) VALUES ('".$nrp."') ";
    $query = mysqli_query($con,$sql);

    echo json_encode($res);
}

?>