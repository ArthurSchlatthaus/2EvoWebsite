window.onscroll = function() {
	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) { $('#goToTop').show(); }
	else { $('#goToTop').hide(); }
}

$(document).ready(function(){
	$("#goToTop").on('click', function() {
		console.log('test');
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	});
})
