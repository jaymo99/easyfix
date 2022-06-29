// Initialize and add the map
function initMap() {
    // The location of Maasai mall rongai
    const rongai = { lat: -1.3942330517263632, lng: 36.764185816517866 };
    // The map, centered at maasai mall rongai
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 12,
      center: rongai,
    });
    // The marker, positioned at maasai mall rongai
    const image = "./graphics/mechanic-marker.png";

    const marker = new google.maps.Marker({
      position: rongai,
      map: map,
      icon: image,
      animation: google.maps.Animation.BOUNCE,
    });

}

window.initMap = initMap;

//---------------------- MAP on mechanic-settings page -------------------
function settingsMap() {
  // The location of Maasai mall rongai
  const maasaiMall = { lat: -1.3942330517263632, lng: 36.764185816517866 };
  // The map, centered at maasai mall rongai
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 14,
    center: maasaiMall,
  });


  //Location marker
  const image = "./graphics/set-marker.png";

  const marker = new google.maps.Marker({
    position: maasaiMall,
    map: map,
    icon: image,
    animation: google.maps.Animation.BOUNCE,
    draggable: true,
  });

  //InfoWindow set on the marker
  const infowindow = new google.maps.InfoWindow({
    content: "<strong>Drag to set location!</strong>",
  });

  infowindow.open({
    anchor: marker,
    map,
    shouldFocus: false,
  });

  marker.addListener('dragend', function(evt){
    document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat() + ' Current Lng: ' + evt.latLng.lng() + '</p>';
    //center the map on the marker
    map.panTo(marker.position);
  });

  marker.addListener('dragstart', function(evt){
    //close the infowindow
    infowindow.close();
    document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
  });



}


