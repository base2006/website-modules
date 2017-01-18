<div id="map"></div>
<!-- TODO: fill in api key -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=API-KEY-HERE&callback=initMap"></script>
<script>
  function initMap() {
	var amsterdam = {lat: 52.374421, lng: 4.903141};
	var map = new google.maps.Map(document.getElementById('map'), {
	  zoom: 8,
	  center: amsterdam
	});

	var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">Amsterdam</h1>'+
      '<div id="bodyContent">'+
      '<p><b>Amsterdam</b> is de (titulaire) hoofdstad en naar inwonertal de grootste gemeente van Nederland. De stad, in het Amsterdams ook Mokum genoemd (afkomstig uit het Jiddisch), ligt in de provincie Noord-Holland, aan het IJ en de monding van de Amstel.</p>' +
	  '<p>Amsterdam telt 838.338 inwoners (1 april 2016, bron: CBS). Het aantal verschillende nationaliteiten behoort tot de hoogste ter wereld.</p>'+
      '<p>Attribution: Amsterdam, <a href="https://nl.wikipedia.org/wiki/Amsterdam">'+
      'https://nl.wikipedia.org/wiki/Amsterdam</a> '+
      '</div>'+
      '</div>';
	var infowindow = new google.maps.InfoWindow({
		content: contentString
	});

	var marker = new google.maps.Marker({
	  position: amsterdam,
	  map: map
	});

	marker.addListener('click', function() {
		infowindow.open(map, marker);
	});
  }
</script>
