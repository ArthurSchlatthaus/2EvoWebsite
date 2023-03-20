function contentHeight() {
    var cH = $('.content-area').height();
    var sH = $('.sidebar').height();

    if (sH > cH) {
        $('.content-area').css({"min-height": sH});
    }
};

// gleiche Höhe für Elemente
function equalHeights() {
    $('.row').each(function () {
        var highestBox = 0;
        $('.equal-height', this).each(function () {
            if ($(this).outerHeight() > highestBox) {
                highestBox = $(this).outerHeight();
                console.log(highestBox);
            }
        });
        $('.equal-height', this).outerHeight(highestBox);
    });
};

$(window).scroll(function () {

    if($(document).scrollTop() > 100) {
        $(".navbar .logo img").addClass("shrink");
    } else {
        $(".navbar .logo img").removeClass("shrink");
    }

});
$(document).ready(function () {
      equalHeights();
      contentHeight();
});

