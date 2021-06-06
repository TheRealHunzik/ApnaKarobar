<section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div></div>
                    <?php
                       
                                echo '
                                <div class="col-md-3">
                                    <div class="card rounded">
                                        <div class="card-image">
                                            <a href=""><img height="200"  class="img-fluid" src="'.base_url().'uploads/product/" alt="" /></a>
                                        </div>
                                        <div class="card-image-overlay m-auto">
                                            <span class="card-detail-badge"></span>
                                            <span class="card-detail-badge"></span>
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="ad-title m-auto">
                                                <h5>.</h5>
                                            </div>
                                            <div class="row-fluid">
                                                <div style="float:left"><a class="btn btn-primary" href="#">Update</a></div>
                                                <div style="float:right"><a class="btn btn-danger" href="#">Delete</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                        ';
                            
                        
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