$.fn.smartFloat = function() {
	var position = function(element) {
		var top = element.position().top, pos = element.css("position");
		$(window).scroll(function() {
			var scrolls = $(this).scrollTop();
			if (scrolls > 430) {
				if (window.XMLHttpRequest) {
					element.css({
						position: "fixed",
						top: 0,
                        right: right_width
					});	
				} else {
					element.css({
						top: scrolls
					});	
				}
			}else {
				element.css({
					position: pos,
					top: top,
                    right:0
				});	
			}
		});
    };
	return $(this).each(function() {
		position($(this));						 
	});
};

$(function(){
    var context_width = $(".context").width();
    var window_width = $(window).width();
    
    right_width = (window_width - context_width) / 2;

    //console.log($("body").height());
    /*
     *console.log($(".context").width() + "\r\n");
     *console.log($(window).width());
     *console.log(right_width);
     */
});
