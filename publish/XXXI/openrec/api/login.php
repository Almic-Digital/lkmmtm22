<?php
	ob_start();
	include 'connect.php';
	//untuk publish
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user = $_POST['nrp'];
		$pass = $_POST['password'];
		$imap = false;
		$timeout = 30;
		$fp = fsockopen ($host='john.petra.ac.id',$port=110,$errno,$errstr,$timeout);
		$errstr = fgets ($fp); 

		if (substr ($errstr,0,1) == '+'){ 
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
	}

	//untuk local
	//$imap = true;

	/* Return Data */
	$result = array(
        "status" => 1,
        "error" => "",
        'redirect' => ""
	);

	//untuk publish
	//check captcha
	if(isset($_POST['recaptcha']) && !empty($_POST['recaptcha'])){
        //your site secret key
		$secret = "6LckfS0dAAAAANVjTpcMmP59oOfMGwI1JUO_A7JH";
        //get verify response data
		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['recaptcha']);
		$responseData = json_decode($verifyResponse);

		if(!$responseData->success){
			$result['status'] = 0;
			$result['error'] = 'Please Check the Captcha Box';
			$result['redirect'] = "none";
		}else{
			if($imap){	
				$user = $_POST['nrp'];
				if(strlen($user)==9){

					$sql = "SELECT * FROM `openrec`";
					$query = mysqli_query($con,$sql);

					$find = false;
					$temp="";
					while($data = mysqli_fetch_assoc($query)){
						$temp.=$data['nrp'];
						if(strtolower($user) == strtolower($data['nrp'])){
							$find = true;
						}
					}
					if($find){
                                                $sql = "UPDATE `openrec` SET status = status+1 WHERE `openrec`.`nrp` = '".$user."'";
						$query = mysqli_query($con,$sql);
						
						$result['redirect'] = "interview.html";
						$result['status'] = 1;	
						$result['error'] = "Success";
						$_SESSION['nrp'] = $user;
						
						
				
					}else{
						$result['redirect'] = "login.html";
						$result['status'] = 0;	
						$result['error'] = "Please register or check your email";
				
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
		}
	}else{
		$result['redirect'] = "none";
		$result['status'] = 0;
		$result['error'] = '400 Bad request';
	}	

	//untuk local
	
			// if($imap){	
			// 	$user = $_POST['nrp'];
			// 	if(strlen($user)==9){

			// 		$sql = "SELECT * FROM `openrec`";
			// 		$query = mysqli_query($con,$sql);

			// 		$find = false;
			// 		$temp="";
			// 		while($data = mysqli_fetch_assoc($query)){
			// 			$temp.=$data['nrp'];
			// 			if(strtolower($user) == strtolower($data['nrp'])){
			// 				$find = true;
			// 			}
			// 		}
			// 		if($find){
			// 			$result['redirect'] = "interview.html";
			// 			$result['status'] = 1;	
			// 			$result['error'] = "Success";
			// 			$_SESSION['nrp'] = $user;
						
						
				
			// 		}else{
			// 			$result['redirect'] = "login.html";
			// 			$result['status'] = 0;	
			// 			$result['error'] = "Please register or check your email";
				
			// 		}
			// 		}else{
			// 		$result['status'] = 0;
			// 		$result['error'] = 'Wrong Username or Password';
			// 		$result['redirect'] = "none";
			// 	}
			// }
			// else{
			// 	$result['redirect'] = "none";
			// 	$result['status'] = 0;
			// 	$result['error'] = 'Wrong Username or Password';
			// }
		
		


	
	

	echo json_encode($result);
	ob_end_flush();
?>
