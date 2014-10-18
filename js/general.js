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

