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
    // One info window to be used by all the markers
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

        let content = 
          "<div>" +
          '<p style="font-weight: 900; margin-bottom: .5rem;">' + element.name + '</p>' +
          '<p>Mechanic</p>'+
          "</div>"
        ;

        google.maps.event.addListener(marker, 'click', (function(marker, content){
          return function() {
            infowindow.setContent(content);
            infowindow.open(map, marker);
          };
        })(marker, content));
        
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

let currentLocation = {lat: "", lng: ""};
let singleGarageLocation = { lat: '', lng: ''};

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
    content: "<span style='font-weight: bold;'>Drag to set your garage's location!</span>",
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

let directionsService;
let directionsRenderer;

function initSingleGarageMap() {
  directionsService = new google.maps.DirectionsService();
  directionsRenderer = new google.maps.DirectionsRenderer();
  
  // fetch single mechanic location
  fetch('./includes/fetch-single-mechanic-location.inc.php')
  .then((response) => response.json())
  .then((data) => {
      singleGarageLocation.lat = Number(data[0]['latitude']);
      singleGarageLocation.lng = Number(data[0]['longitude']);
      
      // The map, centered at single Garage location
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 14,
        center: singleGarageLocation,
      });
      directionsRenderer.setMap(map);
    
      //Location marker
      const image = "./graphics/mechanic-marker.png";
    
      const marker = new google.maps.Marker({
        position: singleGarageLocation,
        map: map,
        icon: image,
        animation: google.maps.Animation.BOUNCE,
      });
    
      if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
          currentLocation.lat = position.coords.latitude;
          currentLocation.lng = position.coords.longitude;
    
          console.log(currentLocation);
        }, function(){}, {enableHighAccuracy: true})
      }
  }).catch((error) => {
    console.error('Error: ', error);
  });
  /////////////////////////////////////////


}

function getDirections() {
  
  $('html,body').scrollTop(0);

  directionsService.route({
      origin: currentLocation,
      destination: singleGarageLocation,
      travelMode: google.maps.TravelMode.DRIVING,
    })
    .then((response) => {
      directionsRenderer.setDirections(response);
    })
    .catch((e) => window.alert("Directions request failed. Denied by map provider "));

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


