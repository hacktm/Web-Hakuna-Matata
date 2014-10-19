// This is called with the results from from FB.getLoginStatus().
function statusChangeCallback(response) {
	if (response.status === 'connected') {
		// Logged into your app and Facebook.
		FB.api('/me', function(response) {
			console.log(response);
		});

	}
}

// This function is called when someone finishes with the Login
// Button.  See the onlogin handler attached to it in the sample
// code below.
function checkLoginState() {
	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});
}

window.fbAsyncInit = function() {
	FB.init({
		appId      : 1585578998249136,
		cookie     : true,  // enable cookies to allow the server to access the session
		xfbml      : true,  // parse social plugins on this page
		version    : 'v2.1' // use version 2.1
	});


	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});

};

// Load the SDK asynchronously
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


(function ($) {	
	function drawMap() {
		var data = google.visualization.arrayToDataTable($('#main-geo-map').data('count'));
		var links = $('#main-geo-map').data('links');

		var options = {
			dataMode: 'regions',
			width: $('#main-geo-map').width(),
			height: $('#main-geo-map').height() - 5,
			colorAxis: {colors: ['#eee', '#060']},
			backgroundColor: '#b3d1ff'
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
			$(this).height( window_height - header_height - admin_bar_height );
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

				function get_posts_cluster(page) {

					var post = {
						action: 'get_posts_in',
						ne_lat: bounds.getNorthEast().lat(),
						ne_lng: bounds.getNorthEast().lng(),
						sw_lat: bounds.getSouthWest().lat(),
						sw_lng: bounds.getSouthWest().lng(),
						page: page
					};

					$.ajax({
						url: ajax.ajaxurl,
						type: "post",
						data: post,
						dataType: "json",
						success: function(response){
							response.forEach(function(post) {
								map.setExtraMarker(index++, post['lat'], post['lng'], {
									info: post['info'],
									title: post['title'],
									clickable: true
								});
							});
							if( response.length )
								get_posts_cluster(page+1);
						}
					});
				}

				var bounds;
				google.maps.event.addListener(map.map, "bounds_changed", function() {
					// send the new bounds back to your server
					bounds = map.map.getBounds();
					get_posts_cluster(1);
				});
			}
		}


	});
})(jQuery);

