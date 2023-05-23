function initgeocoder() {
  
  var target = document.getElementById('map');
  var address = point;
  var geocoder = new google.maps.Geocoder();
  console.log("test");
  geocoder.geocode({ address: address }, function(results, status) {
    if (status === 'OK' && results[0]){
      console.log(results[0].geometry.location);
      var map = new google.maps.Map(target, {
        center: results[0].geometry.location,
        zoom: 12
      });
      var marker = new google.maps.Marker({
        position: results[0].geometry.location,
        map: map,
        animation: google.maps.Animation.DROP
      });
    } else {
      alert('住所が存在しません');
      target.style.display='none';
    }
  });
}