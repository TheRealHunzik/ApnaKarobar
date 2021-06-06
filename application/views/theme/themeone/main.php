
        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">

               <?php
               if($products==NULL)
               {
                   if($site->user_id==$this->session->userdata('user_id'))
                   {
                    echo '<button style="margin: 0 auto;" class="btn btn-primary">Add New Products</button>'; 
                   }else{
                       echo '<div style="margin: 0 auto;">No Products Added</div>';
                   }
                ?>
                   
                    
                <?php

               }else{
                    foreach($products as $product)
                    {
                        
                        echo '
                         <!-- Single Catagory -->
                        <div class="single-products-catagory clearfix">
                            <a href="'.base_url().'shop/productDetail/?product_id='.$product->stock_id.'">
                                <img width="200" heigth="400" src="'.base_url().'uploads/stock/'.$product->stock_pic.'" alt="">
                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <div class="line"></div>
                                    <p>From $'.$product->stock_price.'</p>
                                    <h6>'.$product->stock_des.'</h6>
                                </div>
                            </a>
                        </div>  
                    ';
                    }
                }
               ?>

            </div>
        </div>
        <!-- Product Catagories Area End -->
    </div>