function get_alert_news(){
    $.ajax({
        url: "api/get_alert_news.php",
        method: "GET",
        success: function(data){
            if(data.length != 0){

            
                var alerted = '';
                data.forEach(function(news){
                    alerted += news['divisi'];
                    alerted += " ";
                    alerted += news['judul'];
                    alerted+= "\n";
                });
                alert(alerted);
            }
            
            
           
            
        }
    })
}

get_alert_news();