<?php 

include "connect.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $nrp = $_SESSION['nrp'];
    $sql = "SELECT * FROM `absensi_mahasiswa` WHERE `nrp` = '".$nrp."' ORDER BY `hari` ASC,`regis`  DESC";
    $query = mysqli_query($con,$sql);

    $result = array();
    while($row = mysqli_fetch_assoc($query)) {
        array_push($result, $row);
    }

    $final_result = array();
    for($i=0; $i<count($result); $i++){
        $temp = array(
            "hari" => '-',
            "waktu-in" => '-',
            "status-in" => '-',
            "waktu-out" => '-',
            "status-out" => '-'
        );
        if($i+1 < count($result) && $result[$i]['hari'] == $result[$i+1]['hari'] && $result[$i]['regis'] == 1 && $result[$i+1]['regis'] == 0){
            $temp['hari'] = $result[$i]['hari'];
            $temp['waktu-in'] = $result[$i]['waktu'];
            $temp['waktu-out'] = $result[$i+1]['waktu'];
            $temp['status-in'] = $result[$i]['status'];
            $temp['status-out'] = $result[$i+1]['status'];
            $i+=1;
        }else{
            if($result[$i]['regis']==1){
                $temp['hari'] = $result[$i]['hari'];
                $temp['waktu-in'] = $result[$i]['waktu'];
                $temp['status-in'] = $result[$i]['status'];
            }else{
                $temp['hari'] = $result[$i]['hari'];
                $temp['waktu-out'] = $result[$i]['waktu'];
                $temp['status-out'] = $result[$i]['status'];
            }
            
        }
        array_push($final_result, $temp);
    }

    echo json_encode($final_result);
} else {
    header("HTTP/1.1 400 Bad Request");
    $error = array(
        'error' => 'Method not Allowed'
    );

    echo json_encode($error);
}

?> 
