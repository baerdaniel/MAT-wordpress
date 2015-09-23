// All custom Javascript


$(document).ready(function(){


	// $('.children').hide();

	// $('.cat-item').click(function(event){
	// 	event.preventDefault();
	// 	$(this).find('.children').slideToggle(500);
	// });

	// $('.filter-list').hide();

	// $('#exhibitions.filter-toggle').click(function(event){
	// 	$(this).toggleClass('active');
	// 	$('#events.filter-toggle').removeClass('active');
	// 	$('#filters-events').slideUp(500);
	// 	$('#filters-exhibitions').slideToggle(500);
	// });

	// $('#events.filter-toggle').click(function(event){
	// 	$(this).toggleClass('active');
	// 	$('#exhibitions.filter-toggle').removeClass('active');
	// 	$('#filters-exhibitions').slideUp(500);
	// 	$('#filters-events').slideToggle(500);
	// });

	//search
	$('.search button').click(function(event){
		$(this).toggleClass('active');
		$('.search-field').toggleClass('active');
		$('.search-field input').focus();
	});

	//display related content only if there's content
	if ( $('.related-content').children().length == 0 ) {
    	$('.related-content').hide();
	}

	// mobile menu toggle {
	$('.mobile-nav-toggle').click(function(event){
		$(this).toggleClass('active');
		$('.header-menu').toggleClass('mobile');
	});

	// mobile menu toggle {
	$('.nav-toggle').click(function(event){
		$(this).toggleClass('active');
		$('.header-menu').toggleClass('nav-down');
		$('.header-menu').toggleClass('nav-up');
	});

});

// Hide Header on on scroll down
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('.header-menu').outerHeight();

$(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
    var st = $(this).scrollTop();
    
    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;
    
    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        $('.header-menu').removeClass('nav-down').addClass('nav-up');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
            $('.header-menu').removeClass('nav-up').addClass('nav-down');
        }
    }
    
    lastScrollTop = st;
}

$(window).load(function(){
	
	$('.main-gallery').flickity({
	  // options
	  cellAlign: 'center',
	  wrapAround: true,
	  lazyLoad: 2,
	  contain: true,
	  selectedAttraction: 0.02,
	  pageDots: false,
	  imagesLoaded: true,
	  accessibility: false,
	  cellSelector: '.main-gallery .gallery-cell',
	  freeScroll: true,
	  resize: true,
	  autoPlay: true,
		  arrowShape: {
	      x0: 20,
	      x1: 70, y1: 20,
	      x2: 70, y2: 20,
	      x3: 70
	    }
	});
});
