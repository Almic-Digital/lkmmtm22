<?php
	include 'connect.php';
    header("Content-Type: application/json");

	//untuk publish
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user = $_POST['nrp'];
		$pass = $_POST['password'];
		// $imap = false;
		// $timeout = 30;
		// $fp = fsockopen ($host='john.petra.ac.id',$port=110,$errno,$errstr,$timeout);
		// $errstr = fgets ($fp); 

		// if (substr ($errstr,0,1) == '+'){ 
		// 	fputs ($fp,"USER ".$user."\n");
		// 	$errstr = fgets ($fp);
		// 	if (substr ($errstr,0,1) == '+')
		// 	{
		// 		fputs ($fp,"PASS ".$pass."\n");
		// 		$errstr = fgets ($fp);
		// 		if (substr ($errstr,0,1) == '+')
		// 		{
		// 			$imap=true;
		// 		}
		// 	}
		//}
	}

	//untuk local
	$imap = true;

	/* Return Data */
	$result = array(
        "status" => 1,
        "error" => "",
        'redirect' => "",
		
	);

	//untuk local
	
			if($imap){	
				$user = $_POST['nrp'];
				if(strlen($user) == 9){
					$sql = "SELECT * FROM `peserta` WHERE nrp='".$user."'";
						
					$query = mysqli_query($con, $sql);
                    if($row = mysqli_fetch_assoc($query)){
                        $result['redirect'] = "home.html";
                        $result['status'] = 1;	
                        $result['error'] = "Success";
                            
                            
                        $_SESSION['nrp'] = $user;
                    }else{
                        $result['status'] = 0;
					    $result['error'] = 'Wrong Username or Password';
					    $result['redirect'] = "none";
                    }

					

						
						
				
					
				}else{
					$result['status'] = 0;
					$result['error'] = 'Wrong Username or Password';
					$result['redirect'] = "none";
				}
			}
			else{
				$result['redirect'] = "none";
				$result['status'] = 0;
				$result['error'] = 'Wrong Username or Password';
			}
		
		


	
	

	echo json_encode($result);
?>
