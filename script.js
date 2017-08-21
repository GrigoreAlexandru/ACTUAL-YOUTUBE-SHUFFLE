var i = 0;
var p = i - 1;
var n = i + 1;

function nx() {
    i++;
    n = i + 1;
    p = i - 1;
}


function pr() {
    i--;
    p = i - 1;
    n = i + 1;

}

if (!array.length == 0) {
    $("#form").hide();
}
$('#add').on('click', function() {
    $("#form").show();
})

var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
var player;

function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {

        videoId: array[i][0],
        events: {
            'onReady': onReady
        }
    });
}

function onReady(e) {
    e.target.playVideo();
    player.addEventListener('onStateChange', function(e) {
        
        if (e.data == 0) {

            player.loadVideoById(array[n][0]);
            (i > 0) ? $('.prev').html(array[n - 1][1]): $('.prev').html(array[0][1]);
            nx();
            check();
            $('.next').html(array[n][1]);

        }
    });
}
$('.next').html(array[n][1]);
check();

function check() {
    if (i <= 0) {
        $('.prev').hide();
    } else {
        $('.prev').show();
    }
    if (i == array.length - 1) {
        $('.next').hide();
    } else {
        $('.next').show();
    }
}

$('.next').on('click', function() {
    player.loadVideoById(array[n][0]);
    (i > 0) ? $('.prev').html(array[n - 1][1]): $('.prev').html(array[0][1]);
    nx();
    check();
    $('.next').html(array[n][1]);
})

$('.prev').on('click', function() {
    $('.next').html(array[i][1]);
    player.loadVideoById(array[p][0]);
    pr();
    check();
    $('.prev').html(array[p][1]);
})