/*----------------------------------------------------*/
/* Quote Loop
------------------------------------------------------ */

function fade($ele) {
    $ele.fadeIn(1000).delay(3000).fadeOut(1000, function() {
        var $next = $(this).next('.quote');
        fade($next.length > 0 ? $next : $(this).parent().children().first());
   });
}
fade($('.quoteLoop > .quote').first());


/*----------------------------------------------------*/
/* Navigation
------------------------------------------------------ */

$(window).scroll(function() {

    if ($(window).scrollTop() > 100) {
        $('.main_nav').addClass('sticky');
    } else {
        $('.main_nav').removeClass('sticky');
    }
});

// Mobile Navigation
$('.mobile-toggle').click(function() {
    if ($('.main_nav').hasClass('open-nav')) {
        $('.main_nav').removeClass('open-nav');
    } else {
        $('.main_nav').addClass('open-nav');
    }
});

$('.main_nav li a').click(function() {
    if ($('.main_nav').hasClass('open-nav')) {
        $('.navigation').removeClass('open-nav');
        $('.main_nav').removeClass('open-nav');
    }
});


/*----------------------------------------------------*/
/* Smooth Scrolling
------------------------------------------------------ */

$(document).ready(function($) {

   $('.smoothscroll').on('click',function (e) {
	    e.preventDefault();

	    var target = this.hash,
	    $target = $(target);

	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top
	    }, 800, 'swing', function () {
	        window.location.hash = target;
	    });

	});
    
    $(window).scroll(function(){
        //console.log($("html,body").scrollTop())
        let nowscroll = $(this).scrollTop()
        //console.log(nowscroll)

        //About Section
        let abhd=$('#about').offset().top
        //console.log(abhd)
        
        //Skills Section
        let skhd=$('#skills').offset().top
        let pfhd=$('#portfolio').offset().top
        let cthd=$('#contact').offset().top
        //console.log(skhd)

        if (nowscroll >= (abhd / 2) && nowscroll <= skhd) {
            $('#about').addClass("aboutshow");
        }else {
            $('#about').removeClass("aboutshow");
        }

        if (nowscroll >= (skhd / 1.3) && nowscroll <= pfhd) {
            $('#skillbox1').addClass("skillshow");
            $('#skillbox2').addClass("skillshow");
            $('#skillbox3').addClass("skillshow");
            $('#skillbox4').addClass("skillshow");
        }else {
            $('#skillbox1').removeClass("skillshow");
            $('#skillbox2').removeClass("skillshow");
            $('#skillbox3').removeClass("skillshow");
            $('#skillbox4').removeClass("skillshow");
        }

        if (nowscroll >= pfhd) {
            $('#portfolio').addClass("active");
        }
    })
});

/*----------------------------------------------------*/
/* heading
------------------------------------------------------ */

$('#home').load("./home.html");
$('#about').load("./about.html");
$('#skills').load("./skills.html");
$('#portfolio').load("./portfolio.html");
$('#contact').load("./contact.html");





TweenMax.staggerFrom(".heading", 0.8, {opacity: 0, y: 20, delay: 0.2}, 0.4);