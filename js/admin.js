(function($){
	function drawMap() {
		var data = new google.visualization.DataTable();
		
		data.addColumn('string', 'Countries');
		data.addColumn('number', 'Visited');
		var countries = $('#travel-map').data('countries');
		console.log(countries);
		
		var countryTable = [];
		//countryTable.pop();
		countries.forEach(function(entry){	
			countryTable.push([entry,1]);
		});
		console.log(countryTable);
		data.addRows(countryTable);
	    /*var data = google.visualization.arrayToDataTable(countriesTable/*[
		['Country', 'Articles'],
		['Russia', 3],
		['France', 2],
		['Spain', 4]
	    ]);*/

	    
	    
	    var options = {
		dataMode: 'regions',
		width: 395,
		height: 395,
		colorAxis: {colors: ['#eee', '#060']}
	    };

	    var container = document.getElementById('travel-map');
	    var chart = new google.visualization.GeoChart(container);
		

	    chart.draw(data, options);
	}

	function drawGeoMap() {
		google.load('visualization', '1', {packages: ['geochart'], callback: drawMap});
	}

	$(document).ready(function() {
		
		
		
		
		drawGeoMap();
	});
})(jQuery);
