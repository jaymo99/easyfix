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
    const image = "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";

    const marker = new google.maps.Marker({
      position: rongai,
      map: map,
      icon: image,
      animation: google.maps.Animation.BOUNCE,
    });

}

window.initMap = initMap;