<?php 

include "connect.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

   
    $sql = "SELECT * FROM `absensi_mahasiswa` ORDER BY `nrp` ASC, `hari` ASC, `regis` DESC";
    $query = mysqli_query($con,$sql);

    $result = array();
    while($row = mysqli_fetch_assoc($query)) {
        array_push($result, $row);
    }

    $sql = "SELECT DISTINCT(hari) FROM `absensi_mahasiswa` ORDER BY hari";
    $query = mysqli_query($con,$sql);

    $date = array();
    while($row = mysqli_fetch_assoc($query)) {
        array_push($date, $row);
    }

    $sql = "SELECT `nrp` FROM `peserta` ORDER BY `nrp`";
    $query = mysqli_query($con,$sql);

    $nrp = array();
    while($row = mysqli_fetch_assoc($query)) {
        array_push($nrp, $row);
    }

    $nrp_count = count($nrp);
    $date_count = count($date);
    $result_count = count($result);
    $k = 0;

    $final_result = array(
        "date" => '-',
        "data" => '-',
    );
    $temp_result = array();
    for($i=0; $i<$nrp_count; $i++){
        
        for($j=0; $j<$date_count; $j++){
            $temp = array(
                "nrp" => '-',
                "hari" => '-',
                "waktu-in" => '-',
                "status-in" => '-',
                "waktu-out" => '-',
                "status-out" => '-'
            );
            $temp['nrp'] = $nrp[$i]['nrp'];
            $temp['hari'] = $date[$j]['hari'];

            if($k < $result_count && $result[$k]['nrp'] == $temp['nrp'] &&  $result[$k]['hari'] == $date[$j]['hari']){
                if($k+1 < $result_count && $result[$k]['hari'] == $result[$k+1]['hari'] && $result[$k]['regis'] == 1 && $result[$k+1]['regis'] == 0){
                    $temp['waktu-in'] = $result[$k]['waktu'];
                    $temp['waktu-out'] = $result[$k+1]['waktu'];
                    $temp['status-in'] = $result[$k]['status'];
                    $temp['status-out'] = $result[$k+1]['status'];
                    $k+=1;
                }else{
                    if($result[$k]['regis']==1){
                        $temp['waktu-in'] = $result[$k]['waktu'];
                        $temp['status-in'] = $result[$k]['status'];
                    }else{
                        $temp['waktu-out'] = $result[$k]['waktu'];
                        $temp['status-out'] = $result[$k]['status'];
                    }
                    
                }
                $k++;
            }
            
            array_push($temp_result, $temp);
        }

        
        
    }
    $final_result['date'] = $date;
    $final_result['data'] = $temp_result;

    echo json_encode($final_result);
} else {
    header("HTTP/1.1 400 Bad Request");
    $error = array(
        'error' => 'Method not Allowed'
    );

    echo json_encode($error);
}

?> 
