<?php 
ob_start();
include "connect.php";

header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD']=='POST'){
    $alias = $_POST['alias'];
    $nrp = $_SESSION['nrp'];

    $res = array(
        'status'=>1,
        'error'=>''
    );


    $sql = "UPDATE `panitia` SET `alias` = '".$alias."' WHERE `nrp` = '".$nrp."'  ";
    $query = mysqli_query($con,$sql);

    echo json_encode($res);
}
ob_end_flush();
?>