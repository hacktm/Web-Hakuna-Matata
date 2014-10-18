function MapGenerator() {
	this.geolocationOptions = {
		enableHighAccuracy: true,
		timeout: 1000,
		maximumAge: 3600000
	};

	this.generateMap = function ( element, lat, lng, zoom ) {
		if( ! google )
			return;

		var center = new google.maps.LatLng(lat, lng);
		this.center = { lat: lat, lng: lng };

		var mapOptions = {
			zoom: zoom,
			center: center,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			streetViewControl: false,
			styles: mapStyle
		};

		this.map = new google.maps.Map(document.getElementById(element), mapOptions);
		this.markers = [];
	};

	/**
	 *
	 * @param lat
	 * @param lng
	 * @param options { title, icon, info, clickable, draggable, dragendHandler }
	 * @returns {google.maps.Marker}
	 */
	this.setMarker = function( lat, lng, options ) {
		var markerOptions = {
			position: new google.maps.LatLng(lat, lng),
			map: this.map
		};

		if( options.title )
			markerOptions.title = options.title;

		markerOptions.clickable = options.clickable ? options.clickable : false;
		markerOptions.draggable = options.draggable ? options.draggable : false;

		var marker = new google.maps.Marker( markerOptions );
		marker.open = false;

		if( options.icon ) {
			iconFile = options.icon;
			marker.setIcon(iconFile);
		}

		var map = this;
		if( options.info ) {
			marker.info = new google.maps.InfoWindow({ content: options.info });

			google.maps.event.addListener( marker.info, 'closeclick', function() {
				marker.open = false;
			} );

			google.maps.event.addListener(marker, 'click', function() {
				if( ! this.open ) {
					map.markers.forEach( function( general_marker ) {
						if( general_marker ) {
							general_marker.info.close( general_marker.map, general_marker );
							general_marker.open = false;
						}
					} );
					this.info.open( this.map, this);
					this.open = true;
					FB.XFBML.parse(document.getElementById('restaurants-map'));
				} else {
					this.info.close( this.map, this);
					this.open = false;
				}
			});
		}

		if( options.dragendHandler ) {
			google.maps.event.addListener( marker, 'dragend', options.dragendHandler );
		}

		return marker;
	};

	this.setCenterMarker = function( options ) {
		this.centerMarker = this.setMarker( this.center.lat, this.center.lng, options );
	};

	this.setExtraMarker = function( id, lat, lng, options ) {
		this.markers[id] = this.setMarker( lat, lng, options );
	};

	this.clearExtraMarkers = function() {
		var keys = Object.keys( this.markers );
		for (var i = 0; i < keys.length; i++ )
			if( this.markers[keys[i]] )
				this.markers[keys[i]].setMap(null);
		this.markers = [];
	};

	this.updateCenter = function( lat, lng ) {
		this.center = { lat: lat, lng: lng };
		var center = new google.maps.LatLng(lat, lng);
		this.centerMarker.setPosition( this.center );
		this.map.setCenter( this.center );
	};

	this.setZoom = function( z ) {
		this.map.setZoom(z);
		var center = new google.maps.LatLng(this.center.lat, this.center.lng);
		this.map.setCenter( this.center );
	}

}

var mapStyle = [];
