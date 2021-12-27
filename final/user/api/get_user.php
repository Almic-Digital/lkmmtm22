<?php 
include "connect.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $nrp = $_SESSION['nrp'];

    $sql = "SELECT * FROM 'peserta'";
    $query = mysqli_query($con,$sql);

    $result = mysqli_fetch_assoc($query);
    echo json_encode($result);
}

?> 