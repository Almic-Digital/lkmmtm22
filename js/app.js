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
});
