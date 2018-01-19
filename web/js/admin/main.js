$(document).ready(function() {


    // Переключение меню
   $(".nav-sidebar").on("click", "li:not(.nav-parent)", function(event) {

        var parent = $(this).parent(); // .sidebar
        parent.children('li.active').children('.children').slideUp(200);
        $('.nav-sidebar .arrow').removeClass('active');
        parent.children('li.active').removeClass('active nav-active');

        $(".nav-active.active").removeClass("active nav-active");
        $(this).addClass("nav-active active");
    })

    if (window.adBlockEnabled !== false) {
        $("#adBlock").removeClass("hidden");
    }
})