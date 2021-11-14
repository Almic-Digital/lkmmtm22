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
                

                if (status['status'] == 1) {
                    var newData = "<h1 class='h1-message'>Thank You for <br> Your Participation!</h1><p class='p-message ml-2'>Your Schedule will be held at : <br><br>Date: " + status['hari'] + " <br>Time: " + status['jam'] + "<br>Place: <a href=\"" + status['place'] + "\">"+status['place']+"</a> </p> <br><br> <p class='p-message'> <b>Best Regards,</b> <br>"+ status['alias']+"</p>" ;
                    $(".card2").html('');
                    $(".card2").append(newData);

                }


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

