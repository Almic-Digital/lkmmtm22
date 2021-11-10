$(document).ready(function(){
    $("#submit-nrp").click(function(){
        var nrp = $("#nrp").val();

        $.ajax({
            method: 'POST',
            url: "api/submitnrp.php",
            data: {nrp: nrp},
            dataType: 'json',
            success: function( response ){
                if(response['status']==0){
                    alert(response['error']);
                    window.location = response['redirect'];
                }else{
                    alert(response['error']);
                    window.location = response['redirect'];
                }
            },error: function(e){
                
            }
        });
    })
    
})