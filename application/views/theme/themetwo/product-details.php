


    <!-- ##### Blog Wrapper Area Start ##### -->
    <div class="single-blog-wrapper">

        <!-- Single Blog Post Thumb -->
        <div class="single-blog-post-thumb">
            <img src="img/bg-img/bg-8.jpg" alt="">
        </div>

        <div class="container">
            <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-9">
    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
        <img src="<?php echo base_url().'uploads/stock/'.$productDetail[0]->stock_pic; ?>" alt="">
                
            <div class="product_thumbnail_slides owl-carousel">
                
            </div>
            <table class="table table-striped table-bordered table-hover table-condensed">
                                    
                                    <?php
                                        foreach ($stockMetaDetail as $key => $value ) {
                                          echo '<tr>';
                                          echo '<th style="font-size:15px;">'.key( $value).'</th>';
                                          echo '<th style="font-size:15px;">'.$value->value.'</th>';
                                          echo '</tr>';
                                        }
                                        
                                    ?>
                            </table>
        </div> 

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            <a href="cart.php">
                <h2><?php echo $productDetail[0]->stock_des; ?></h2>
            </a>
            <?php 
            $newPrice=$productDetail[0]->stock_price-$productDetail[0]->stock_dis ?>
            <p class="product-price"><span class="old-price">$<?php echo $productDetail[0]->stock_price; ?></span> $<?php echo $newPrice; ?></p>
            
            <!-- Form -->
            <form class="cart-form clearfix" method="post">
                <!-- Select Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->
                    <form class="cart clearfix" action="<?php echo base_url()?>shop/addToCart" method="post">
                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                        
                    
                </div>
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->
                    <input name='stock_id' type='hidden' value='<?php echo $productDetail[0]->stock_id; ?>'>
                    <input type="submit" value="Add to cart"  class="btn essence-btn">
                    </form>
                    <!-- Favourite -->
                    <br>
                    <br>
                    <br>
                    <div class="product-favourite ml-4">
                        <a href="#" class="favme fa fa-heart"></a>
                    </div>
                </div>
            </form>
        </div>
        </section>
</div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper Area End ##### -->