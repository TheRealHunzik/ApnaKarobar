 <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand"  href=""><img height="60" width="60" src="<?php echo base_url().'uploads/logos/'.$site->site_logo; ?>" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                   
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="#" method="post">
                        <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <!-- Favourite Area -->
                <div class="favourite-area">
                    <a href="<?php echo base_url() ?>"><img src="<?php echo base_url(); ?>assets/theme/themetwo/img/core-img/arrow-left.svg" alt=""></a>
                </div>
                <?php
   
    if($site->user_id==$this->session->userdata('user_id'))
    {
    ?> 
                <div class="user-login-info">
                    <a href="<?php echo base_url()?>seller?siteID=<?php echo $siteID ?>"><img src="<?php echo base_url().'uploads/logos/'.$site->site_logo ?>" alt=""></a>
                </div>
        <
    <?php
    }
    if($this->session->userdata('user_id')!=''){
        ?>
                <!-- User Login Info -->
                
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="#" id="essenceCartBtn"><img src="<?php echo base_url(); ?>assets/theme/themetwo/img/core-img/bag.svg" alt=""> <span></span></a>
                </div>
    <?php } ?>
          </div>

        </div>