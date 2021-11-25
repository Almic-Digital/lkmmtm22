<?php 
require 'connect.php';

if (isset($_GET['stat'])){
    if($_GET['stat']==1){
        echo "<script>alert('NRP dan password salah! Silahkan coba lagi.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>

<div class="container-fluid bg" style="min-height: 100vh; height: 100vh;">
		<div class="iner" style=" color: white;">
			<form action="ceklogin.php" method="POST" >
			<div class="row" >
				<div class="col-sm-12 col-md-6">
					<div class="form-group">
						<label for="nrp">NRP</label>
						<input type="text" class="form-control" id="input_nrp" placeholder="ex c1419.. or m26416.." name="nrp" required="">
					</div>
				</div>
				<div class="col-sm-12 col-md-6">
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" placeholder="Password" name="pass" required="">
					</div>
				</div>
			</div>

			<div class="row justify-content-center" style="padding-top: 5%;">
				<button type="submit" class="btn btn-warning" style="color: #2A2A2A;">Login</button>
			</div>

			<br>
				<p style="text-align:center; color:white;">By IT Division ITEM 2021</p>
		</form>
		</div>
	</div>



</body>
</html>