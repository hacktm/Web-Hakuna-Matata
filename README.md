This repo contains a list of countries containing center, south west and north east latitude and longitude.
The list can be used for centering on a country in google maps.

Here is a code example:
```js
 function initialize() {
     $.getJSON('countries.json', function (countries) {
         var index_country = 40;
         var myOptions = {
             center: new google.maps.LatLng(countries[index_country].center_lat,countries[index_country].center_lng),
         }
         var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
         var bounds = new google.maps.LatLngBounds(
             new google.maps.LatLng(countries[index_country].sw_lat, countries[index_country].sw_lng),
             new google.maps.LatLng(countries[index_country].ne_lat, countries[index_country].ne_lng) );
         map.fitBounds(bounds);
     });
 }
 ```
