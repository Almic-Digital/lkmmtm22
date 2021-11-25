<?php 
ob_start();
include "connect.php";

header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD']=='POST'){
    $meet = $_POST['meet'];
    $nrp = $_SESSION['nrp'];

    $res = array(
        'status'=>1,
        'error'=>''
    );


    $sql = "UPDATE `panitia` SET `meet` = '".$meet."' WHERE `nrp` = '".$nrp."'  ";
    $query = mysqli_query($con,$sql);

    echo json_encode($res);
}
ob_end_flush();
?>