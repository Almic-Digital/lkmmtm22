<?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$user = $_POST['nrp'];
	$pass = $_POST['pass'];
	$imap = false;
	$timeout = 30;
	$fp = fsockopen($host = 'john.petra.ac.id', $port = 110, $errno, $errstr, $timeout);
	$errstr = fgets($fp);

	if (substr($errstr, 0, 1) == '+') {
		fputs($fp, "USER " . $user . "\n");
		$errstr = fgets($fp);

		if (substr($errstr, 0, 1) == '+') {
			fputs($fp, "PASS " . $pass . "\n");
			$errstr = fgets($fp);

			if (substr($errstr, 0, 1) == '+') {
				$imap = true;
			}
		}
	}
}

if ($imap) {
	$user = $_POST['nrp'];

	if (strlen($user) == 9) {
		$_SESSION['nrp'] = $user;
		$sql = "SELECT * FROM panitia";
		$query = mysqli_query($con, $sql);

		$find = false;
		while ($data = mysqli_fetch_assoc($query)) {
			if ($_SESSION['nrp'] == $data['nrp']) {
				$find = true;
			}
		}

		if ($find) {
			header("Location: index.php");
		} else {
			header("Location: login.php?stat=1");
		}
	} else {
		header("Location: login.php?stat=1");
	}
} else {
	header("Location: login.php?stat=1");
}