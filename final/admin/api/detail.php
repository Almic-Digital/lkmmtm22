<?php
include "connect.php";

$nrp = $_GET['d'];

$sql = "SELECT * FROM openrec WHERE nrp = '" . $nrp . "'";
$query = mysqli_query($con, $sql);

$data = mysqli_fetch_assoc($query);

$foto = "../openrec/" . $data['pasfoto'];
$cv = "../openrec/" . $data['cv'];
$tr = "../openrec/" . $data['transkrip'];
$khs = "../openrec/" . $data['khs'];
$ktm = "../openrec/" . $data['ktm'];
$skkk = "../openrec/" . $data['skkk'];

$nama = $data['nama'];
$line = $data['id_line'];
$jenis = $data['jeniskelamin'];
$tanggal = $data['tanggallahir'];
$alamat = $data['alamat'];
$hp = $data['hp'];
$ipk = $data['ipk'];
$div1 = $data['divisi1'];
$div2 = $data['divisi2'];
$ig = $data['ig'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Peserta</title>
</head>

<body>
    <a href="home.php">Home</a>
    <p>Nama : <?php echo $nama ?></p>
    <p>NRP : <?php echo $nrp ?></p>
    <p>Jenis Kelamin : <?php echo $jenis ?></p>
    <p>Tanggal Lahir : <?php echo $tanggal ?></p>
    <p>Alamat : <?php echo $alamat ?></p>
    <p>Nomor HP : <?php echo $hp ?></p>
    <p>Id line : <?php echo $line ?></p>
    <p>Instagram : <?php echo $ig ?></p>
    <p>IPK : <?php echo $ipk ?></p>
    <p>Divisi 1 : <?php echo $div1 ?></p>
    <p>Divisi 2 : <?php echo $div2 ?></p>
    <p>Pas Foto</p>
    <img src="<?php echo $foto ?>" style="width:10vmax;">
    <p>CV</p>
    <embed src="<?php echo $cv ?> " width='600vmin' height='800vmin'></embed>
    <p>Transkrip Nilai</p>
    <img src="<?php echo $tr ?>" style="width:100vmin;">
    <p>KHS</p>
    <img src="<?php echo $khs ?>" style="width:100vmin;">
    <p>KTM</p>
    <img src="<?php echo $ktm ?>" style="width:100vmin;">
    <p>SKKK</p>
    <img src="<?php echo $skkk ?>" style="width:100vmin;">
</body>

</html>