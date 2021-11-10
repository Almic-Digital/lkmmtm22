<?php 
include "connect.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $result = array(
        "status" => 0,
        "error" => "",
        "alias" => "",
        "hari"=>"",
        "jam"=>""
    );

    $nrp = $_SESSION['nrp'];

    $sql = "SELECT * FROM openrec WHERE nrp = '".$nrp."' ";
    $query = mysqli_query($con,$sql);
    $row = mysqli_num_rows($query);
    $data = mysqli_fetch_assoc($query);

    if($row>=1){
        $result['status'] = 1;
        if($data['cv']!=NULL){
            $result['status'] = 2;

            $sql = "SELECT * FROM jadwal_openrec WHERE nrp_openrec = '".$nrp."' ";
            $query = mysqli_query($con,$sql);
            $row = mysqli_num_rows($query);
            
            if($row>=1){
                $result['status'] = 3;
                $data = mysqli_fetch_assoc($query);

                $nrppanit = $data['nrp_panit'];

                $hari  =$data['hari'];
                $jadwal = $data['jadwal'];

                $sql = "SELECT * FROM panitia WHERE nrp = '".$nrppanit."' ";
                $query = mysqli_query($con,$sql);
                $data = mysqli_fetch_assoc($query);

                $alias = $data['alias'];

                $result['alias']=$alias;    
                $result['hari']=$hari;
                $result['jam']=$jadwal;
                

            }

        }
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