function get_alert_news(){
    $.ajax({
        url: "api/get_alert_news.php",
        method: "GET",
        success: function(data){
            if(data.length != 0){

            
                var alerted = '';
                data.forEach(function(news){
                    alerted += "<h3>"
                    alerted += news['divisi'];
                    alerted += "/";
                    alerted += news['judul'];
                    alerted+= "</h3>";
                });
                $("#modal-container").html(alerted);
            }
            
            
           
            
        }
    })
}

get_alert_news();