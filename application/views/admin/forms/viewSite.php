<section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
                        <div class="box-header">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_length" id="example1_length">
                                    <label>Show 
                                    <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    </select> entries</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div id="example1_filter" class="dataTables_filter">
                                    <label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                        <?php
                            
                                foreach($site as $sites){
                                    echo '
                                    <div class="col-md-3" style="margin:20px;">
                                        <div class="card rounded">
                                            <div class="card-image">
                                            <a class="ad-btn" href="'.base_url().'shop/viewSite/?id='.$sites->site_id.'"><img  width="200" height="200"   src="'.base_url().'uploads/logos/'.$sites->site_logo.'" /></a>
                                                
                                            </div>
                                            <div class="card-image-overlay m-auto text-center">
                                                <h5>'.$sites->site_title.'.</h5>
                                                
                                            </div>
                                            <div class="card-body text-center">
                                                <div class="ad-title m-auto">
                                                    <span class="card-detail-badge">'.$sites->Catagory.'</span>
                                                </div>
                                                
                                                        <div ><a class="btn btn-primary" href="#">Update</a></div>
                                                        <br>
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
