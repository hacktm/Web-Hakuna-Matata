(function($){
	$(document).ready(function() {
		var countries = $('#travel-map').data('countries');
		console.log(countries);

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
