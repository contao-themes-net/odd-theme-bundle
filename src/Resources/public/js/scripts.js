$(document).ready(function() {

    /* ===================== *
     *   Toplink  			 *
     * ===================== */
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

    /* =================== *
     * Scroll Fade   	   *
     * =================== */
    $('input').focus(function () {
        var element = $(this);
        if (element.offset().top - $(window).scrollTop() < 115)
        {
            $('html, body').animate({
                scrollTop: element.offset().top - 130
            }, 500);
        }
    });

    /* ===================== *
     *   Navigation			 *
     * ===================== */
    var scrollPos = $(window).scrollTop();
    if(scrollPos > 0) {
        $('.nav-container').addClass('stuck');
    } else {
        $('.nav-container').removeClass('stuck');
    }

    var mobile = /Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    if(mobile) {
        var myElement = document.querySelector("#header .nav-container");
        var headroom  = new Headroom(myElement, {
            "offset": 600
        });
        headroom.init();
    }

    $(window).scroll(function () {
        var scrollPos = $(window).scrollTop();
        if(scrollPos > 0) {
            $('.nav-container').addClass('stuck');
        } else {
            $('.nav-container').removeClass('stuck');
        }
    });

    $('#header .navbar ul li a').on('click', function() {
        $('.navbar .collapse.show').removeClass('show');
    });

    if( $(".nav-container").hasClass("sloping") ) {
        $("#container").addClass("sloping");
    }

    $('.dropdown-toggle').on("click", function(e){
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    /* ===================== *
     *   Content Slider 	 *
     * ===================== */
    $(".slider-control .slider-prev").html('<i class="fas fa-chevron-left"></i>');
    $(".slider-control .slider-next").html('<i class="fas fa-chevron-right"></i>');

 });