$(document).ready(function() {

    /* ===================== *
     *   Toplink  			 *
     * ====================== */
    $(window).scroll(function () {
        scrollPos = $(document).scrollTop();

        $("footer .toplink").addClass("active");
        if(scrollPos <= 500) {
            $("footer .toplink").removeClass("active");
        }
    });

    $(document).on('click', 'footer .toplink', function(event){
        event.preventDefault();

        $("html, body").animate({ scrollTop: 0 }, 1000);
    });

    /* =================== *
     * Smooth Scroll	   *
     * =================== */
    $('a[href*=\\#]').on('click', function(event){
        var href = $(this).attr('href');
        href = href.substr(0,href.indexOf('#'));
        href = href.replace('./','');

        var path = window.location.pathname;
        path = path.replace('/','');

        if ( $(this).attr('target') != '_blank' && path == href) {
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top}, 1500);
        }
    });

    /* ===================== *
     *   Navigation			 *
     * ====================== */
    var scrollPos = $(window).scrollTop();
    if(scrollPos > 0) {
        $('.nav-container').addClass('stuck');
    } else {
        $('.nav-container').removeClass('stuck');
    }

    $(window).scroll(function () {
        var scrollPos = $(window).scrollTop();
        if(scrollPos > 0) {
            $('.nav-container').addClass('stuck');
        } else {
            $('.nav-container').removeClass('stuck');
        }
    });

});