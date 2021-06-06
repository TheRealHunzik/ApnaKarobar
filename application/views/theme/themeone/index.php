<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title><?php echo $site->site_title;?></title>

    <!-- Favicon  -->
    <link rel="icon" href="<?php echo base_url().'uploads/logos/'.$site->site_logo;?>">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/themeone/css/core-style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/themeone/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/themeone/scss/style.scss">
    
</head>

<body>
    <?php

        if($site->user_id==$this->session->userdata('user_id'))
        {
        ?> 
            <div>
                 <div class="header nav-item">
                <a style="color:white;" href="<?php echo base_url()?>seller?siteID=<?php echo $siteID ?>"><i class="fa fa-envelope-square"></i>Go To Dashboard</a>
         </div>
        </div>
        <?php
        }
    ?>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="<?php echo base_url(); ?>assets/theme/themeone/img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.php"><img src="<?php echo base_url().$site->site_logo;?>" alt=""></a>
                
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">

                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <?php include 'sidebar.php'; ?>            
        <!-- Header Area End -->
        

    <?php
    include $page_name.'.php';
    include 'footer.php'; ?>
    <!-- ##### Main Content Wrapper End ##### -->
    <!-- fotter start here-->
    <!-- fotter end here-->

