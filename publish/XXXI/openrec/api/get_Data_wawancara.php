<?php 
ob_start();
include "connect.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $nrp = $_SESSION['nrp'];

    $sql = "SELECT j.id as id, j.jadwal as jadwal, j.hari as hari, p.alias as alias FROM jadwal_openrec j JOIN panitia p ON nrp_panit=nrp WHERE j.status = 0 AND p.status < 5";
    $query = mysqli_query($con,$sql);

    $result = array();
    while($row = mysqli_fetch_assoc($query)) {
        array_push($result, $row);
    }

    echo json_encode($result);
}
ob_end_flush();
?> 