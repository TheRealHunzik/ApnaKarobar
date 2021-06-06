<div class="container">
    <div class="col-md-4 details">
        
            <?php $address = "COMSATS Attock" ?>
                     <iframe
                      width="200"
                      height="200"
                      frameborder="0" style="border:0"
                      src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAZ-6MxGKtCOPWBtg5TdzC_xhZrRrCXaBY
                        &q=<?php echo $address ?>">
                    </iframe>

                   
       
        
    </div>
    <div class="col-md-4 details" >
        <ul>
                   <li> <i class="fa fa-phone" style="font-size:25px; padding: 10px"></i><?php echo '  '.$site->site_mobile;?></li>
                   <li> <i class="fa fa-envelope-o" style="font-size:25px;padding: 10px"></i> <?php echo '  '.$site->site_email;?></li>
                   <li> <i class="fa fa-map-marker" aria-hidden="true"  style="font-size:25px; padding: 10px"></i><?php echo '  '.$site->site_lat.'   '.$site->site_long;?></li>
        </ul>
        
    </div>
    <div class="col-md-4 details">
                
                    <h2 style="color: white;text-align: center;padding: 20px;">Powered By Apna Karobar.com</h2>
        
        
    </div>
    
</div>
<div class="col-md-12 text-center">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="<?php echo base_url(); ?>" target="_blank">Apnakarobar.com </a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
    </div>
<script>
function getReverseGeocodingData(lat, lng) {
    var latlng = new google.maps.LatLng(lat, lng);
    // This is making the Geocode request
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({ 'latLng': latlng }, function (results, status) {
        if (status !== google.maps.GeocoderStatus.OK) {
            alert(status);
        }
        // This is checking to see if the Geoeode Status is OK before proceeding
        if (status == google.maps.GeocoderStatus.OK) {
            console.log(results);
            var address = (results[0].formatted_address);
        }
    });
}
</script>

