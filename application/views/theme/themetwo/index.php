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
    <link rel="icon" href="<?php echo base_url().'uploads/logos/'.$site->site_logo?>" type="image/x-icon">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/theme/themetwo/css/core-style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/theme/themetwo/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/theme/themetwo/css/custom.css">

</head>

<body>
    
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
       <?php include 'header.php' ?>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="img/core-img/bag.svg" alt=""> <span></span></a>
        </div>

        <div class="cart-content d-flex"> 

            <!-- Cart List Area -->
            <div class="cart-list" id="cartItems">
                <!-- Single Cart Item -->
                
                    
            </div>
        

               
            <!-- Cart Summary -->
            <div class="cart-amount-summary">

                
                <form action="<?php echo base_url()?>checkout" method="post">
                    <input type="hidden"  id="amount1" name="amount">
                    <h4>Summary</h4>
                    <ul class="summary-table">
                        <li><span>subtotal:</span> <span id="subtotal"></span></li>
                        <li><span>delivery:</span> <span>Free</span></li>
                        <li><span>discount:</span> <span id="discount"></span></li>
                        <li><span>total:</span> <span id="total"></span></li>
                    </ul>
                                
                                    <select name="payment" required>
                                        <option value="" >Payment Method</option>
                                        <option value="cash">Cash On delivery</option>
                                        <option value="stripe">Stripe Payment</option>
                                    </select>
                                
                                <div class="cart-btn mt-100">
                                <input type="submit" value="CheckOut"  class="btn amado-btn w-100" >    
                                                                  
                                
                                                
                                </div>
                </form>
                
            </div>
        </div>
    </div>
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(<?php echo base_url()?>assets/theme/themetwo/img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2><?php echo $site->site_title; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Catagories</h6>

                            <!--  Catagories  -->
                            <div class="catagories-menu">
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="">
                                        <a href="#">clothing</a>
                                        <ul class="sub-menu collapse show" id="clothing">
                                            <li><a href="#">All</a></li>
                                            <?php
                                            
                                            foreach ($product as $item) {
                                                $single = json_decode(json_encode($item), True);
                                                echo '<li><a href=""></a>'.$single['product_description'].'</li>';
                                            }
                                            ?>
                                            
                                        </ul>
                                    </li>
                                   
                                </ul>
                            </div>
                        </div>

                        <!-- ##### Single Widget ##### -->
                        

                        
                        
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <?php include $page_name.'.php'; ?>
                    
                   
                    
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area">
      <?php include 'fotter.php' ?>
      <?php include 'checkout.php'; ?>  
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="<?php echo base_url()?>assets/theme/themetwo/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?php echo base_url()?>assets/theme/themetwo/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo base_url()?>assets/theme/themetwo/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="<?php echo base_url()?>assets/theme/themetwo/js/plugins.js"></script>
    <!-- Classy Nav js -->
    <script src="<?php echo base_url()?>assets/theme/themetwo/js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="<?php echo base_url()?>assets/theme/themetwo/js/active.js"></script>
    <!-- Costum js -->
    <script src="<?php echo base_url()?>assets/theme/themetwo/js/costum.js"></script>

</body>

</html>