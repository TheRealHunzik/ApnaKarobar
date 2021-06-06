        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="index.php"><img src="<?php echo base_url().'uploads/logos/'.$site->site_logo ?>" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <div class="logo">
                <label class="form-control"><?php echo $site->site_title;  ?></label>
                <label class="form-control"><?php echo $site->site_slogan;  ?></label>
                <label class="form-control"><?php echo $site->catagory_name;  ?></label>       
            </div>
            <nav class="amado-nav">
                <ul>
                    <li class="active"><a href=">">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="product-details.php">Product</a></li>
                    <li><a href="<?php echo base_url().'shop/cart' ?>">Cart</a></li>
                    <li><a href="checkout.php">Checkout</a></li>
                </ul>
            </nav>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                <a href="#" class="btn amado-btn mb-15">%Discount%</a>
                <a href="#" class="btn amado-btn active">New this week</a>
            </div>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="cart.php" class="cart-nav"><img src="<?php echo base_url(); ?>assets/theme/themeoneimg/core-img/cart.png" alt=""> Cart <span>(0)</span></a>
                <a href="#" class="fav-nav"><img src="<?php echo base_url(); ?>assets/theme/themeoneimg/core-img/favorites.png" alt=""> Favourite</a>
                <a href="#" class="search-nav"><img src="<?php echo base_url(); ?>assets/theme/themeoneimg/core-img/search.png" alt=""> Search</a>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>