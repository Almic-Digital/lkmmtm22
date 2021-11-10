<?php 
include "connect.php";

$nrp = $_SESSION['nrp'];

header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $jadwal = $_POST['jadwal'];
    
    $result= array(
        "status" =>1,
        "error" => " "
    );

    $sql = "UPDATE `jadwal_openrec` SET `status` = '1', `nrp_openrec` = '".$nrp."' WHERE `jadwal_openrec`.`id` = $jadwal";
    
    $query = mysqli_query($con,$sql);

    if(!$query){
        $result['status']=0;
        $result['error']="Data Gagal dimasukkan";
    }else{
        $sql = "UPDATE panitia SET status = status + 1 WHERE nrp = (SELECT nrp_panit FROM jadwal_openrec WHERE id = $jadwal)";
        $query = mysqli_query($con,$sql);
        
    }

}

echo json_encode($result);

?> 