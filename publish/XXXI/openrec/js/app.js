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

    $("#submit-nrp").click(function () {
        var nrp = $("#nrp").val();
        var pass = $("#password").val();

        if (parseInt(nrp.substring(3, 5)) > 20) {
            alert("Acara ini diselenggarakan untuk angkatan 2020 keatas");
        } else {
            $.ajax({
                method: 'POST',
                url: "api/submitnrp.php",
                data: { nrp: nrp, pass: pass },
                dataType: 'json',
                success: function (response) {

                    if (response['status'] == 1) {
                        alert(response['error']);
                        window.location = response['redirect'];
                    } else {
                        alert(response['error']);
                    }
                }, error: function (e) {

                }
            });
        }

    });

    //Login Form
    $("#login-button").click(function () {
        var nrp = $("#nrp").val();
        nrp = nrp.toLowerCase();
        var password = $("#password").val();
        var captcha = grecaptcha.getResponse();



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
            url: 'api/check_status.php',
            success: function (status) {
                $('.navbar').html('');
                loadnavbar();


                if (status['inform'] == 0) {
                    var newData = "<h1 class='h1-message'>Thank You for <br> Your Participation!</h1><p class='p-message ml-2'>Please contact our committe for your schedule <br>Download Form Surat Izin Orang Tua : <a href=\"https://petra.id/FormatSuratIzinLKMMTMXXXI\">Link Surat</a><br><br>*)Mohon form suat dapat dikumpulkan <a href=\"https://petra.id/PengumpulanSuratIzinLKMMTMXXXI\">disini</a> </p> <br><br> <p class='p-message'> <b>Best Regards,</b> <br>" + status['alias'] + "</p> ";
                    $("#main-card .card2").html('');
                    $("#main-card .card2").append(newData);
                }
                else if (status['status'] == 1) {
                    var newData = "<h1 class='h1-message'>Thank You for <br> Your Participation!</h1><p class='p-message ml-2'>Your Schedule will be held at : <br><br>Date: " + status['hari'] + " <br>Time: " + status['jam'] + "<br>Place: <a href=\"" + status['place'] + "\">" + status['place'] + "</a><br>Download Form Surat Izin Orang Tua : <a href=\"https://petra.id/FormatSuratIzinLKMMTMXXXI\">Link Surat</a><br><br>*)Mohon form suat dapat dikumpulkan <a href=\"https://petra.id/PengumpulanSuratIzinLKMMTMXXXI\">disini</a> </p> <br><br> <p class='p-message'> <b>Best Regards,</b> <br>" + status['alias'] + "</p> ";
                    $("#main-card .card2").html('');
                    $("#main-card .card2").append(newData);

                }
                var Peraturan = `
                <div id="second-card" class="card1">
                        <div class="card2 text-start">
                        <h1 class="h1-message">
                            SOP PENGISIAN JADWAL WAWANCARA PESERTA LKMM-TM XXXI 
                        </h1>
                        <ol>
                            <li>Pengisian jadwal wawancara hanya dapat diisi satu kali saja dan hanya pada jadwal wawancara yang tersedia </li>
                            <li>Batas pengisian adalah H-1 dari tanggal wawancara yang dipilih (Maksimal jam 22.00 WIB)</li>
                            <li>Semua jam yang tertera dalam daftar merupakan jam menurut Waktu Indonesia Barat (WIB)</li>
                            <li>Diharap untuk MENCATAT id line contact person dan link google meet karena hanya akan diinfokan sekali saja</li>
                            <li>Segala bentuk pertanyaan mengenai Wawancara LKMM-TM XXXI, dapat langsung menghubungi Contact Person yang tersedia</li>
                            <li>WAJIB join ke link google meet yang telah disediakan 10 menit sebelum wawancara dimulai</li>
                            <li>Peserta diharapkan berpakaian sopan dan rapi untuk wawancara (pakaian standar universitas)</li>
                            <li>Batas keterlambatan adalah 10 menit dari jadwal yang telah ditentukan</li>
                            <li>Peserta diharapkan dapat memperhatikan segala ketentuan dan peraturan Wawancara LKMM-TM XXXI  yang berlaku</li>
                            <li>Jika terdapat kendala saat mengisi jadwal wawancara, dapat langsung menghubungi Official Account (OA) Line LKMM-TM : @210qiwnm</li>
                        </ol> 
                        </div>
                    </div>
                `;
                $("#container-peraturan").append(Peraturan)


            }, error: function (status) {
            }
        });
    }


    function session_check() {
        $.ajax({
            method: 'POST',
            url: 'api/response.php',
            data: { x: 'y' },
            dataType: 'json',
            success: function (response) {

                if (response == 'false') {
                    window.location = 'login.html';

                } else if (response == 'true') {

                    $('#no').hide();
                    $('.dash').show();
                } else {
                    window.location = 'login.html';

                }
            }, error: function (e) {
                window.location = 'login.html';

            }
        });
    }

    //Function Load Data Wawancara
    function load_interview() {
        $.ajax({
            method: 'GET',
            url: 'api/get_Data_wawancara.php',
            success: function (data) {

                data.forEach(function (i) {

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

        if (jadwal != ' ') {
            $.ajax({
                url: 'api/pilihwawancara.php',
                method: 'POST',
                beforeSend: loadingButton(),
                data: {
                    jadwal: jadwal
                },
                success: function (data) {
                    $("#spinner").remove();

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

    var now = (window.location.pathname).split("/");
    if (now.at(-1) == 'interview.html') {
        session_check();
        data_check();
        load_interview();


    }

    // loadnavbar();
    // session_check();
    // data_check();
    // load_interview();
});

