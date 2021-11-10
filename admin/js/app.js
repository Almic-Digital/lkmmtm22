$(document).ready(function(){
    load_alias();
});

function delete_data(id, stat, nrpopen){
    if(stat == 0 || nrpopen != ''){
        $.ajax({
            url: '/lkmmtm22/admin/api/delete_jadwal.php',
            method: 'POST',
            data:{
                id:id
            },
            success: function(data){
                load_data();
            },
            error: function($xhr, textStatus, errorThrown) {
                alert($xhr.responseJSON['error']);
            } 
        });
    }else{
        alert("Jadwal sudah terpilih, tidak dapat dihapus");
    }
    
}

function load_alias(){
    $.ajax({
        url: "/lkmmtm22/admin/api/get_alias.php",
        method: "GET",
        success: function(data){
            var co = 1;
            console.log(data);
            $("#aliastable").html(' ');
            data.forEach(function(panit) {
                var row = $("<tr scope='row'></tr>");
                var col1 = $("<td>"+ co + "</td>");
                var col2 = $("<td>" + panit['nama'] + "</td>");
                var col3 = $("<td>" + panit['divisi'] + "</td>");                        
                var col4 = $("<td>" + panit['alias'] + "</td>");

                col1.appendTo(row);
                col2.appendTo(row);
                col3.appendTo(row);
                col4.appendTo(row);

                co++;
                $("#aliastable").append(row);
            });
        }
    })
}

function ganti(){
    var alias = $("#alias").val();

    $.ajax({
        url: "/lkmmtm22/admin/api/ganti_alias.php",
        method: "POST",
        data:{
            alias:alias
        },
        success: function(data){
            load_alias();
        }
    })
}


function addData(){
    var hari = $("#hari").val();
    var jam = $("#jam").val();

    $.ajax({
        url: "/lkmmtm22/admin/api/addJadwal.php",
        method: 'POST',
        data: {
            hari:hari,
            jam:jam
        },
        async: false,
        success: function(data){
            load_data();
        }
    })
}
