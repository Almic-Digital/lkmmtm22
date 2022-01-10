function absen(){
    var nrp = $("#nrp").val();
    nrp = nrp.toUpperCase();
    var password = $("#password").val();
    
    $.ajax({
        url: 'api/absen.php',
        method: 'POST',
        data: {
            nrp: nrp,
            password: password,
        },
        success: function (data) {
            console.log(data);
            if (data['status'] == 0) {
                alert(data['error']);
            } else {
                alert(data['error']);
                window.location = data['redirect'];
            }

        },
        error: function ($xhr, textStatus, errorThrown) {
            alert($xhr.responseJSON['error']);
        }
    });


}

