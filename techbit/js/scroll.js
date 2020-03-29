$(".downButton").click(function() {
	var $window = $(window);
    $('section').each(function() {
            var pos = $(this).offset().top;   
            if ($window.scrollTop() < pos) {
                $('html, body').animate({
                    scrollTop: pos
                }, 'slow');
                return false;
            }
        });
});