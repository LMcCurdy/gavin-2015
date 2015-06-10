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
		}, { offset: '100%' });
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
		}, { offset: '100%' });
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
		}, { offset: '100%' });
	});

//HOME PAGE ICONS -------------------------------------------------->

$('#light-bulb-draw').each(function(){
		var $fades = $(this);
		$fades.waypoint(function(direction) {
		  if (direction === 'down') {
			$fades.stop().animate({opacity:100}, 5000);
			$("#light-bulb").lazylinepainter({ 
				'svgData' : svgData, 
				'strokeWidth':2, 
				'strokeColor':'#f6821f'
			}).lazylinepainter('paint');
		  }
		}, { offset: '100%' });
	});

$('#book-draw').each(function(){
		var $fades = $(this);
		$fades.waypoint(function(direction) {
		  if (direction === 'down') {
			$fades.stop().animate({opacity:100}, 5000);
			$("#book").lazylinepainter({ 
				'svgData' : svgData, 
				'strokeWidth':2, 
				'strokeColor':'#f6821f'
			}).lazylinepainter('paint');
		  }
		}, { offset: '100%' });
	});

$('#box-draw').each(function(){
		var $fades = $(this);
		$fades.waypoint(function(direction) {
		  if (direction === 'down') {
			$fades.stop().animate({opacity:100}, 5000);
			$("#box").lazylinepainter({ 
				'svgData' : svgData, 
				'strokeWidth':2, 
				'strokeColor':'#f6821f'
			}).lazylinepainter('paint');
		  }
		}, { offset: '100%' });
	});

$('#computer-draw').each(function(){
		var $fades = $(this);
		$fades.waypoint(function(direction) {
		  if (direction === 'down') {
			$fades.stop().animate({opacity:100}, 5000);
			$("#computer").lazylinepainter({ 
				'svgData' : svgData, 
				'strokeWidth':2, 
				'strokeColor':'#f6821f'
			}).lazylinepainter('paint');
		  }
		}, { offset: '100%' });
	});

$('#doctor-draw').each(function(){
		var $fades = $(this);
		$fades.waypoint(function(direction) {
		  if (direction === 'down') {
			$fades.stop().animate({opacity:100}, 5000);
			$("#doctor").lazylinepainter({ 
				'svgData' : svgData, 
				'strokeWidth':2, 
				'strokeColor':'#f6821f'
			}).lazylinepainter('paint');
		  }
		}, { offset: '100%' });
	});

$('#hammer-draw').each(function(){
		var $fades = $(this);
		$fades.waypoint(function(direction) {
		  if (direction === 'down') {
			$fades.stop().animate({opacity:100}, 5000);
			$("#hammer").lazylinepainter({ 
				'svgData' : svgData, 
				'strokeWidth':2, 
				'strokeColor':'#f6821f'
			}).lazylinepainter('paint');
		  }
		}, { offset: '100%' });
	});

$('#megaphone-draw').each(function(){
		var $fades = $(this);
		$fades.waypoint(function(direction) {
		  if (direction === 'down') {
			$fades.stop().animate({opacity:100}, 5000);
			$("#megaphone").lazylinepainter({ 
				'svgData' : svgData, 
				'strokeWidth':2, 
				'strokeColor':'#f6821f'
			}).lazylinepainter('paint');
		  }
		}, { offset: '100%' });
	});

$('#paper-draw').each(function(){
		var $fades = $(this);
		$fades.waypoint(function(direction) {
		  if (direction === 'down') {
			$fades.stop().animate({opacity:100}, 5000);
			$("#paper").lazylinepainter({ 
				'svgData' : svgData, 
				'strokeWidth':2, 
				'strokeColor':'#f6821f'
			}).lazylinepainter('paint');
		  }
		}, { offset: '100%' });
	});

$('#pen-draw').each(function(){
		var $fades = $(this);
		$fades.waypoint(function(direction) {
		  if (direction === 'down') {
			$fades.stop().animate({opacity:100}, 5000);
			$("#pen").lazylinepainter({ 
				'svgData' : svgData, 
				'strokeWidth':2, 
				'strokeColor':'#f6821f'
			}).lazylinepainter('paint');
		  }
		}, { offset: '100%' });
	});

$('#target-draw').each(function(){
		var $fades = $(this);
		$fades.waypoint(function(direction) {
		  if (direction === 'down') {
			$fades.stop().animate({opacity:100}, 5000);
			$("#target").lazylinepainter({ 
				'svgData' : svgData, 
				'strokeWidth':2, 
				'strokeColor':'#f6821f'
			}).lazylinepainter('paint');
		  }
		}, { offset: '100%' });
	});

//END HOME PAGE ICONS -------------------------------------------------->


var  mn = $(".main-nav");
    mns = "main-nav-scrolled";
    hdr = $('header').height();

$(window).scroll(function() {
  if( $(this).scrollTop() > hdr ) {
    mn.addClass(mns);
  } else {
    mn.removeClass(mns);
  }
});
	
	$('.fade-me').each(function(){
		var $fades = $(this);
		$fades.waypoint(function(direction) {
		  if (direction === 'down') {
			$fades.stop().animate({opacity:100}, 5000);
		  }
		}, { offset: '100%' });

	});




// Fade in divs consecutively (optional delay)
var delayBetweenEach = 600;
var fadeSpeed = 1000;
$(".icon").delay(800).each(function(index) {$(this).delay(delayBetweenEach*index).fadeIn(fadeSpeed);});





 

 

$('.videoWrapper').click(function () {
    $('.videoWrapper iframe').css("pointer-events", "auto");
});

    $('#icon-wrap li').click(function(e) {
        e.preventDefault();
        $('#icon-wrap li').removeClass('active');
        $(this).addClass('active');
    });

        $('#icon-wrap-e li').click(function(e) {
        e.preventDefault();
        $('#icon-wrap-e li').removeClass('active-e');
        $(this).addClass('active-e');
    });

       


var menu_elements = document.querySelectorAll('.menu>li'),
    menu_length = menu_elements.length;
for (var i = 0; i < menu_length; i++) {
    menu_elements[i].addEventListener('click', function (e) {
        var target = document.querySelector('.container>.' + e.target.classList[0]); // clicked element
        Array.prototype.filter.call(target.parentNode.children, function (siblings) {
            siblings.style.display = 'none'; // hide sibling elements
        });
        target.style.display = 'block'; // show clicked element
    });
}

$('.menu li').click(function(e) {
var buttonInfo = $(this).data('info');
$('#video').attr('class','expertise-top');
$('div#video').addClass(buttonInfo);
});

 $("#work-slide").owlCarousel({
 
      autoPlay: false, //Set AutoPlay to 3 seconds
 
      items : 3,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3],
      pagination : false,
      navigation : true,
      navigationText : ["<i class=\"fa caret fa-caret-left\"></i>","<i class=\"fa caret fa-caret-right\"></i>"]
 
  });


if (window.location.href.indexOf("#branding") > -1) {
    $('li.toggle3').click(),
    $("div.toggle1").css("display", "none"),
    $("div.toggle3").css("display", "block");

}

if (window.location.href.indexOf("#marketing") > -1) {
    $('li.toggle2').click(),
    $("div.toggle1").css("display", "none"),
    $("div.toggle2").css("display", "block");

}


if (window.location.href.indexOf("#digital") > -1) {
    $('li.toggle4').click(),
    $("div.toggle1").css("display", "none"),
    $("div.toggle4").css("display", "block");

}

if (window.location.href.indexOf("#cpg") > -1) {
    $('#icon-wrap-e .toggle2').click(),
    $("div.toggle1").css("display", "none"),
    $("div.toggle2").css("display", "block");

}


if (window.location.href.indexOf("#edu") > -1) {
    $('#icon-wrap-e .toggle3').click(),
    $("div.toggle1").css("display", "none"),
    $("div.toggle3").css("display", "block");

}


if (window.location.href.indexOf("#health") > -1) {
    $('#icon-wrap-e .toggle4').click(),
    $("div.toggle1").css("display", "none"),
    $("div.toggle4").css("display", "block");

}

if (window.location.href.indexOf("#building") > -1) {
    $('#icon-wrap-e .toggle5').click(),
    $("div.toggle1").css("display", "none"),
    $("div.toggle5").css("display", "block");

}


});