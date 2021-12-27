<?php
include "connect.php";

$nrp = $_SESSION['nrp'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<script>
    $(document).ready(function() {
        load_data();
    });

    function delete_data(a) {
        $.ajax({
            url: 'delete_jadwal.php',
            method: 'POST',
            data: {
                id: a
            },
            success: function(data) {
                load_data();
            },
            error: function($xhr, textStatus, errorThrown) {
                alert($xhr.responseJSON['error']);
            }
        });
    }

    function load_data() {
        $.ajax({
            url: "get_jadwal.php?d=<?php echo $nrp ?>",
            method: "GET",
            success: function(data) {
                var co = 1;
                $("#jadwalwawancara").html(' ');
                data.forEach(function(item) {
                    var id = item['id'];
                    var row = $("<tr></tr>");
                    var col1 = $("<td>" + co + "</td>");
                    var col2 = $("<td>" + item['hari'] + "</td>");
                    var col3 = $("<td>" + item['jadwal'] + "</td>");
                    var col4 = $("<td><button type='button' onclick='delete_data(" + id +
                        ")'>Delete</button>");

                    col1.appendTo(row);
                    col2.appendTo(row);
                    col3.appendTo(row);
                    col4.appendTo(row);


                    co++;
                    $("#jadwalwawancara").append(row);
                });

            }

        });
    }



    function addData() {
        var hari = $("#hari").val();
        var jam = $("#jam").val();

        $.ajax({
            url: "addJadwal.php",
            method: 'POST',
            data: {
                hari: hari,
                jam: jam
            },
            async: false,
            success: function(data) {
                load_data();
            }
        })
    }
</script>

<body>
    <a href="home.php">Home</a>
    <form>
        <select name="hari" id="hari">
            <option value="Jumat 18 Desember 2020">Jumat 18 Desember 2020</option>
            <option value="Sabtu 19 Desember 2020">Sabtu 19 Desember 2020</option>
            <option value="Senin 21 Desember 2020">Senin 21 Desember 2020</option>
            <option value="Selasa 22 Desember 2020">Selasa 22 Desember 2020</option>
            <option value="Rabu 23 Desember 2020">Rabu 23 Desember 2020</option>
        </select>
        <select name="jam" id="jam">
            <option value="09.30-10.00">09.30-10.00</option>
            <option value="10.00-10.30">10.00-10.30</option>
            <option value="10.30-11.00">10.30-11.00</option>
            <option value="11.00-11.30">11.00-11.30</option>
            <option value="11.30-12.00">11.30-12.00</option>
            <option value="12.00-12.30">12.00-12.30</option>
            <option value="12.30-13.00">12.30-13.00</option>

            <option value="13.00-13.30">13.00-13.30</option>
            <option value="13.30-14.00">13.30-14.00</option>
            <option value="14.00-14.30">14.00-14.30</option>
            <option value="14.30-15.00">14.30-15.00</option>
            <option value="15.00-15.30">15.00-15.30</option>
            <option value="15.30-16.00">15.30-16.00</option>
            <option value="16.00-16.30">16.00-16.30</option>

            <option value="16.30-17.00">16.30-17.00</option>
            <option value="17.00-17.30">17.00-17.30</option>
            <option value="17.30-18.00">17.30-18.00</option>
            <option value="18.00-18.30">18.00-18.30</option>
            <option value="18.30-19.00">18.30-19.00</option>

        </select>

        <button onclick="addData()">Submit</button>

    </form>




</body>

</html>