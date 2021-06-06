<div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        <p><span><?php echo count($products) ?></span> products found</p>
                                    </div>
                                    <!-- Sorting -->
                                    <div class="product-sorting d-flex">
                                        <p>Sort by:</p>
                                        <form action="#" method="get">
                                            <select name="select" id="sortByselect">
                                                <option value="value">Highest Rated</option>
                                                <option value="value">Newest</option>
                                                <option value="value">Price: $$ - $</option>
                                                <option value="value">Price: $ - $$</option>
                                            </select>
                                            <input type="submit" class="d-none" value="">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        <?php
                            foreach($products as $product)
                            {
                                $percent =( $product->stock_dis /$product->stock_price)*100 ;
                                echo '
                                <div class="col-12 col-sm-6 col-lg-4">
                                    <div class="single-product-wrapper">
                                        <!-- Product Image -->
                                        <div class="product-img">
                                            <img src="'.base_url().'uploads/stock/'.$product->stock_pic.'" alt="">
                                            <!-- Hover Thumb -->
                                            <img class="hover-img" src="img/product-img/product-2.jpg" alt="">
    
                                            <!-- Product Badge -->
                                            <div class="product-badge offer-badge">
                                                <span>-'.$percent.'%</span>
                                            </div>
                                            <!-- Favourite -->
                                            <div class="product-favourite">
                                                <a href="#" class="favme fa fa-heart"></a>
                                            </div>
                                        </div>
    
                                        <!-- Product Description -->
                                        <div class="product-description">
                                            <span>topshop</span>
                                            <a href="'.base_url().'shop/productDetail/?product_id='.$product->stock_id.'">
                                                <h6>'.$product->stock_des.'</h6>
                                            </a>
                                            <p class="product-price"><span class="old-price">$'.$product->stock_price.'</span> $'.($product->stock_price-$product->stock_dis).'</p>
    
                                            <!-- Hover Content -->
                                            <div class="hover-content">
                                                <!-- Add to Cart -->
                                                <div class="add-to-cart-btn">
                                                    <button type="button" class="btn essence-btn addToCart" value="'.$product->stock_id.'" >Add to Cart</button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ';
                            }
                        ?>
                        </div>
                    </div>