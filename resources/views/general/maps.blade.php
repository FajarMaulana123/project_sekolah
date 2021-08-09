<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pilih lokasi</title>
	<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
	<link href="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css" rel="stylesheet">
	<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.css" type="text/css">
	<style>
		body { margin: 0; padding: 0; }
		#map { position: absolute; top: 0; bottom: 0; width: 100%; margin-top: 75px;}
		#menu {
			top: 10px; 
			left: 10px;
			position: absolute;
			background: #efefef;
			padding: 10px;
			font-family: 'Open Sans', sans-serif;
		}
		.mapboxgl-popup {
			max-width: 400px;
			font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
		}
		.geocoder {
			position: absolute;
			z-index: 1;
			width: 50%;
			left: 70%;
			margin-left: -25%;
			top: 10px;
		}
		.mapboxgl-ctrl-geocoder {
			min-width: 100%;
		}
	</style>
</head>
<body>
	

	<div id="map"></div>
	
	<div id="menu">
		<input id="satellite-v9" type="radio" name="rtoggle" value="satellite">
		<label for="satellite-v9">satellite</label>
		<input id="light-v10" type="radio" name="rtoggle" value="light">
		<label for="light-v10">light</label>
		<input id="dark-v10" type="radio" name="rtoggle" value="dark">
		<label for="dark-v10">dark</label>
		<input id="streets-v11" type="radio" name="rtoggle" value="streets" checked="checked">
		<label for="streets-v11">streets</label>
		<input id="outdoors-v11" type="radio" name="rtoggle" value="outdoors">
		<label for="outdoors-v11">outdoors</label>
	</div>
	<div class="row geocoder">
		<div class="col-md-6">
			<div id="geocoder" class="geocoder"></div>
			
		</div>
		<div class="col-md-6">
			<form method="post" name="maps" action="{{ url('addzonasi/'.$jalur.'/'.Crypt::encrypt($id_sekolah)) }}" enctype="multipart/form-data"  role="form" >
				@csrf
				<table>
			  		<tr><td>Latlang</td> 
			   		<td> <input type="text" name='latlang' id='latlang' disabled value="{{$siswa->latitude}} {{$siswa->longitude}}"></td></tr>
			  	</table>
			  	<input type="hidden" name='latitude' id='latitude' >
			  	<input type="hidden" name='longitude' id='longitude' >
			  	<input type="hidden" name='lat' id='lat' value="{{$siswa->latitude}}">
			  	<input type="hidden" name='lng' id='lng' value="{{$siswa->longitude}}">
			  	<input type="hidden" name="id_siswa" value="{{$siswa->id_siswa}}">
			  	<input type="submit" class="btn btn-primary" value="Simpan" style="margin-left: 175px;" onclick="myFunction()">
		  	</form>
		</div>
	</div>

 
</body>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.min.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"
type="text/javascript"></script>
<script>
   function myFunction() {
   	  var latlang = document.getElementById('latlang').value;
      if (latlang == null || latlang == "") {
         alert("Pilih Lokasi terlebih dahulu !!!");
      }
   }
</script>
<script>
  	var a = document.getElementById('lng').value;
  	var b = document.getElementById('lat').value;
  	mapboxgl.accessToken = 'pk.eyJ1IjoiaHl1d2FubmlkYSIsImEiOiJja3Jpb2Q4Y280dXY0MnZwZHVyMmlxOGVlIn0.iVbM3KengzDSkyQwpwawMQ';
  	if (a == 0 | b == 0) {
  		lng = 108.324936;
  		lat = -6.327583;
  	}else{
  		lng = a;
  		lat = b;
  	}
  	var map = new mapboxgl.Map({
	  		container: 'map',
	  		style: 'mapbox://styles/mapbox/streets-v11',
	  		center: [lng, lat],
	  		zoom: 16
  		});

  	var layerList = document.getElementById('menu');
  	var inputs = layerList.getElementsByTagName('input');

  	function switchLayer(layer) {
  		var layerId = layer.target.id;
  		map.setStyle('mapbox://styles/mapbox/' + layerId);
  	}

  	for (var i = 0; i < inputs.length; i++) {
  		inputs[i].onclick = switchLayer;
  	}
  	var geocoder = new MapboxGeocoder({
  		accessToken: mapboxgl.accessToken,
  		mapboxgl: mapboxgl
  	});
  	var marker = new mapboxgl.Marker()
	  	.setLngLat([lng, lat])
		.addTo(map);

  	function add_marker (event) {
  		var coordinates = event.lngLat;
  		console.log('Lng:', coordinates.lng, 'Lat:', coordinates.lat);
  		marker.setLngLat(coordinates).addTo(map);
  		document.getElementById('latitude').value = coordinates.lat;
  		document.getElementById('longitude').value = coordinates.lng;
  		document.getElementById('latlang').value = coordinates.lat + "," + coordinates.lng;

  		
  	}

  	map.on('click', add_marker);

		/*map.on('style.load', function() {
		  map.on('click', function(e) {
		    var coordinates = e.lngLat;
		    new mapboxgl.Popup()
		      .setLngLat(coordinates)
		      .setHTML('you clicked here: <br/>' + coordinates)
		      .addTo(map);

        	new mapboxgl.Marker().setLngLat(coordinates).addTo(map);
			console.log(coordinates);
		  });
		});
		map.addLayer*/


		/*function updateMarkerPosition(latLng) {
		  document.getElementById('latitude').value = [latLng.lat()]
		    document.getElementById('longitude').value = [latLng.lng()]
		}
		var latLng = new google.maps.LatLng(108.324936, -6.327583);
		var marker = new google.maps.Marker({
		    position : latLng,
		    title : 'lokasi',
		    map : map,
		    draggable : true
		});*/

		document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
	</script>
</html>