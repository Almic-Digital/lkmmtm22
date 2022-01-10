$(document).ready(function(){
    load_alias();
});

function delete_data(id, stat, nrpopen){
    if(stat == 0 || nrpopen != ''){
        $.ajax({
            url: 'api/delete_jadwal.php',
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
        url: "api/get_alias.php",
        method: "GET",
        success: function(data){
            var co = 1;
            //data = JSON.parse(data);
            $("#aliastable").html(' ');
            data.forEach(function(panit){
                var row = $("<tr scope='row'></tr>");
                var col1 = $("<td>"+ co + "</td>");
                var col2 = $("<td>" + panit['nama'] + "</td>");
                var col3 = $("<td>" + panit['divisi'] + "</td>");                        
                var col4 = $("<td>" + panit['alias'] + "</td>");
                var col5 = $("<td>" + panit['meet']+"</td>");

                col1.appendTo(row);
                col2.appendTo(row);
                col3.appendTo(row);
                col5.appendTo(row);
                col4.appendTo(row);

                co++;
                $("#aliastable").append(row);
            });
            
        }
    })
}

function ganti_meet(){
    var meet = $("#meet").val();

    $.ajax({
        url: "api/ganti_meet.php",
        method: "POST",
        data:{
            meet:meet
        },
        success: function(data){
            load_alias();
            $("#meetku").html("<a href=\""+meet+"\">"+meet);
        }
    })
}

function ganti_alias(){
    var alias = $("#alias").val();

    $.ajax({
        url: "api/ganti_alias.php",
        method: "POST",
        data:{
            alias:alias
        },
        success: function(data){
            load_alias();
            $("#aliasku").html(alias);
        }
    })
}


function addData(){
    var hari = $("#hari").val();
    var jam = $("#jam").val();

    $.ajax({
        url: "api/addJadwal.php",
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

function addNews(divisi){
    
    var fd = new FormData();

    //File
    var file = $('#inputFile')[0].files;
    var file_name = $('#inputFile').val();

    var title = $('#title').val();
    var desc = $('#desc').val();


    var ekstension = ['JPG','JPEG','PNG', 'PDF','jpg','jpeg','png', 'pdf'];

    // Check file selected or not
    if(file.length > 0  ){
        fd.append('file',file[0]);
        fd.append('title',title);
        fd.append('desc', desc);
        fd.append('divisi', divisi);
        fd.append('addFile',1);

        var ext_file = file_name.split('.').pop();


        if(ekstension.indexOf(ext_file) != -1){
           
                $.ajax({
                    url: 'api/addNews.php',
                    data:fd,
                    method:'POST',
                    contentType: false,
                    processData: false,

                    success:function(data){
                        alert("success");
                        load_news();
                        
                    },
                    error:function($xhr, textStatus, errorThrown) {
                        alert("Access Denied");
                    }
                })
        }else{
            alert("Please Choose the right extension");
        }

    }else{
        fd.append('title',title);
        fd.append('desc', desc);
        fd.append('divisi', divisi);
        fd.append('addFile',0);

        $.ajax({
            url: 'api/addNews.php',
            data:fd,
            method:'POST',
            contentType: false,
            processData: false,

            success:function(data){
                alert("success");
                load_news();
                
            },
            error:function($xhr, textStatus, errorThrown) {
                alert("Access Denied");
            }
        })
    }
    
}

function changeAbsen(){
    var hari = $("#hari").val();
    var waktu = $("#waktu").val();
    var regis = $("#regis").val();
    var status = $("#aktif").val();

    $.ajax({
        url: "api/changeAbsen.php",
        method: 'POST',
        data: {
            hari:hari,
            waktu:waktu,
            regis:regis,
            status:status
        },
        async: false,
        success: function(data){
            alert("Success");
        }
    })
}

function load_news(){
    $.ajax({
        url: "api/get_news.php",
        method: "GET",
        success: function(data){
            var co = 1;
            
            $("#newstable").html(' ');
            data.forEach(function(news){
                var row = $("<tr scope='row'></tr>");
                var col1 = $("<td>"+ co + "</td>");
                var col2 = $("<td>" + news['time'] + "</td>");
                var col3 = $("<td>" + news['divisi'] + "</td>");                        
                var col4 = $("<td>" + news['judul'] + "</td>");
                var col5 = $("<td>" + news['desc']+"</td>");
                var col6;
                if(news['file']=='-'){
                    col6 = $("<td>-</td>");

                }else{
                    col6 = $("<td><a href='../" + news['file']+"'>file</td>");
                }
                
                col1.appendTo(row);
                col2.appendTo(row);
                col3.appendTo(row);
                col4.appendTo(row);
                col5.appendTo(row);
                col6.appendTo(row);

                co++;
                $("#newstable").append(row);
            });
            
        }
    })
}
