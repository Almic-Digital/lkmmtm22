$(window).on("load", function () {
    $('.loading-wrapper').fadeOut("slow");
    var button = document.getElementById("musicButton");
    var icon = document.getElementById("iconMusic");
    var audio = document.getElementById("myMusic");
    button.addEventListener("click", function () {
        if (audio.paused) {
            icon.classList.remove('bi-play-circle-fill');
            icon.classList.add('bi-pause-circle-fill');
            audio.play();
        } else {
            icon.classList.remove('bi-pause-circle-fill');
            icon.classList.add('bi-play-circle-fill');
            audio.pause();
        }
    });
});

$(document).ready(function () {
    AOS.init();
    function loadnavbar() {
        var navbar = ` <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">
            <img src="asset/LOGO/ITEM/item1.png" alt="" loading="lazy">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="home.html">Home</a>
                </li>
                
                <li class="nav-item interview-page">
                    <a class="nav-link " href="interview.html">
                        Interview schedule</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="api/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>`;
        $('#header').prepend(navbar);
    }

    //Login Form
    $("#login-button").click(function () {
        var nrp = $("#nrp").val();
        nrp = nrp.toLowerCase();
        var password = $("#password").val();
        var captcha = grecaptcha.getResponse();
        console.log(nrp);
        console.log(password);

        function loadingButton() {
            $("#login-button").append('<span id="spinner" class="spinner-grow spinner-grow-sm ml-3" role="status" aria-hidden="true"></span>');
        };

        $.ajax({
            url: 'api/login.php',
            method: 'POST',
            beforeSend: loadingButton(),
            data: {
                nrp: nrp,
                password: password,
                recaptcha: captcha
            },
            success: function (data) {
                $("#spinner").remove();
                var response = JSON.parse(data);
                if (response['status'] == 0) {
                    alert(response['error']);
                } else {
                    alert(response['error']);
                    window.location = response['redirect'];
                    console.log(response['error'])
                }

            },
            error: function ($xhr, textStatus, errorThrown) {
                $("#spinner").remove();
                alert($xhr.responseJSON['error']);
            }
        });
    });




    function data_check() {
        $.ajax({
            method: 'GET',
            url: '/lkmmtm22/openrec/api/check_status.php',
            success: function (status) {
                $('.navbar').html('');
                loadnavbar();
                console.log(status['status']);

                if (status['status'] == 1) {
                    var newData = "<h1 class='h1'>Terima kasih telah berpartisipasi!</h1><p class='p ml-2'>Jadwal Wawancaramu akan diadakan pada,<br>Hari/Tanggal: " + status['hari'] + " <br>Waktu: " + status['jam'] + "<br>Oleh: " + status['alias'] + " </p> <br><p class='p'>'Semangat! dan Persiapkan Dirimu Saat Interview!'</p>";
                    $(".status").html('');
                    $(".status").append(newData);

                }


            }, error: function (status) {
            }
        });
    }


    function session_check() {
        $.ajax({
            method: 'POST',
            url: '/lkmmtm22/openrec/api/response.php',
            data: { x: 'y' },
            dataType: 'json',
            success: function (response) {
                console.log(response);
                if (response == 'false') {
                    window.location = 'login.html';
                    console.log("403 Forbidden");
                } else if (response == 'true') {
                    console.log("200 Success");
                    $('#no').hide();
                    $('.dash').show();
                } else {
                    window.location = 'login.html';
                    console.log("Gagal masuk response = No");
                }
            }, error: function (e) {
                window.location = 'login.html';
                console.log("not success");
            }
        });
    }

    //Function Load Data Wawancara
    function load_interview() {
        $.ajax({
            method: 'GET',
            url: '/lkmmtm22/openrec/api/get_Data_wawancara.php',
            success: function (data) {

                data.forEach(function (i) {
                    console.log(i['id']);
                    var option = "<option value='" + i['id'] + "'>" + i['alias'] + " / " + i['hari'] + " / " + i['jadwal'] + "</option>";

                    $("#jadwal").append(option);
                });
            }, error: function (data) {

            }
        });
    }


    //Function Submit on interview.html
    $("#submit-interview").click(function () {
        //Disable Button
        $("#submit-interview").attr('disabled', true);
        function loadingButton() {
            $("#submit-interview").append('<span id="spinner" class="spinner-grow spinner-grow-sm ml-3" role="status" aria-hidden="true"></span>');
        };
        var jadwal = $("#jadwal").val();
        console.log(jadwal);
        if (jadwal != ' ') {
            $.ajax({
                url: '/lkmmtm22/openrec/api/pilihwawancara.php',
                method: 'POST',
                beforeSend: loadingButton(),
                data: {
                    jadwal: jadwal
                },
                success: function (data) {
                    $("#spinner").remove();
                    console.log(data['status']);
                    if (data['status'] == 0) {
                        alert(data['error']);
                    } else {
                        data_check();
                    }
                },
                error: function ($xhr, textStatus, errorThrown) {
                    $("#spinner").remove();

                }
            });
        }
    });
    // loadnavbar();
    // session_check();
    // data_check();
    // load_interview();
});

