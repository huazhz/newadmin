$( document ).ready(function() {
		$(".menu-bars").click(function(){
			$("#slide-menu").addClass("active");
		});
		
		$(".slide-menu-close").click(function(){
			$("#slide-menu").removeClass("active");
		});		
		
		$(".joinus a").click(function(){
			$(".search-input").removeClass("active");
			$(".skip-header-dd").addClass("active");
		});
		
		$(".skip-form-close").click(function(){
			$(".skip-header-dd").removeClass("active");
		});
		
		$("li.search i").click(function(){
			$(".skip-header-dd").removeClass("active");
			$(".search-input").addClass("active");
		});
		
		$(".search-input-close").click(function(){
			$(".search-input").removeClass("active");
		});
		
		var togle = false;
		$(".dropdown-menu").click(function(){
			if(togle==false){
			$(this).addClass("active");
			togle=true;
			}else{
				$(this).removeClass("active");
				togle=false;
			}
			});		
});