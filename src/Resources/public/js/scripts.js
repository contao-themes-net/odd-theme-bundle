jQuery(document).ready(function($) {

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

    if( $(".nav-container").hasClass("sloping") && $("#header .headerImage").length == 0 ) {
        $("#container").addClass("sloping");
    }

    $('.dropdown-toggle').on("click", function(e){
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });

    if( $("#header .nav-container").length > 0 && typeof Headroom !== 'undefined' ) {
        var myElement = document.querySelector("#header .nav-container");
        var headroom  = new Headroom(myElement, {
            "offset": 600
        });
        headroom.init();
    }

    /* =================== *
     * Touch Navigation	   *
     * =================== */
    $(".mod_bs_navbar").on("touchstart","a.submenu:not(.is-active), strong.submenu:not(.is-active)", function(e) {
        $(".is-active").removeClass("is-active");
        if($(this).parent().parent().hasClass("level_1")) $(".dropdown-menu:visible").toggle();
        if($(this).parent().parent().hasClass("level_2")) $(".level_2 .dropdown-menu:visible").toggle();
        $(this).addClass("is-active");
        $(this).find("~ .dropdown-menu").toggle();
        e.preventDefault();
    });

    /* ===================== *
     *   Content Slider 	 *
     * ===================== */
    $(".slider-control .slider-prev").html('<i class="fas fa-chevron-left"></i>');
    $(".slider-control .slider-next").html('<i class="fas fa-chevron-right"></i>');

    /* =================== *
     * File Upload   	   *
     * =================== */
    $('input[type="file"]').on("change", function() {
        $(this).next().text( $(this).val().replace("C:\\fakepath\\","") );
    });

 });