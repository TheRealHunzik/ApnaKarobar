<section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php
                        foreach($catagory as $cat){
                        echo '
                        <div class="col-md-3">
                            <div class="card rounded">
                                <div class="card-image">
                                <a class="ad-btn" href=""><img height="200" width="200"  src="'.base_url().'uploads/catagory/'.$cat->catagory_pic.'" /></a>
                                    
                                </div>
                                <div class="card-image-overlay m-auto">
                                    <span class="card-detail-badge"></span>
                                </div>
                                <div class="card-body text-center">
                                    <div class="ad-title m-auto">
                                        <h5>'.$cat->catagory_name.'</h5>
                                        <span>No of Sites :  '.$cat->Sites.'</span>
                                        <br>
                                        <div ><a class="btn btn-primary btn-sm" href="#">Update</a></div>
                                        <br> 
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div> 

                    ';
                        }
                    ?>
                    
                </div>
                <!-- /.box-body -->
            </div>
            </div>
        </div>
    </div>
</section>
