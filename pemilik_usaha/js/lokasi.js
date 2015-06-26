function updateMarkerPosition(latLng) {
		document.getElementById('lat').value = [latLng.lat()];
		document.getElementById('lng').value = [latLng.lng()];
	}

 
	//membuat map baru
    var myOptions = {
      zoom: 11,
        scaleControl: true,
      center:  new google.maps.LatLng(-6.913785, 107.407542),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

	
    var map = new google.maps.Map(document.getElementById("map"),
        myOptions);
    //sampai sini

    //buat marker
	var marker1 = new google.maps.Marker({
	position : new google.maps.LatLng(-6.913785, 107.407542),
	title : 'lokasi',
	map : map,
	draggable : true
	});
	
	//updateMarkerPosition(latLng);

	google.maps.event.addListener(marker1, 'drag', function() {
		updateMarkerPosition(marker1.getPosition());
	});
	

	

	