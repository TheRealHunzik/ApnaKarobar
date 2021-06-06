
<div id="map" style="height:550px; width:100%;"></div>
    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var jsonresturant = <?php echo json_encode($resturant); ?>;
      var map, infoWindow;
      function initMap() {
       
        infowindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            map = new google.maps.Map(document.getElementById('map'), {
            center: {lat:  position.coords.latitude, lng:position.coords.longitude},
              zoom: 15
            });
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var locations = [
                    ['You Are Here', position.coords.latitude, position.coords.longitude,"user.png",0]
                  ];
            jsonresturant.forEach(element => {
                locations.push([element.site_title,element.site_lat,element.site_long,element.site_logo,element.site_id])
            });
                  var marker, i;
                  
                  for (i = 0; i < locations.length; i++) {
                    
                    var icon = {
                            url: `<?php echo base_url()?>uploads/logos/${locations[i][3]}`,
                            scaledSize: new google.maps.Size(50, 50), // scaled size
                            origin: new google.maps.Point(0,0), // origin
                        };
                    marker = new google.maps.Marker({
                      position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                      map: map,
                      url: `<?php echo base_url()?>shop/?id=${locations[i][4]}`,
                      title: locations[i][0],
                      icon: icon
                    });

                     google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                      window.location.href = this.url;         
                    }
                    })(marker, i));
                   
                   
                  }
                 
                 

            
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBV4dtEYpKJLi3jQskGtpEabFS4Sty0C3w&callback=initMap">
    </script>