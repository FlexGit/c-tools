jQuery(document).ready(function($) {
	"use strict";

	var siteCarousel = function () {
		if ($('.slide-one-item').length) {
			$('.slide-one-item').owlCarousel({
				center: false,
				items: 1,
				loop: true,
				stagePadding: 0,
				margin: 0,
				autoplay: true,
				pauseOnHover: true,
				nav: true,
				navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">']
			});
	    }
	};
	siteCarousel();
});
