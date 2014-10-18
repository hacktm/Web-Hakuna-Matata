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

		var country_map = $('#country-map');
		if( country_map.length ) {
			var map = new MapGenerator();
			var data = country_map.data('country');
			var zoom = map.calculateCountryZoom( parseFloat( data['ne_lat'] ), parseFloat(data['ne_lng']),parseFloat(data['sw_lat']),parseFloat(data['sw_lng']), country_map );

			map.generateMap('country-map', data['center_lat'], data['center_lng'], zoom );
		}
	});
})(jQuery);

