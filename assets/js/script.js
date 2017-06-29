/**
 * st slider
 * 
 * 
 * @package WordPress
 * @subpackage st-slider
 * @author Sumit Tiwari
 */

(function($){

	$(document).ready(function(){

		var currentindex = 0;
		var items = $(".st-slider li");
		var length = items.length;

		function cycle(){
			var item = items.eq(currentindex);
			items.removeClass("open");
			item.addClass("open");
			setTimeout(function() {
			items.hide();
			item.css("display","inline-block");
      }, 3000);
		}

			/* auto slide*/
			var auto = setInterval(function(){
				currentindex = currentindex+1;
				if(currentindex > length-1){
					currentindex = 0;
				}
				cycle();
			}, 4000);

		/* next button click slide*/
		$(".next").click(function(){
			currentindex = currentindex+1;
			if(currentindex > length-1){
				currentindex = 0;
			}
			cycle();
		});

	  /* previous button click slide*/
	  $(".previuos").click(function(){
			currentindex = currentindex-1;
			if(currentindex > length-1){
				currentindex = 0;
			}
			cycle();
		});
	 });	 

})(jQuery);