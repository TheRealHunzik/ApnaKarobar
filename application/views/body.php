<?php include 'navbar.php'; ?>
 <section>
         <div class="home-carousel">

                <div class="dark-mask"></div>

                <div class="container">
                    <div class="homepage owl-carousel">
                        <div class="item">
                            <div class="row">

                                <div class="col-sm-7 text-center">
                                    <img class="img-responsive" src="img/template-mac.png" alt="">
                                </div>

                                <div class="col-sm-5">
                                    <h2>Create Your E-Commerce Site</h2>
                                    <ul class="list-style-none">
                                        <li>Its Easy,</li>
                                        <li>Click, Add Data, Add products</li>
                                        <li>And Start Selling..</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-5 right">
                                    <h1>BE SMART BUYER</h1>
                                    <ul class="list-style-none">
                                        <li>Save Money</li>
                                        <li>Save TIme</li>
                                        <li>Compare Before Buying</li>
                                    </ul>
                                </div>
                                <div class="col-sm-7">
                                    <img class="img-responsive" src="img/template-easy-customize.png" alt="">
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.project owl-slider -->
                </div>
            </div>

            <!-- *** HOMEPAGE CAROUSEL END *** -->
        </section>
      
        <section class="bar background-gray no-mb padding">
               <!-- Side bar Menu start-->
               <br/> 
             <div class="col-md-11 offset-1">
                    <h3 style="color: daily;" >Trending Shops</h3>
                    <div class="row">
                    <?php
                        foreach ($shops as $shop) {
                        
                             echo '
                                <div class="col-md-3" >
                                    <div class="card rounded" style="margin-bottom: 20px;" >
                                        <div class="card-image text-center">
                                        <a class="ad-btn" href="'.base_url().'shop/?id='.$shop->site_id.'"><img height="200" width="200" src="'.base_url().'uploads/logos/'.$shop->site_logo.'"/></a>
                                            
                                        </div>
                                        <div class="card-image-overlay m-auto">
                                            <span class="card-detail-badge"></span>
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="ad-title m-auto">
                                                <h5> <a  href="'.base_url().'shop/?id='.$shop->site_id.'">'.$shop->site_title.'</a>.</h5>
                                            </div>
                                           <div class="ad-title m-auto">
                                                <span class="card-detail-badge"> <a href="'.base_url().'catagory/?cat_id='.$cat->catagory_id.'">'.$shop->Catagory.'</a></span>
                                           </div>
                                            <span class="fa fa-star" style="color:yellow"></span>
                                            <span class="fa fa-star" style="color:yellow"></span>
                                            <span class="fa fa-star" style="color:yellow"></span>
                                            <span class="fa fa-star" style="color:yellow"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
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
                    <h3 style="margin-top: 0px;" >Trending Sites</h3>
                    <div class="row">
                    <?php
                        foreach ($stock as $item) {
                        
                             echo '
                                <div class="col-md-3">
                                    <div class="card rounded" style="margin-bottom: 20px;" >
                                        <div class="card-image text-center">
                                        <a class="ad-btn" href="'.base_url().'shop/?id='.$item->site_id.'"><img height="200px" width="200px"  src="'.base_url().'uploads/stock/'.$item->stock_pic.'"/></a>
                                        </div>
                                        <div class="card-image-overlay m-auto">
                                            <span class="card-detail-badge"></span>
                                        </div>
                                        <div class="card-body">
                                            <div class="ad-title m-auto">
                                                <h5><a  href="'.base_url().'shop/productDetail/?product_id='.$item->stock_id.'">'. substr($item->stock_des, 0, 20).'</a>.</h5>
                                            </div>
                                            <div class="ad-title m-auto ">
                                                <span class="card-detail-badge">RS : '.$item->stock_price.'</span><br/>
                                                <span class="card-detail-badge"><a href="'.base_url().'shop/?id='.$item->site_id.'">'.$item->site_title.'</a></span>
                                            </div>';
                                            ?>
                                            <?php 
                                            for ($i=1; $i <=$item->rating ; $i++) { 
                                                echo '<span class="fa fa-star" style="color:yellow"></span>';
                                            }
                                            ?>
                                            .'
                                            <?php 
                                            echo '
                                            
                                        </div>
                                    </div>
                                </div>
        
                        ';
                     
                        
                        } ?>

                        
                    </div>
                </div>
         <!-- Side bar Menu End-->
         </aside>
        </section>


           
        
        <!-- /.bar -->

        <section class="bar background-white">
            <div class="container">
                <div class="heading text-center">
                            <h2>Our clients</h2>
                 </div>
                <div class="row">
                    <!-- it must have to be Display Inherited -->
                    <div class="col-md-12 testFooter">
                        <div class="col-md-4">
                            <div class="box-simple">
                                <div class="icon">
                                
                                    <p><?php echo $count[1]; ?>+</p>
                                </div>
                                <h3>Members</h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-simple">
                                <div class="icon">
                                    <p><?php echo $count[0]; ?>+</p>
                                </div>
                                <h3>Shops</h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-simple">
                                <div class="icon">
                                    <p><?php echo $count[2]; ?>+</p>
                                </div>
                                <h3>Sellings</h3>
                            </div>
                        </div>
                        <!-- /.owl-carousel -->
                    </div>

                </div>
            </div>
        </section>


        <!-- *** GET IT ***
_________________________________________________________ -->

       


        <!-- *** GET IT END *** -->

        