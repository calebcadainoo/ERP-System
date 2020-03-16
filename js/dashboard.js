$(function() {
	
	setInterval(function(){
		var now = new Date();
		var hh = now.getHours();
		var mm = now.getMinutes();
		var ss = now.getSeconds();
		var td = "";
		if (mm < 10) {mm = '0'+mm}
		if (ss < 10) {ss = '0'+ss}
		if (hh < 23 && hh < 12) {
			var greeting = "Good Morning!";
		}else if (hh >= 12 && hh <= 16) {
			var greeting = "Good Afternoon!";
		}else if (hh > 16 && hh <= 23) {
			var greeting = "Good Evening!";
		}
		if (hh > 12) {td = "PM"; hh = hh%12;}else{td = "AM"}
		timenow = hh + ':' + mm + ':' + ss + ' '+ td;
		$('.app_greeting').text(greeting);
		$('.app_time').text(timenow);
	}, 10);

	$('.app_back_nav').click(function(){
		window.location.href = "./";
	});

	setTimeout(function() {
		$('.app_error_msg').removeClass('vanishIn');
		$('.app_error_msg').addClass('vanishOut');
	}, 10000); // <-- time in milliseconds

	$('.app_error_msg').click(function(){
		$('.app_error_msg').removeClass('vanishIn');
		$('.app_error_msg').addClass('vanishOut');
	});

	// === tap menu ===
	$('.app_menu_nav').click(function(){
		$('.app_holder').toggleClass('show_menu');
		// $('.app_workarea').toggleClass('show_workarea');
	});
	// === end of tap menu ===

	$('.app_opt_icon').hover(function () {
		$objectID = $(this).closest('.app_opt_icon').attr("id");
		$('#'+$objectID+' img').toggleClass('animated bounceIn');
	});

	// ==== custom scrollbar ====
	var $scrollable  = $(".ui-scrollable"),
    $scrollbar   = $(".ui-scrollbar"),
    height       = $scrollable.outerHeight(true),    // visible height
    scrollHeight = $scrollable.prop("scrollHeight"), // total height
    barHeight    = height * height / scrollHeight;   // Scrollbar height!

	// Scrollbar drag:
	$scrollbar.height( barHeight ).draggable({
		axis : "y",
		containment : "parent", 
		drag: function(e, ui) {
	    	$scrollable.scrollTop( scrollHeight / height * ui.position.top  );
	  	}
	}); 

	// Element scroll:
	$scrollable.on("scroll", function() {
		$scrollbar.css({top: $scrollable.scrollTop() / height * barHeight });
	});
	// ==== end of custom scrollbar ====

	
});