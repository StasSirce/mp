
$(document).ready( function() {



    $('.burger')
        .hover(function () {
            $(this).find("svg rect").first().animate({y: "-2.1"}, 200);
            $(this).find("svg rect").last().animate({y: "24.1"}, 200);
        }, function() {
            $(this).find("svg rect").first().animate({y: "1.1"}, 200);
            $(this).find("svg rect").last().animate({y: "21.1"}, 200);
        })
        .click(function() {
            $("aside").addClass("visible");
            $('.close_x').show();
        });

    $('.close_x').click(function () {
        $('aside').removeClass('visible');
        $('.close_x').hide();
    })

    $('.menu a').click(function () {
        $('aside').removeClass('visible');
        $('.close_x').hide();
    })

})


$(window).scroll(function() {
    var scroll_top = $(window).scrollTop();
    var burger = $('.burger svg');
    var tastes_offset = $('#tastes').offset();

    console.log(scroll, tastes_offset.top);
    if(scroll_top>tastes_offset.top){
        var pack = $('.pack .title');
        for (var i = 0; i < 4; i++) {
            var cft = $(pack)[i];
            $(cft).stop( true, true ).delay(150*(i+1)).animate({opacity: 1},800);
        }
    }



    if(scroll_top>=0){burger.css('fill','#acaeb1');}

    if(scroll_top>890){burger.css('fill','#ed3a52');}

    if(scroll_top>1830){
        burger.css('fill','#221f1f');

    }

    if(scroll_top>1830){burger.css('fill','black');}

    if(scroll_top>2760){burger.css('fill','#e9e9ea');}

    if(scroll_top>2872){burger.css('fill','black');}

    if(scroll_top>3800){burger.css('fill','#e9e9ea');}

    if(scroll_top>3900){burger.css('fill','black');}

    if(scroll_top>5870){burger.css('fill','#e9e9ea');}

    if(scroll_top>5998){burger.css('fill','black');}

    if(scroll_top>6940){burger.css('fill','white');}

    if(scroll_top>7815){burger.css('fill','#4c4c4c');}

    if(scroll_top>8790){burger.css('fill','#e9e9ea');}


})