$(document).ready(function() {

    $("#main > .inside > div:not(.fullwidth)").each( function() {
        $(this).wrapInner("<div class='container'></div>");
    });

});