 <!-- DataTables Example -->
 <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Costumers</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>User ID</th>
                      <th>User Name</th>
                      <th>No of Order</th>
                      <th>Amount</th>
                      <th>Details</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                <?php 
                    
                        // foreach ($orders as $order) {
                          echo 
                              '<tr>
                              <td>121</td>
                              <td>Waqar Ali</td>
                              <td>2</td>
                              <td>4000</td>
                              <td><a class="btn btn-success" data-toggle="modal" data-target="#viewcost" style="color:white;"   >Viwe Details</a></td>
                            </tr>';
                            // }
                    
                    ?>
                  
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
        </div>
<!-- Modal -->
<div id="viewcost" class="modal fade" role="dialog" data-backdrop="false">
  <div class="modal-dialog modal-lg" >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <img class="modal-title" src="<?php echo base_url()?>/assets/img/logo-small.png" alt="person">
        <button type="button" class="close" data-dismiss="modal",><i class="fa fa-close"></i></button>
      </div>
      <div class="modal-body">
         <div class="row col-md-12">
            <label class="col-md-6">User ID :    121</label>
            <label class="col-md-6">User Name :    Waqar Ali</label>
         </div>
         <br/><br/>
         <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Order Date</th>
                      <th>Items Quantity</th>
                      <th>Amount Paid</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                <?php 
                    
                        // foreach ($orders as $order) {
                          echo 
                              '<tr>
                              <td>1</td>
                              <td>12-12-2018</td>
                              <td>5</td>
                              <td>2000</td>
                               </tr>';
                            // }
                    
                    ?>
                  
                  </tbody>
                  <tbody>
                    <?php 
                        
                            // foreach ($orders as $order) {
                              echo 
                                  '<tr>
                                  <td>22</td>
                                  <td>01-12-2018</td>
                                  <td>6</td>
                                  <td>2000</td>
                                  </tr>';
                                // }
                        
                        ?>
                      
                      </tbody>
                </table>
              </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
        
    </div>
      

  </div>
</div>