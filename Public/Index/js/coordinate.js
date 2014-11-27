var geocoder; 
  var map; 
  function initialize() { 
    console.log('init');
    geocoder = new google.maps.Geocoder(); 
    var latlng = new google.maps.LatLng(31.23, 121.47); 
    var myOptions = { 
      zoom: 12, 
      center: latlng, 
      mapTypeId: google.maps.MapTypeId.ROADMAP 
    } 
    map = new google.maps.Map(document.getElementById("map"), myOptions); 
  } 
 
  function codeAddress() { 
    var address = document.getElementById("address").value; 
    geocoder.geocode( { 'address': address}, function(results, status) { 
      if (status == google.maps.GeocoderStatus.OK) { 
        console.log(results[0].geometry.location) 
        map.setCenter(results[0].geometry.location); 
        this.marker = new google.maps.Marker({ 
                title:address, 
            map: map,  
            position: results[0].geometry.location 
        }); 
                var infowindow = new google.maps.InfoWindow({ 
                    content: '<strong>'+address+'</strong><br/>'+'纬度: '+results[0].geometry.location.Da+'<br/>经度: '+results[0].geometry.location.Ea 
                }); 
                infowindow.open(map,marker); 
      } else { 
        alert("Geocode was not successful for the following reason: " + status); 
      } 
    }); 
  } 

google.maps.event.addDomListener(window, 'load', initialize);

