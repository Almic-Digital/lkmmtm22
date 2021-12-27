<?php
include "connect.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $result = array(
        "status" => 1,
        "error" => ""
    );

    $id = $_POST['id'];

    $sql = "DELETE FROM jadwal_openrec  WHERE id = '".$id."'";
    $query = mysqli_query($con,$sql);

    echo json_encode($result);
} else {
    header("HTTP/1.1 400 Bad Request");
    $error = array(
        'error' => 'Method not Allowed'
    );

    echo json_encode($error);
}

?> 