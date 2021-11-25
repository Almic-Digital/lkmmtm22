<?php 
ob_start();
include "connect.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $result = array(
        "status" => 0,
        "error" => "",
        "alias" => "",
        "hari"=>"",
        "jam"=>"",
        "place"=>"",
        "inform"=>0
    );

    $nrp = $_SESSION['nrp'];

    $nrp = strtoupper($nrp);

            $sql = "SELECT * FROM jadwal_openrec JOIN openrec p ON p.nrp = nrp_openrec WHERE nrp_openrec = '".$nrp."' ";
            $query = mysqli_query($con,$sql);
            $row = mysqli_num_rows($query);
            
            if($row>=1){
                $result['status'] = 1;
                $data = mysqli_fetch_assoc($query);

                $nrppanit = $data['nrp_panit'];

                $hari  =$data['hari'];
                $jadwal = $data['jadwal'];
                $status = $data['status'];

                $sql = "SELECT * FROM panitia WHERE nrp = '".$nrppanit."' ";
                $query = mysqli_query($con,$sql);
                $data = mysqli_fetch_assoc($query);

                $alias = $data['alias'];
                $meet = $data['meet'];

                $result['alias']=$alias;    
                $result['hari']=$hari;
                $result['jam']=$jadwal;
                $result['place']=$meet;

                if($status <= 2){
                    $result['inform']=1;
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
ob_end_flush();
?> 