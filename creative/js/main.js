jQuery(function($){
	'use strict';
	//portfolio filter
	$(window).load(function() {
		
		var $portfolio_selectors = $('.portfolio-filter >li>a');

		if ($portfolio_selectors.length) {

			var portfolios = $('.portfolio-items');
			$portfolios.isotope({
				itemSelector: '.portfolio-item',
				layoutMode: 'fitRows'
			});

			$portfolio_selectors.on('click', function() {
				$portfolio_selectors.removeClass('active');
				$(this).addClass('active');
				var selector = $(this).attr('data-filter');
				$portfolio.isotope({ filter: selector });
				return false;
			});
		}
	});
});