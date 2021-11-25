<?php
ob_start();
	function openconnect(){
		$con = mysqli_connect('localhost','lkmmtmpetraac','petralkmmTM30','lkmmtmpe_tm');
	}

	$con = mysqli_connect('localhost','lkmmtmpetraac','petralkmmTM30','lkmmtmpe_tm');

	session_start();
	ob_end_flush();
?>
