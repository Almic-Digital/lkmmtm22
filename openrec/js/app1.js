$(document).ready(function(){
    $("#submit-nrp").click(function(){
        var nrp = $("#nrp").val();
        var pass = $("#pass").val();
        $.ajax({
            method: 'POST',
            url: "api/submitnrp.php",
            data: {nrp: nrp, pass:pass},
            dataType: 'json',
            success: function( response ){
                if(response['status']==1){
                    alert(response['error']);
                    window.location = response['redirect'];
                }else{
                    alert(response['error']);
                }
            },error: function(e){
                
            }
        });
    })
    
})