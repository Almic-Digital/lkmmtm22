<?php 
include "connect.php";

$nrp = $_SESSION['nrp'];

$sql = "SELECT * FROM panitia WHERE nrp = '".$nrp."' ";

$query = mysqli_query($con,$sql);

$data = mysqli_fetch_assoc($query);

$div = $data['divisi'];

echo $div;

if($div != 'BPH' ){
    $sql = "SELECT * FROM openrec WHERE divisi1 = '".$div."' OR divisi2 = '".$div."'";
}else{
    $sql = "SELECT * FROM openrec ";
}
$query = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calon panitia</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script>
   function check(){
     $(document).ready(function(){
      $("button").click(function(){
       var a =$(this).val();
       var link = "detail.php?d="+a;
       window.location.href = link;
     });
    });
   }

 </script>


</head>
<body>
    <a href="home.php">Home</a>
    <table>
        <thead>
            <td>Nama</td>
            <td>Divisi 1</td>
            <td>Divisi 2</td>
        </thead>
        <?php 
        while($row = mysqli_fetch_assoc($query)){?>
            <tr>
                <td><?php echo $row['nama']?></td>
                <td><?php echo $row['divisi1']?></td>
                <td><?php echo $row['divisi2']?></td>
                <td><button value="<?php echo $row['nrp'] ?>"  onclick="check()" >Check</button></td>
            </tr>
        
        <?php }
            ?>
    </table>
    
</body>
</html>