<?php 

include "connect.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $nrp = $_SESSION['nrp'];
    $sql = "SELECT * FROM `absensi_mahasiswa` WHERE `nrp` = '".$nrp."' ORDER BY `hari`,`regis`  DESC";
    $query = mysqli_query($con,$sql);

    $result = array();
    while($row = mysqli_fetch_assoc($query)) {
        array_push($result, $row);
    }

    echo json_encode($result);
} else {
    header("HTTP/1.1 400 Bad Request");
    $error = array(
        'error' => 'Method not Allowed'
    );

    echo json_encode($error);
}

?> 
