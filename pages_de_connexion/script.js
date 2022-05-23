$(function () {
    $('#section-feature .sf-wrap')
        .hover(function() {
            $(this).addClass('hover');
        }, function() {
            $(this).removeClass('hover');
        })
        .hover(function(event) {
            //if (event.target.nodeName != 'A') {
                $(this).toggleClass('active');
            //}
        });
});



