<?php 
include "connect.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $result = array(
        "status" => 0,
        "error" => "",
        "alias" => "",
        "hari"=>"",
        "jam"=>"",
        "place"=>""
    );

    $nrp = $_SESSION['nrp'];

    $nrp = strtoupper($nrp);

            $sql = "SELECT * FROM jadwal_openrec WHERE nrp_openrec = '".$nrp."' ";
            $query = mysqli_query($con,$sql);
            $row = mysqli_num_rows($query);
            
            if($row>=1){
                $result['status'] = 1;
                $data = mysqli_fetch_assoc($query);

                $nrppanit = $data['nrp_panit'];

                $hari  =$data['hari'];
                $jadwal = $data['jadwal'];

                $sql = "SELECT * FROM panitia WHERE nrp = '".$nrppanit."' ";
                $query = mysqli_query($con,$sql);
                $data = mysqli_fetch_assoc($query);

                $alias = $data['alias'];
                $meet = $data['meet'];

                $result['alias']=$alias;    
                $result['hari']=$hari;
                $result['jam']=$jadwal;
                $result['place']=$meet;

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