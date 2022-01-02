function get_news(){
    $.ajax({
        url: "api/get_news.php",
        method: "GET",
        success: function(data){
            
            
            $("#newstable").html(' ');
            data.forEach(function(news){
                var row = $("<tr scope='row'></tr>");
                
                var div = news['divisi'];
                var title = news['judul'];
                var desc = news['desc'];
                var file = news['file'];
                var time = news['time'];

                var header = $("<h2>"+title+" / "+div+"</h2>");
                time = $("<p>"+time+"</p>");
                var isi =$("<p>"+desc+"</p>");

                header.appendTo(row);
                time.appendTo(row);
                isi.appendTo(row);

                if(file != '-'){
                    file = $("<br><p>Link File : <a href'../"+file+"'>Link</a></p>");
                    file.appendTo(row);
                }
                
                
                
                $("#newstable").append(row);
            });
            
        }
    })
}

get_news();