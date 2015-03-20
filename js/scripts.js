//custom js

//hide the panels
$('.portfolio-post .article__content').children('p:first-child').addClass('isActive');
$('.portfolio-post .article__content').children('p').addClass('panel');


( function() {
	$('.js-switch-panels').click(function(){
		if ($(this).siblings('.article__content').children('.isActive').next().length != 0) {
			$(this).siblings('.article__content')
			  .children('.isActive')
			  .removeClass('isActive')
			  .next()
			  .addClass('isActive');
		} else {
			$(this).siblings('.article__content').children('p').removeClass('isActive');
			$(this).siblings('.article__content').children('p:first-child').addClass('isActive');			
		}
	})
})();