//
// //api youtube
//
// var tag = document.createElement('script');
//
// tag.src = "https://www.youtube.com/iframe_api";
// var firstScriptTag = document.getElementsByTagName('script')[0];
// firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
//
// var player;
// function onYouTubeIframeAPIReady() {
//     player = new YT.Player('player', {
//         height: '360',
//         width: '540',
//         videoId: 'haBSLFooW_Q',
//         events: {
//             'onReady': onPlayerReady,
//             'onStateChange': onPlayerStateChange
//         }
//     });
// }
//
// function onPlayerReady(event) {
//
// }
//
// var done = false;
// function onPlayerStateChange(event) {
//     if (event.data == YT.PlayerState.PLAYING && !done) {
//
//
//     }
// }
// function stopVideo() {
//     player.stopVideo();
// }
//

$(document).ready( function() {




    // //счетчик лайков
    //
    // $('.like').click(function () {
    //
    //     var number = $(this).find('.number');
    //     var val = parseInt(number.html());
    //
    //     if(!$(this).find('i').hasClass('addColor')){
    //
    //         $(this).find('i').addClass('addColor');
    //         val = val + 1;
    //         number.html(val);
    //     }
    //
    //
    // })


    $('.like').click(function () {


        var number = $(this).find('.number');
        var val = parseInt(number.html());
        var id = $(this).data("id");
        var heart = $(this);

        if(!$(this).find('i').hasClass('addColor')){

            val = val + 1;
            number.html(val);

            $.ajax({
                url: "/like",
                data: {'id': id},
                success: function () {
                    $(heart).find('i').addClass('addColor');
                }
            })
        }



    })



    //scroll вверх

    $('#scroll_top').click(function() {
        ScrollTop(0);
    })

    function ScrollTop(top) {
        $('body,html').animate({scrollTop: top}, 500);
    }

    //вниз на один слайд

    $('#scroll').click(function () {
        var currentSlide = $(this).closest('#header');
        var nextSlide = currentSlide.nextAll('#about_us');
        var offset = $(nextSlide).offset().top;
        ScrollTop(offset);
    })

    //карусель

    $("#about_us .owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplaySpeed: 1000
    })


    //мигание scroll

    $(function () {
        var flag = false;
        $("#scroll").css("backgroundImage", "url(/images/site/index/scroll.png)");
        setTimeout(function () {
            $("#scroll").css("backgroundImage", "url(/images/site/index/scroll.png)");
            setInterval(function () {
                $("#scroll").css("backgroundImage", flag? "url(/images/site/index/scroll.png)":"url(/images/site/index/scroll2.png)");
                flag = !flag;
            }, 500)
        }, 3000);
    });

    //поочередное появление вкусов






    //playlist

   $(document).on("click", ".videoPl", function(e) {
       var id = $(this).data("id");
       $.pjax({url: "/index?video="+id, fragment: '#reviews', container: '#reviews', timeout: 50000, scrollTo: false});
       
       e.preventDefault();
       return false;
   })
   
  




    //цвет кнопки во вкусах

    $('.btn-order a')
        .hover(function () {
        var colorBtn = $(this).data('color');
        $(this).css('color', '#'+colorBtn);

    }, function() {
            $(this).css('color', 'white');
    })



});