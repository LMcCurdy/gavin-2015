$(document).ready(function() {
	$('.pause').click(function(){
		var vid = $(this).siblings('video').get(0);
		if (vid.paused)
			vid.play();
		else
			vid.pause();
	});
	
	$(function() {
		function bouncy(){
			$('div.circle i')
				.animate({ top: '35%' }, 300)
				.animate({ top: '25%' }, 700)
				.show('fast',bouncy);
		}
		bouncy();
	});
	
	$('div#driving-action a.button').each(function(){
		var $fades = $(this);
		$fades.waypoint(function(direction) {
		  if (direction === 'down') {
			$fades.stop().animate({opacity:100}, 5000);
			$("#ll-button").lazylinepainter({ 
				'svgData' : svgData, 
				'strokeWidth':2, 
				'strokeColor':'#888182'
			}).lazylinepainter('paint');
		  }
		}, { offset: '80%' });
	});


		$('div#more-work a.button').each(function(){
		var $fades = $(this);
		$fades.waypoint(function(direction) {
		  if (direction === 'down') {
			$fades.stop().animate({opacity:100}, 5000);
			$("#ll-button-work").lazylinepainter({ 
				'svgData' : svgData, 
				'strokeWidth':2, 
				'strokeColor':'#888182'
			}).lazylinepainter('paint');
		  }
		}, { offset: '80%' });
	});



$('div#g-work a.button').each(function(){
		var $fades = $(this);
		$fades.waypoint(function(direction) {
		  if (direction === 'down') {
			$fades.stop().animate({opacity:100}, 5000);
			$("#abox").lazylinepainter({ 
				'svgData' : svgData, 
				'strokeWidth':2, 
				'strokeColor':'#888182'
			}).lazylinepainter('paint');
		  }
		}, { offset: '80%' });
	});




	
	$('.fade-me').each(function(){
		var $fades = $(this);
		$fades.waypoint(function(direction) {
		  if (direction === 'down') {
			$fades.stop().animate({opacity:100}, 5000);
		  }
		}, { offset: '80%' });
	
// 		$fades.waypoint(function(direction) {
// 		  if (direction === 'up') {
// 			$fades.stop().animate({opacity:0}, 5000);
// 		  }
// 		}, { offset: '0' });	
	});


		$('div.home-ctas').each(function(){
		var $fades = $(this);
		$fades.waypoint(function(direction) {
		  if (direction === 'down') {
			$fades.stop().animate({opacity:100}, 5000);
			$(".mark").lazylinepainter({ 
				'svgData' : svgData, 
				'strokeWidth':5,
				'strokeColor':'#f5821f'
			}).lazylinepainter('paint');
		  }
		}, { offset: '80%' });
	});


		$('div.draw').each(function(){
		var $fades = $(this);
		$fades.waypoint(function(direction) {
		  if (direction === 'down') {
			$fades.stop().animate({opacity:100}, 5000);
			$("#mega").lazylinepainter({ 
				'svgData' : svgData, 
				'strokeWidth':1.5,
				'strokeColor':'#f5821f'
			}).lazylinepainter('paint');
		  }
		}, { offset: '80%' });
	});

});