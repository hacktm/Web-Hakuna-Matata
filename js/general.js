(function ($) {	
	function drawMap() {
		var data = google.visualization.arrayToDataTable($('#main-geo-map').data('count'));
		var links = $('#main-geo-map').data('links');

		var options = {
			dataMode: 'regions',
			width: $('#main-geo-map').width(),
			height: $('#main-geo-map').height() - 5,
			colorAxis: {colors: ['#e0e0e0', '#060']},
			backgroundColor: '#b3d1ff'
		};

		var container = document.getElementById('main-geo-map');
		var chart = new google.visualization.GeoChart(container);


		google.visualization.events.addListener(chart, 'regionClick', function (eventData) {
			if (links[eventData.region])
				window.location.assign(links[eventData.region]);
		});

		chart.draw(data, options);

		$('#main-geo-map > div').eq(0).css('position','fixed');
	}

	function drawGeoMap() {
		google.load('visualization', '1', {packages: ['geochart'], callback: drawMap});
	}


	$(document).ready(function () {
		$('.full-height').each(function () {
			var window_height = $(window).outerHeight();
			var header_height = $('header').outerHeight();
			var admin_bar_height = $('#wpadminbar').outerHeight();
			$(this).css( 'min-height', window_height - header_height - admin_bar_height  + 'px');
		});

		if( $('#main-geo-map').length )
			drawGeoMap();

		var country_map = $('#country-map');
		if( country_map.length ) {
			var map = new MapGenerator();
			var data = country_map.data('country');
			var zoom = map.calculateCountryZoom( parseFloat( data['ne_lat'] ), parseFloat(data['ne_lng']),parseFloat(data['sw_lat']),parseFloat(data['sw_lng']), country_map );

			map.generateMap('country-map', data['center_lat'], data['center_lng'], zoom );


			var articles = $('.articles article');
			if( articles.length ) {
				var index = 0;
				articles.each(function () {
					var position = $(this).data('position');
					var title = $('.title', this).text();
					map.setExtraMarker(index++, position['lat'], position['lng'], {
						info: $(this).html(),
						title: title,
						clickable: true
					});
					$(this).remove();
				});

				var session_key = false;
				function get_posts_cluster() {

					var post = {
						action: 'get_posts_in',
						ne_lat: bounds.getNorthEast().lat(),
						ne_lng: bounds.getNorthEast().lng(),
						sw_lat: bounds.getSouthWest().lat(),
						sw_lng: bounds.getSouthWest().lng()
					};

					var author = country_map.data( 'author' );
					if( author ) {
						post.author = author
					}

					if( session_key )
						post.session_key = session_key;

					$.ajax({
						url: ajax.ajaxurl,
						type: "post",
						data: post,
						dataType: "json",
						success: function(response){
							if( response.session_key )
								session_key = response.session_key;

							response.posts.forEach(function(post) {
								map.setExtraMarker(index++, post['lat'], post['lng'], {
									info: post['info'],
									title: post['title'],
									clickable: true
								});
							});
							if( response.posts.length )
								get_posts_cluster();
						}
					});
				}

				var bounds;
				google.maps.event.addListener(map.map, "bounds_changed", function() {
					// send the new bounds back to your server
					bounds = map.map.getBounds();
					get_posts_cluster();
				});
			}
		}


	});
})(jQuery);

