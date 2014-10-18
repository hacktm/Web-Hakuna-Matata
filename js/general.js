(function ($) {
	function drawMap() {
		var data = google.visualization.arrayToDataTable($('#main-geo-map').data('count'));
		var links = $('#main-geo-map').data('links');

		var options = {
			dataMode: 'regions',
			width: $('#main-geo-map').width(),
			height: $('#main-geo-map').height(),
			colorAxis: {colors: ['#eee', '#060']}
		};

		var container = document.getElementById('main-geo-map');
		var chart = new google.visualization.GeoChart(container);


		google.visualization.events.addListener(chart, 'regionClick', function (eventData) {
			if (links[eventData.region])
				window.location.assign(links[eventData.region]);
		});

		chart.draw(data, options);
	}

	function drawGeoMap() {
		google.load('visualization', '1', {packages: ['geochart'], callback: drawMap});
	}


	$(document).ready(function () {
		$('.full-height').each(function () {
			var window_height = $(window).outerHeight();
			var header_height = $('header').outerHeight();
			var admin_bar_height = $('#wpadminbar').outerHeight();
			$(this).height( window_height - header_height - admin_bar_height - 40);
		});

		if( $('#main-geo-map').length )
			drawGeoMap();
	});
})(jQuery);

