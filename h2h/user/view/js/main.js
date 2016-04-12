$(function () {
	$('.box').hover(
		function () {
			var overlay = $(this).find('.box-overlay');
			overlay.removeClass(overlay.data('return')).addClass(overlay.data('hover'));
		},
		function () {
			var overlay = $(this).find('.box-overlay');		
			overlay.removeClass(overlay.data('hover')).addClass(overlay.data('return'));

		}
	);
});

/* 调用接口获得图书id*/
window.onload=function(){
	
}
