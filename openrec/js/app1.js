$(document).ready(function(){
    $("#submit-nrp").click(function(){
        var nrp = $("#nrp").val();

        $.ajax({
            method: 'POST',
            url: "api/submitnrp.php",
            data: {nrp: nrp},
            dataType: 'json',
            success: function( response ){
                console.log("1");
            },error: function(e){
                
            }
        });
    })
    
})