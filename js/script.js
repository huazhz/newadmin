var screen_width = screen.width;
		
	
	var lastScrollTop = 0;
	$(window).scroll(function(event){
	
	   var st = $(this).scrollTop();
	   if (st > lastScrollTop){
	       $('body').removeClass('body-with-sticky-header');
	       $('#the-top-part').removeClass('sticky-header');
	   } else {
	       $('body').addClass('body-with-sticky-header');
	       $('#the-top-part').addClass('sticky-header').fadeIn('slow');
	   }
	   lastScrollTop = st;
	
	});


$( document ).ready(function() {

	$('#main-menu-btn').on('click', function(){
		var menu = $('.columns', $('.main-menu'));
		if (menu.is(":visible")) {
			menu.slideUp();
		}
		else {
			menu.slideDown();
		}
	});
	
	$('#main-menu1-btn').on('click', function(){
		var menu = $('.columns', $('.main-menu1'));
		if (menu.is(":visible")) {
			menu.slideUp();
		}
		else {
			menu.slideDown();
		}
	});
	
	
	
	$('#sticky-menu-btn').on('click', function(){
		var menu = $('.columns', $('.sticky-menu'));
		if (menu.is(":visible")) {
			menu.slideUp();
		}
		else {
			menu.slideDown();
		}
	});
	
	
	

	
	
	
$('#search-icon').click(function(event) {
		var screen_width = screen.width;
		if(screen_width <= 800){
			
			if($('.searchBox').is(':visible')){
				$('.searchBox').hide();
			}else{
				$('.searchBox').show();
			}
		}else{
			$('.searchBox').slideToggle();
		}
	});	
	
	$('.communitycaption').each(function(){
			var h = $('h3', $(this)).height();
			if (h > 55) $(this).css('max-height', '100px');
	});
});