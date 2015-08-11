// All custom Javascript


$(document).ready(function(){





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