<section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div></div>
                    <?php
                        $j=count($products);
                        for ($i=0; $i <$j ; $i++) { 
                            foreach($products[$i] as $product){
                                echo '
                                <div class="col-md-3">
                                    <div class="card rounded">
                                        <div class="card-image">
                                            <a href=""><img height="200" width="200"   src="'.base_url().'uploads/product/'.$product->product_pic.'" alt="'.$product->product_description.'" /></a>
                                        </div>
                                        <div class="card-image-overlay m-auto">
                                        <div class="ad-title m-auto text-center">
                                                <h5>'.$product->product_description.'.</h5>
                                            </div>
                                           
                                        <div class="card-body text-center">
                                        <span class="card-detail-badge">'.$product->catagory.'</span>
                                        <div class="row-fluid" style="">
                                                <div ><a class="btn btn-primary" href="#">Update</a></div>
                                                <br>
                                            </div>
                                        </div>
                                        </div>
                                            
                                    </div>
                                </div>
        
                        ';
                            }
                        }
                    ?>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>