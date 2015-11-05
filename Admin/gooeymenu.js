/* jQuery Gooey Menu
* Created: April 7th, 2011 by DynamicDrive.com. This notice must stay intact for usage 
* Author: Dynamic Drive at http://www.dynamicdrive.com/
* Visit http://www.dynamicdrive.com/ for full source code
*/

jQuery.noConflict()

jQuery.extend(jQuery.easing, {easeOutBack:function(x, t, b, c, d, s){ //see http://gsgd.co.uk/sandbox/jquery/easing/
		if (s == undefined) s = 1.70158;
		return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
	}
})


var gooeymenu={
	effectmarkup: '<li class="active"></li>',

	setup:function(usersetting){
		jQuery(function($){ //on document.ready
			function snapback(dur){
				if ($selectedlink.length>0)
					$effectref.dequeue().animate({left:$selectedlink.position().left, width:$selectedlink.outerWidth()}, dur, setting.fx)
			}
			var setting=jQuery.extend({fx:'easeOutBack', fxtime:500, snapdelay:300}, usersetting)
			var $menu=$('#'+setting.id).find('li:eq(0)').parents('ul:eq(0)') //select main menu UL
			var $menulinks=$menu.find('li a')
			var $effectref=$(gooeymenu.effectmarkup).css({top:$menulinks.eq(0).position().top, height:$menulinks.eq(0).outerHeight(), zIndex:-1}).appendTo($menu) //add trailing effect LI to the menu UL
			$effectref.css({left:-$menu.offset().left-$effectref.outerWidth()-5}) //position effect LI behind the left edge of the window
			if (typeof setting.selectitem!="undefined"){ //if setting.selectitem defined
				var $selectedlink=$menulinks.removeClass('selected').eq(setting.selectitem).addClass('selected')
			}
			else{
				var $selectedlink=$menulinks.filter('.selected:eq(0)') //find item with class="selected" manually defined
			}
			setting.defaultselectedBool=$selectedlink.length
			$menulinks.mouseover(function(){
				clearTimeout(setting.snapbacktimer)
				var $target=$(this)
//alert($target.position().left+" "+$target.get(0).offsetLeft)

				$effectref.dequeue().animate({left:$target.position().left, width:$target.outerWidth()}, setting.fxtime, setting.fx)
				if (setting.defaultselectedBool==0) //if there is no default selected menu item
					$selectedlink=$target //set current mouseover element to selected element
			})
			if ($selectedlink.length>0){
				snapback(0)
				$menu.mouseleave(function(){
					setting.snapbacktimer=setTimeout(function(){
						snapback(setting.fxtime)
					}, setting.snapdelay)
				})
			}
				$(window).bind('resize', function(){
					snapback(setting.fxtime)
				})
		})
	}
}