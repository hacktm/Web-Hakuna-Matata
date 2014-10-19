(function($){
	function drawMap() {
		var data = new google.visualization.DataTable();
		
		data.addColumn('string', 'Countries');
		data.addColumn('number', 'Visited');
		//data.addColumn('tooltip', {role: 'tooltip', p:{html:true}} );
		data.addColumn({type: 'string', role: 'tooltip'});
		var countries = $('#travel-map').data('countries');
		
		var countryTable = [];
		if( ! countries )
			return;

		countries.forEach(function(entry){	
			countryTable.push([entry,1, 'Visited']);
		});
		console.log(countryTable);
		data.addRows(countryTable);

		//var data2 = google.visualization.arrayToDataTable(countryTable);

	    var options = {
		dataMode: 'regions',
		width: $('#travel-map').width(),
		height: 395,
		colorAxis: {colors: ['#e0e0e0', '#060']},
		legend: 'none'
	    };

	    var container = document.getElementById('travel-map');
	    var chart = new google.visualization.GeoChart(container);
	    chart.draw(data, options);
	}

	function drawGeoMap() {
		google.load('visualization', '1.1', {packages: ['geochart'], callback: drawMap});
	}

	$(document).ready(function() {
		
		drawGeoMap();

		var location = $('#location-selection-map');
		if( location.length ) {
			var lat = $('#lat');
			var lng = $('#lng');
			var latitude = lat.val() ? lat.val() : 0;
			var longitude = lng.val() ? lng.val() : 0;
			var dragend = function() {
				var new_position = this.getPosition();
				lat.val( new_position.lat() );
				lng.val( new_position.lng() );
			};

			var map = new MapGenerator();
			map.generateMap( 'location-selection-map', latitude, longitude, 3 );
			map.setCenterMarker({ title: "", info: "", clickable: true, draggable: true, dragendHandler: dragend });
		}
	});
})(jQuery);
