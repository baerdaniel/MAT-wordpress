// All custom Javascript


$(document).ready(function(){


	// $('.children').hide();

	// $('.cat-item').click(function(event){
	// 	event.preventDefault();
	// 	$(this).find('.children').slideToggle(500);
	// });

	$('.filter-list').hide();

	$('#exhibitions.filter-toggle').click(function(event){
		$(this).toggleClass('active');
		$('#events.filter-toggle').removeClass('active');
		$('#filters-events').slideUp(500);
		$('#filters-exhibitions').slideToggle(500);
	});

	$('#events.filter-toggle').click(function(event){
		$(this).toggleClass('active');
		$('#exhibitions.filter-toggle').removeClass('active');
		$('#filters-exhibitions').slideUp(500);
		$('#filters-events').slideToggle(500);
	});


});

$(window).load(function(){
	
	$('.main-gallery').flickity({
	  // options
	  cellAlign: 'left',
	  contain: true,
	  selectedAttraction: 0.02,
	  pageDots: true,
	  imagesLoaded: true,
	  accessibility: false,
	  // freeScroll: true,
	  setGallerySize: false,
	  cellSelector: '.main-gallery .gallery-cell'
	});
});