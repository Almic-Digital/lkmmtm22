function change_status(){
    
    $.ajax({
        url: 'api/change_status.php',
        method: 'POST',
        success: function (data) {
            alert("Success");
            get_user();
        },
        error: function ($xhr, textStatus, errorThrown) {
            alert($xhr.responseJSON['error']);
        }
    });


}

