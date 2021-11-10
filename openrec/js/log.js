$(document).ready(function(){

    function session_check(){
        $.ajax({
            method: 'POST',
            url: '/item2021/openrec/api/response.php',
            data: {x:'y'},
            dataType: 'json',
            success: function( response ){
                console.log(response);
                if(response == 'false'){
                    window.location = 'login.html';
                    console.log("403 Forbidden");
                }else if(response == 'true'){
                    console.log("200 Success");
                    $('#no').hide();
                    $('.dash').show();
                }else{
                    window.location = 'login.html';
                    console.log("Gagal masuk response = No");
                } 
            },error: function(e){
                $('body').html('403 Forbidden');
                console.log("not success");
            }
        });
    }

    // Section Check
    session_check();
});