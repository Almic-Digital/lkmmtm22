<?php

include 'connect.php';

header("Content-Type: application/json");

$allowed = array("png","jpg","jpeg","pdf","PNG","JPG","JPEG","PDF");

if($_SERVER['REQUEST_METHOD']=="POST"){
    $res = array(
        'status'=>1,
        'error'=> ''
    );

    
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $divisi = $_POST['divisi'];
    $status = $_POST['addFile'];

    if($status==1){
        $file = $_FILES['file'];

        $ext_file = pathinfo($file['name'],PATHINFO_EXTENSION);


        if(in_array($ext_file,$allowed)) 
        {
            
            $dir = "../../files/";

            $dist = $dir."_".$divisi."_".time().".".$ext_file;

            if(move_uploaded_file($file['tmp_name'], $dist))
            {

                $dir = "files/";
                
                $dist = $dir."_".$divisi."_".time().".".$ext_file;

                $sql = "INSERT INTO `news`(`divisi`, `time`, `judul`, `desc`, `file`) VALUES ('".$divisi."',NOW(),'".$title."','".$desc."', '".$dist."' )";
                $query = mysqli_query($con,$sql);


                echo json_encode($res);

            }else{
                $res['status']=0;
                $res['error']='Failed to upload File';
                echo json_encode($res);
            }

        }else{
            $res['status']=0;
            $res['error']='wrong extension';
            echo json_encode($res);
        }
    }else{
        $sql = "INSERT INTO `news`(`divisi`, `time`, `judul`, `desc`) VALUES ('".$divisi."',NOW(),'".$title."','".$desc."' )";
        $query = mysqli_query($con,$sql);

        echo json_encode($res);
    }

    

    

   

   
    

}


?>