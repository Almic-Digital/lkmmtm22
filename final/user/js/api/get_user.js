function get_user(){

    $.ajax({
        url: 'api/get_user.php',
        method: 'GET',
        success: function (data) {
            $("#nama").html(data['nama']);
            $("#jurusan").html(data['jurusan']);
            $("#lk_asal").html(data['lk_asal']);
            $("#lk_tujuan").html(data['lk_tujuan']);
            if(data['status'] == 1){
                $("#status").html("Offline");
            }else{
                $("#status").html("Online");
            }
        },
        error: function ($xhr, textStatus, errorThrown) {
            alert($xhr.responseJSON['error']);
        }
    });


}

get_user();