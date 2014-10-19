if (typeof(Number.prototype.toRad) === "undefined") {
	Number.prototype.toRad = function() {
		return this * Math.PI / 180;
	}
}

if (typeof(Number.prototype.toDeg) === "undefined") {
	Number.prototype.toDeg = function() {
		return this / Math.PI * 180;
	}
}


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
			icon: 'http://' + document.domain + '/wp-content/themes/tips4trip/img/pointer.png',
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

	this.calculateDistance = function( lat1, lon1, lat2, lon2 ) {
		var R = 6371000; // meters
		var dLat = (lat2-lat1).toRad();
		var dLon = (lon2-lon1).toRad();
		lat1 = lat1.toRad();
		lat2 = lat2.toRad();

		var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
			Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2);
		var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));

		return R * c;
	};

	this.calculateCountryZoom = function(ne_lat, ne_lng, se_lat, se_lng, element ) {
		var length = this.calculateDistance(ne_lat, ne_lng, se_lat, ne_lng );
		var height = this.calculateDistance(ne_lat, ne_lng, ne_lat, se_lng );
		var z1 = this.getZoom(length,element);
		var z2 = this.getZoom(height,element);
		return z1 < z2 ? z1 : z2;
	};

	this.getZoom = function( d, element ) {
		var w = element.width();
		var h = element.height();
		w = w<h ? w : h;
		var zooms = [0,21282,16355,10064,5540,2909,1485,752,378,190,95,48,24,12,6,3,1.48,0.74,0.37,0.19];
		var z = 20, m;
		while( zooms[--z] ){
			m = zooms[z] * w;
			if( d < m ){
				break;
			}
		}
		return z;
	};

	this.setZoom = function( z ) {
		this.map.setZoom(z);
		var center = new google.maps.LatLng(this.center.lat, this.center.lng);
		this.map.setCenter( this.center );
	}

}

var mapStyle = [{"featureType":"landscape.natural.terrain","elementType":"all","stylers":[{"visibility":"on"},{"color":"#eeeeee"}]},{"featureType":"landscape.natural.landcover","elementType":"all","stylers":[{"visibility":"on"},{"color":"#eeeeee"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#eeeeee"}]},{"featureType":"landscape.natural.landcover","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#000000"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"on"},{"color":"#eeeeee"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"on"},{"color":"#eeeeee"}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#cccccc"}]}]; 
