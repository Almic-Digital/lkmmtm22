function check_absen(){
    $.ajax({
        url: "api/check_absen.php",
        method: "GET",
        success: function(data){
            if(data.length != 0){
                $("#absentTable").html(' ');
                data.forEach(function(absent){
                    var row = $("<tr scope='row'></tr>");
                    
                    var hari = absent['hari'];
                    var status_in = absent['status-in'];
                    var waktu_in = absent['waktu-in'];
                    var status_out = absent['status-out'];
                    var waktu_out = absent['waktu-out'];
                    
                    var col1 = $("<td>"+hari+"</td>");
                    var col2 = $("<td>"+waktu_in+"</td>");
                    var col3;
                    var col4 = $("<td>"+waktu_out+"</td>");
                    var col5;

                    if(status_in == 0){
                        col3 = $("<td><button class='btnt'>Done</button></td>")
                    }else if(status_in == 1){
                        col3 = $("<td><button class='btns'>Late</button></td>")
                    }else{
                        col3 = $("<td><button class='btnl'>Empty</button></td>")
                    }

                    if(status_out == 0){
                        col5 = $("<td><button class='btnt'>Done</button></td>")
                    }else if(status_out == 1){
                        col5 = $("<td><button class='btns'>Late</button></td>")
                    }else{
                        col5 = $("<td><button class='btnl'>Empty</button></td>")
                    }

                    col1.appendTo(row);
                    col2.appendTo(row);
                    col3.appendTo(row);
                    col4.appendTo(row);
                    col5.appendTo(row);
                    
                    
                    
                    $("#absentTable").append(row);
                });
            }
            
        }
    })
}

check_absen();