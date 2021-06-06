
        <!-- Product Details Area Start -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <!-- <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Furniture</a></li>
                                <li class="breadcrumb-item"><a href="#">Chairs</a></li>
                                <li class="breadcrumb-item active" aria-current="page">white modern chair</li> -->
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(<?php echo base_url().'uploads/stock/'.$productDetail[0]->stock_pic; ?>);">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(img/product-img/pro-big-2.jpg);">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(img/product-img/pro-big-3.jpg);">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(img/product-img/pro-big-4.jpg);">
                                    </li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="img/product-img/pro-big-1.jpg">
                                            <img class="d-block w-100" src="<?php echo base_url().'uploads/stock/'.$productDetail[0]->stock_pic; ?>" alt="First slide">
                                        </a>
                                    </div>
                                    <!-- <div class="carousel-item">
                                        <a class="gallery_img" href="img/product-img/pro-big-2.jpg">
                                            <img class="d-block w-100" src="img/product-img/pro-big-2.jpg" alt="Second slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="img/product-img/pro-big-3.jpg">
                                            <img class="d-block w-100" src="img/product-img/pro-big-3.jpg" alt="Third slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="img/product-img/pro-big-4.jpg">
                                            <img class="d-block w-100" src="img/product-img/pro-big-4.jpg" alt="Fourth slide">
                                        </a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div>
                                <table class="table table-striped table-bordered table-hover table-condensed">
                                    
                                        <?php
                                            foreach ($stockMetaDetail as $key => $value ) {
                                              echo '<tr>';
                                              echo '<th style="font-size:15px;">'.$key.'</th>';
                                              echo '<th style="font-size:15px;">'.$value->value.'</th>';
                                              echo '</tr>';
                                            }
                                            
                                        ?>
                                </table>
                            </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                
                                <!-- Avaiable -->
                                <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                            </div>

                            <div>
                                <table class="table">
                                    <tr>
                                        <td><?php echo $productDetail[0]->stock_des; ?></td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Add to Cart Form -->
                            <form class="cart clearfix" action="<?php echo base_url()?>shop/addToCart" method="post">
                                <div class="cart-btn d-flex mb-50">
                                    <p>Qty</p>
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <input name='stock_id' type='hidden' value='<?php echo $productDetail[0]->stock_id; ?>'>
                                <label>Available Stock : <?php echo $productDetail[0]->quantity; ?></label>
                                <?php
                                if ($productDetail[0]->quantity != 0 ) {
                                    if($this->session->userdata('user_id')!='' && $this->session->userdata('user_id')!=$site->user_id ){
                                        echo '
                                    <input type="submit" value="Add to cart"  class="btn amado-btn">
                                    ';
                                    }
                                    
                                    
                                }elseif($this->session->userdata('user_id')!=''){
                                    echo '<input disabled value="Out of Stock"  class="btn amado-btn">';
                                }
                                ?>
                            </form>
                           

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
 
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
