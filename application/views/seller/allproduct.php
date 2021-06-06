
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
            </li>
            <li class="breadcrumb-item active">Products</li>
          </ol>

          <!-- Icon Cards-->
            
          <div class="box-body">
              <div class="row">
                <?php
                    $j=count($product);
                        for ($i=0; $i <$j ; $i++) { 
                            foreach($product[$i] as $products){
                                echo '
                                <div class="col-md-3">
                                    <div class="card rounded">
                                        <div class="card-image text-center">
                                            <img height-"200" width="200" src="'.base_url().'uploads/product/'.$products->product_pic.'" alt="'.$products->product_description.'" />
                                        </div>
                                        <div class="card-image-overlay m-auto">
                                            <span class="card-detail-badge">'.$products->catagory.'</span>
                                            <span class="card-detail-badge">',$products->Stock.'</span>
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="ad-title m-auto">
                                                <h5>'.$products->product_description.'.</h5>
                                            </div>
                                            <a class="btn btn-success" href="'.base_url().'/seller/addproduct/?product_id='.$products->product_id.'">Add</a>
                                        </div>
                                    </div>
                                </div>
        
                        ';
                            }
                        }
                    
                ?>
              </div>
              
          </div>
          <!-- Area Chart Example-->
          <div class="card mb-3">
            
          </div>
