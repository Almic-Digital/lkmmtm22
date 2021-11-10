<?php 
include 'connect.php';

if (!isset($_SESSION['nrp']) || $_SESSION['nrp'] == "") 
	{
		header("Location: index.php");
    }

$nrp = $_SESSION['nrp'];

$sql = "SELECT * FROM panitia WHERE nrp = '".$nrp."'";

$query = mysqli_query($con, $sql);

$data = mysqli_fetch_assoc($query);


    
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <p>Hello <?php echo $data['nama'] ?></p>
    <p>Aliasmu adalah <?php echo $data['alias'] ?></p>
    <a href="isijadwal.php">Isi Jadwal Wawancara</a>
    <a href="calonpanitia.php">Calon Panitia</a>
    <a href="cekwawancara.php">Jadwal Wawancara</a>
</body>
</html>