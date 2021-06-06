    <footer class="footer_area clearfix" style="padding-top: 21px; padding-bottom: 13px; width:100%;">
    <div class="container" style="display:flex;">
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
        <ul style="color:white">
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
    </footer>
    



    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="<?php echo base_url(); ?>assets/theme/themeone/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?php echo base_url(); ?>assets/theme/themeone/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo base_url(); ?>assets/theme/themeone/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="<?php echo base_url(); ?>assets/theme/themeone/js/plugins.js"></script>
    <!-- Active js -->
    <script src="<?php echo base_url(); ?>assets/theme/themeone/js/active.js"></script>

    <!-- Costum js -->
    <script src="<?php echo base_url(); ?>assets/theme/themeone/js/costum.js"></script>
    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=54652833910-nfmgptreh9i41qnfpad9kqtvi303cpko.apps.googleusercontent.com &callback=myMap">
</body>

</html>