// Initialize and add the map
function initMap() {
    // The location of Maasai mall rongai
    const rongai = { lat: -1.3942330517263632, lng: 36.764185816517866 };
    // The map, centered at maasai mall rongai
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 14,
      center: rongai,
    });
    // The custom marker
    const image = "./graphics/mechanic-marker.png";

    let infowindow = new google.maps.InfoWindow();

    // Fetch all mechanics locations
    fetch('./includes/fetch-mechanic-locations.inc.php')
    .then((response) => response.json())
    .then((data) => {
      console.log('Success: ', data);
      //create a marker for each location in the returned array
      data.forEach(element => {
        // Convert element.latitude to number because it was received as string
        let mechanicLocation = {lat: Number(element.latitude), lng: Number(element.longitude)};

        let marker = new google.maps.Marker({
          position: mechanicLocation,
          map: map,
          icon: image,
          animation: google.maps.Animation.BOUNCE,
        });

        let content = "Thank God!";

        google.maps.event.addListener(marker, 'click', (function(marker, content, infowindow){
          return function() {
            infowindow.setContent(content);
            infowindow.open(map, marker);
          };
        })(marker, content, infowindow));
        
      });
    }).catch((error) => {
      console.error('Error: ', error);
    });
    ///////////////////////////////////////
    
}

window.initMap = initMap;

//---------------------- MAP on mechanic-settings page -------------------

// object for saving the location
let mechanicLocation = {};

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
    mechanicLocation.lat = evt.latLng.lat();
    mechanicLocation.lng = evt.latLng.lng();

    document.getElementById('current').innerHTML = '<p>Marker dropped</p>';
    //center the map on the marker
    map.panTo(marker.position);
  });

  marker.addListener('dragstart', function(evt){
    //close the infowindow
    infowindow.close();
    document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
  });

}

function saveLocation(mech_id){
  // The mech_id of the mechanic whose location is being set
  mechanicLocation.mech_id = mech_id;
  
  myJson = JSON.stringify(mechanicLocation);

  fetch('./includes/set-maplocation.inc.php', {
    method: 'post',
    body: myJson,
    headers: {
      'Content-Type': 'application/json'
    },
  })
  .then((response) => response.text())
  .then((data) => {
    console.log('Success: ', data);
    document.getElementById('current').innerHTML = '<p>Location Saved!</p>';
    alert("Location saved!");
  }).catch((error) => {
    console.error('Error: ', error);
  });
}


