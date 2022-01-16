function session_check(){

    $.ajax({
        url: 'api/session_check.php',
        method: 'GET',
        success: function (data) {
            if(data != "true"){
                window.location = "login.html";
            }
        },
        error: function ($xhr, textStatus, errorThrown) {
            alert($xhr.responseJSON['error']);
        }
    });


}

session_check();