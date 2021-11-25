<?php
 ob_start();
include "connect.php";

$user = $_REQUEST['nrp'];
$nrp = strtoupper($user);
$pass = $_REQUEST['pass'];

$return = array(
    "status" => 1,
    "error" => "",
    'redirect' => ""
);

// untuk publish
		$imap = false;
		$timeout = 30;
		$fp = fsockopen ($host='john.petra.ac.id',$port=110,$errno,$errstr,$timeout);
		$errstr = fgets ($fp); 

		if (substr ($errstr,0,1) == '+')
		{ 
			fputs ($fp,"USER ".$user."\n");
			$errstr = fgets ($fp);

			if (substr ($errstr,0,1) == '+')
			{
				fputs ($fp,"PASS ".$pass."\n");
				$errstr = fgets ($fp);

				if (substr ($errstr,0,1) == '+')
				{
					$imap=true;
				}
			}
		}

		//untuk local
		//$imap = true;
if($imap){
if(strlen($nrp)==9){

    $sql1 = "SELECT * FROM `openrec` WHERE nrp = '".$nrp."'";

$result1 = mysqli_query($con, $sql1);

$row = mysqli_num_rows($result1);

if($row == 0){
    $sql = "INSERT INTO `openrec`(`nrp`) VALUES ('".$nrp."')";

    

    if($result = mysqli_query($con, $sql)){
        $return['status']=1;
        $return['error']="Insert Data Success";
        $return['redirect']="login.html";
    
    }
}else{
        $return['status']=1;
        $return['error']="NRP already exist";
        $return['redirect']="login.html";
}
}else{
    $return['status']=0;
    $return['error']="Username or Password False";
    $return['redirect']="submitnrp.html";
}

}else{
    $return['status']=0;
    $return['error']="Username or Password False";
    $return['redirect']="submitnrp.html";
}




echo json_encode($return);
ob_end_flush();
?>