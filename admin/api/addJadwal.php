<?php 
include "connect.php";

header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD']=='POST'){
    $hari = $_POST['hari'];
    $jam = $_POST['jam'];
    $nrp = $_SESSION['nrp'];

    $res = array(
        'status'=>1,
        'error'=>''
    );

    $sql = "SELECT * FROM panitia WHERE nrp = '".$nrp."'";
    $query = mysqli_query($con,$sql);

    $data = mysqli_fetch_assoc($query);

    $div = $data['divisi'];

    $sql = "INSERT INTO `jadwal_openrec` (`id`, `nrp_panit`, `hari`, `jadwal`, `divisi`, `status`, `nrp_openrec`) VALUES (default,'".$nrp."','".$hari."','".$jam."','".$div."','0','')";
    $query = mysqli_query($con,$sql);

    echo json_encode($div);
}

?>