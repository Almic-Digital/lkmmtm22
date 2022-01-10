function check_absen(){
    $.ajax({
        url: "api/check_absen.php",
        method: "GET",
        success: function(data){
            if(data.length != 0){
                $("#absenttable").html(' ');
                data.forEach(function(absent){
                    var row = $("<tr scope='row'></tr>");
                    
                    var hari = absent['hari'];
                    var regis = absent['regis'];
                    var status = absent['status'];
                    var waktu = absent['waktu'];
                    
                    if(regis==1){
                        regis="In";
                    }else{
                        regis="Out";
                    }

                    if(status==1){
                        status="Terlambat";
                    }else{
                        status="Tepat Waktu";
                    }
    
                    var isi = $("<p>Regis-"+regis+" Hari ke-"+hari+" "+waktu+" "+status+"</p>");
                    
                    isi.appendTo(row);
                    
                    $("#absenttable").append(row);
                });
            }
            
        }
    })
}

check_absen();