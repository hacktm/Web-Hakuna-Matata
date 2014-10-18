(function($){
	function drawMap() {
	    var data = google.visualization.arrayToDataTable([
		['Country', 'Articles'],
		['Russia', 3],
		['France', 2],
		['Spain', 4]
	    ]);

	    //var dt = DataTable();
	    
	    var options = {
		dataMode: 'regions',
		width: $('#main-geo-map').width(),
		height: $('#main-geo-map').height(),
		colorAxis: {colors: ['#eee', '#060']}
	    };

	    var container = document.getElementById('main-geo-map');
	    var chart = new google.visualization.GeoChart(container);

	    
	    google.visualization.events.addListener(chart, 'regionClick', function(eventData) { //console.log(eventData.region); 
	    window.location.assign("http://wordpress/" + eventData.region);});

	    chart.draw(data, options);
	}

	function drawGeoMap() {
		google.load('visualization', '1', {packages: ['geochart'], callback: drawMap});
	}


        $(document).ready(function() {
		$('.full-height').each(function(){
			var window_height = $(window).outerHeight();
			var header_height = $('header').outerHeight();
			$(this).height( window_height - header_height - 70 );
		});
		drawGeoMap();
        });
})(jQuery);

