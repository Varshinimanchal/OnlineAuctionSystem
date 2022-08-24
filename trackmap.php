<?php
include("databaseconnection.php");
$dttim = date("Y-m-d H:i:s");
$sqlproduct= "SELECT * FROM product LEFT JOIN customer oN product.customer_id=customer.customer_id where product.end_date_time>'$dttim'";
$qsqlproduct = mysqli_query($con,$sqlproduct);
echo mysqli_error($con);
$i=1;
$locations = "[";
while($rsproduct = mysqli_fetch_array($qsqlproduct))
{
	$locations = $locations . "['<a href=single.php?productid=$rsproduct[0]><b>" . $rsproduct['product_name']  . "</b></a>', " . $rsproduct['latitude'] . ", " . $rsproduct['longitude'] . ",".$i . "],";
}
$locations = $locations . "]"
/*
    var locations = [
      ['Bondi Beach', 12.869569,74.844826, 4],
      ['Coogee Beach', 12.869491,74.844794, 5],
      ['Cronulla Beach', 12.869899,74.844826, 3],
      ['Manly Beach', 12.869899,74.844826, 2],
      ['Maroubra Beach', 12.869899,74.844826, 1]
    ];
*/
?>
<style>
  /* Always set the map height explicitly to define the size of the div
   * element that contains the map. */
  #map {
	height: 100%;
  }
  /* Optional: Makes the sample page fill the window. */
  html, body {
	height: 100%;
	margin: 0;
	padding: 0;
  }
  #floating-panel {
	position: absolute;
	top: 10px;
	left: 25%;
	z-index: 5;
	background-color: #fff;
	padding: 5px;
	border: 1px solid #999;
	text-align: center;
	font-family: 'Roboto','sans-serif';
	line-height: 30px;
	padding-left: 10px;
  }
  #floating-panel {
	position: absolute;
	top: 5px;
	left: 50%;
	margin-left: -180px;
	width: 350px;
	z-index: 5;
	background-color: #fff;
	padding: 5px;
	border: 1px solid #999;
  }
  #latlng {
	width: 225px;
  }
</style>

<div id="floating-panel">
  <input id="latlng" type="hidden" value="12.869556, 74.8447461" >
  <input id="submit" type="button" value="Track Nearest Farmer">
</div>
<div id="map"></div>

<script> 
function locate(){
	//document.getElementById("btnAction").disabled = true;
	//document.getElementById("btnAction").innerHTML = "Processing...";

	if ("geolocation" in navigator){
		navigator.geolocation.getCurrentPosition(function(position){ 
			var currentLatitude = position.coords.latitude;
			var currentLongitude = position.coords.longitude;
			
document.getElementById("latlng").value=currentLatitude + "," +currentLongitude;
//alert(currentLatitude + " " +currentLongitude);

			var infoWindowHTML = "Latitude: " + currentLatitude + "<br>Longitude: " + currentLongitude;
			var infoWindow = new google.maps.InfoWindow({map: map, content: infoWindowHTML});
			var currentLocation = { lat: currentLatitude, lng: currentLongitude };
			infoWindow.setPosition(currentLocation);
			document.getElementById("btnAction").style.display = 'none';
		});
	}
}

  function initMap() {
	var map = new google.maps.Map(document.getElementById('map'), {
	  zoom: 18,
	  center: {lat: 12.869556, lng: 74.8447461}
	});
	var geocoder = new google.maps.Geocoder;
	var infowindow = new google.maps.InfoWindow;
	
	locate();
	
	document.getElementById('submit').addEventListener('click', function() {		
	  geocodeLatLng(geocoder, map, infowindow);
	});
  }

  function geocodeLatLng(geocoder, map, infowindow) {
	var input = document.getElementById('latlng').value;
	var latlngStr = input.split(',', 2);
	var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
	geocoder.geocode({'location': latlng}, function(results, status) {
	  if (status === 'OK') 
	  {
			if (results[0]) 
			{
				
    var locations = <?php echo $locations; ?>;

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 16,
      center: new google.maps.LatLng(12.869569,74.844826),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
			}
			else 
			{
			  window.alert('No results found');
			}
	  } 
	  else 
	  {
		window.alert('Geocoder failed due to: ' + status);
	  }
	});
  }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDn1JrKoNqygrc0Wjei_wpPCSFIJXvvclk&callback=initMap">
</script>
<?php
/*
include("databaseconnection.php");
$sqlhospital= "SELECT * FROM hospital where status='Active'";
$qsqlhospital = mysqli_query($con,$sqlhospital);
echo mysqli_error($con);
while($rshospital = mysqli_fetch_array($qsqlhospital))
{
echo $rshospital[locationmap];
	//echo $rshospital[locationmap];
}

    var locations = [
      ['Bondi Beach', 12.869569,74.844826, 4],
      ['Coogee Beach', 12.869491,74.844794, 5],
      ['Cronulla Beach', 12.869899,74.844826, 3],
      ['Manly Beach', 12.869899,74.844826, 2],
      ['Maroubra Beach', 12.869899,74.844826, 1]
    ];
*/
?>