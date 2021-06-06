<?php include 'navbar.php'; ?>      
        <section class="bar background-gray no-mb padding">
               <!-- Side bar Menu start-->
               <br/>
             <div class="col-md-11 offset-1">
                    <h3 >Sites</h3>
                    <div class="row">
                    <?php
                        foreach ($shops as $shop) {
                        
                             echo '
                                <div class="col-md-3">
                                    <div class="card rounded text-center" style="margin-bottom: 20px;">
                                        <div class="card-image">
                                        <a class="ad-btn" href="'.base_url().'shop/?id='.$shop->site_id.'"><img height="200" width="200"  src="'.base_url().'uploads/logos/'.$shop->site_logo.'"/></a>
                                            
                                        </div>
                                        <div class="card-image-overlay m-auto">
                                            <span class="card-detail-badge"></span>
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="ad-title m-auto">
                                                <h5> <a  href="'.base_url().'shop/?id='.$shop->site_id.'" >'.$shop->site_title.'</a>.</h5>
                                            </div>
                                            <span class="card-detail-badge">'.$shop->Catagory.'</span>
                                            
                                        </div>
                                        <div class="ad-title m-auto">
                                               <span class="fa fa-star" style="color:yellow"></span>
                                               <span class="fa fa-star" style="color:yellow"></span>
                                               <span class="fa fa-star" style="color:yellow"></span>
                                               <span class="fa fa-star"></span>
                                               <span class="fa fa-star"></span></div>
                                               
                                           
                                    </div>
                                </div>
        
                        ';
                     
                        
                        } ?>

                        
                    </div>
                </div>
         <!-- Side bar Menu End-->
         </aside>
        </section>
        <section class="bar background-gray no-mb padding">
               <!-- Side bar Menu start-->
             <div class="col-md-11 offset-1">
                    <h3 style="margin-top:0px;">Trending Items</h3>
                    <div class="row">
                    <?php
                        foreach($stock as $cat)
                        {
                            foreach ($cat as $item) {
                        
                                echo '
                                   <div class="col-md-3">
                                       <div class="card rounded" style="margin-bottom:20px;">
                                           <div class="card-image">
                                           <a class="ad-btn" href="'.base_url().'shop/?id='.$item->site_id.'"><img height="200" width="200" src="'.base_url().'uploads/stock/'.$item->stock_pic.'"/></a>                                            
                                           </div>
                                           <div class="card-image-overlay m-auto">
                                               <span class="card-detail-badge"></span>
                                           </div>
                                           <div class="card-body text-center">
                                               <div class="ad-title m-auto">
                                                   <h5><a  href="'.base_url().'shop/productDetail/?product_id='.$item->stock_id.'">'.$item->stock_des.'</a>.</h5>
                                               </div>
                                              <div class="ad-title m-auto">
                                              <span class="card-detail-badge"><a href="'.base_url().'shop/?id='.$item->site_id.'">'.$item->site_title.'</a></span>
                                              </div>
                                               <div class="ad-title m-auto">
                                               <span class="fa fa-star" style="color:yellow"></span>
                                               <span class="fa fa-star" style="color:yellow"></span>
                                               <span class="fa fa-star" style="color:yellow"></span>
                                               <span class="fa fa-star"></span>
                                               <span class="fa fa-star"></span></div>
                                               
                                           </div>
                                       </div>
                                   </div>
           
                           ';
                        
                           
                           } 
   
                        }
                        ?>
                        
                    </div>
                </div>
         <!-- Side bar Menu End-->
         </aside>
        </section>

