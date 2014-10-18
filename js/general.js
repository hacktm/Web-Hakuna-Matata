function drawMap() {
    var data = google.visualization.arrayToDataTable([
        ['Country', 'Projects'],
        ['Russia', 3],
        ['France', 2],
        ['Spain', 4]
    ]);

    //var dt = DataTable();
    
    var options = {
        dataMode: 'regions',
        width: 834,
        height: 521,
        colorAxis: {colors: ['gray', '#060']}
    };

    var container = document.getElementById('map_canvas');
    var chart = new google.visualization.GeoChart(container);

    
    google.visualization.events.addListener(chart, 'regionClick', function(eventData) { //console.log(eventData.region); 
    window.location.assign("http://wordpress/" + eventData.region);});

    chart.draw(data, options);
}

function drawGeoMap() {
	google.load('visualization', '1', {packages: ['geochart'], callback: drawMap});
}


