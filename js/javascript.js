$(document).ready(function() {
    $('#headline1').delay(1000).fadeIn(1000);

    var wHeight = $(window).height();
    var wWidth = $(window).width();

    $('.jumbotron').css({
    	'height' : + wHeight + 'px'
    });

    console.log("Height = " + wHeight);
    console.log("Width = " + wWidth);

    if(window.innerWidth < 630){
    	$('a.media').media({width:250, height:500});
    }


    if(wWidth < 630){
    	$('a.media').media({width:350, height:500});
    }
    if(wWidth < 992){
		$('a.media').media({width:600, height:500});
    }
    if(wWidth > 992){
    	$('a.media').media({width:800, height:500});
    }




});
