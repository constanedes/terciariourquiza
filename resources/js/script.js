function iniciarMap() {
  let coord = {
    lat: -32.9422419,
    lng: -60.6532294,
  };
  let map = new google.maps.Map(document.getElementById('map'), {
    zoom: 14,
    center: coord
  });
  let marker = new google.maps.Marker({
    position: coord,
    map: map
  });
}