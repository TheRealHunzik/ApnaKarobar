<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Apna Karobar</title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet"/>
    <!-- Bootstrap and Font Awesome css -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

    <!-- Css animations  -->
    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">

    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="<?php echo base_url(); ?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">

    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>assets/img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>assets/img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>assets/img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>assets/img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>assets/img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>assets/img/apple-touch-icon-152x152.png" />
    <!-- owl carousel css -->

    <link href="<?php echo base_url(); ?>assets/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/owl.theme.css" rel="stylesheet">
</head>

<body>
 <div id="all">
 <div id="top">
                <div class="container">

                    <div class="row">
                        <div class="col-md-6 contact formating">
                             <nav class="navbar_alling navbar-expand-lg" >
            
               
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                                
                         <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto" >
                        <li class="nav-item active" >
                            <a style="color:white;size:20px;" class="nav-link" href="<?php echo base_url()?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a style="color:white;size:20px;" class="nav-link" href="<?php echo base_url() ?>/compare">Price Comparison </a>
                        </li>
                        
                        <li class="nav-item">
                            <a style="color:white;size:20px;" class="nav-link" href="<?php echo base_url() ?>/foodcorner">Food Corner</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a style="color:white;size:20px;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                                foreach($catagory as $cat)
                                {
                                   echo ' <div class="dropdown-divider"></div>
                                   <a class="dropdown-item" href="'.base_url().'catagory/?cat_id='.$cat->catagory_id.'">'.$cat->catagory_name.'</a>';
                                }
                             ?>
                            
                            </div>
                        </li>
                        </ul>
                    </div>
            
        </nav>
                        </div>
                        <div class="col-md-6" style="margin-top: 15px;">
                            <?php 
                                if($this->session->userdata('login')!=1){
                                 ?>  
                                  
                                 <div class="login">
                                    <a href="#" data-toggle="modal" data-target="#login" ><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">LOGIN</span></a>
                                    <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">SIGNUP</span></a>
                                    <a href="<?php echo base_url()?>admin/login" class="btn btn-info btn-lg">
                                        <span class="glyphicon glyphicon-shopping-cart"></span> Admin
                                     </a>     
                                </div>
                                <?php
                                }
                                else{
                                    ?>    
                                    <div class="login" style="display:flex;">
                                        <?php
                                            if($site!=NULL)
                                            { ?>
                                                <div class="dropdown">
                                                    <a href="#" class="btn dropdown-toggle"  data-toggle="dropdown">Your Sites
                                                    <span class="caret"></span></a>
                                                    <ul class="dropdown-menu">
                                                    <?php 
                                                    foreach($site as $sites)
                                                    {
                                                        echo '<li style="text-allign:center" ><a style="color:black;" href="'.base_url().'shop/?id='.$sites->site_id.'">'.$sites->site_title.'</a> </li>
                                                        <div class="dropdown-divider"></div>';
                                                    }
                                                    
                                                    ?>
                                                    
                                                    </ul>
                                                </div>
                                                    <?php 
                                            }else
                                            {   ?> 
                                            <div style="margin-top: 10px;">
                                                <a href="#" data-toggle="modal" data-target="#siteRegister" ><i class="fa fa-plus"></i> <span class="hidden-xs text-uppercase">BECOME A SELLER</span></a>
                                            </div>
                                            
                                            <?php 
                                            } ?>
                                            <div class="dropdown" style="margin-top: 5px;">
                                                 <a href="#" class="btn dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase"><?php echo $this->session->userdata('user_name'); ?></span></a>
                                                 <ul class="dropdown-menu">
                                                <li> <i class="fa fa-user"></i> <a href="<?php echo base_url();?>profile" style="color: black;">Profile</a></li>
                                                <div class="dropdown-divider"></div>
                                                <li> <i class="fa fa-cogs"></i> <a href="" style="color: black;">settings</a></li>
                                                <div class="dropdown-divider"></div>
                                                <li> <i class="fa fa-sign-out"></i> <a href="<?php echo base_url();?>order" style="color: black;">Order</a></li>
                                                <div class="dropdown-divider"></div>
                                                <li> <i class="fa fa-sign-out"></i> <a href="<?php echo base_url();?>Auth/logout" style="color: black;">logout</a></li>
                                                <ul>
                                            </div>
                                                <?php }?>
                                     </div>
    
                        </div>
                    </div>
                </div>
                </div>
        
            </div>
<?php
include 'signup.php'; 
include $page_name.'.php'; 

include 'registerform.php';
include 'footer.php';?> 