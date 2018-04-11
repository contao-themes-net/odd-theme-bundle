$(document).ready(function() {

    $("#main .inside > div").each( function() {
        console.log($(this));
        $(this).wrapInner("<div class='container'></div>");
    });

});