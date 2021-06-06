 <div class="col-md-10 offset center">
<div class="table-stripede " id="orderTable" >
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>UserName</th>
                      <th>Order Date</th>
                      <th>Status</th>
                      <th>Amount</th>
                      <th>Details</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                <?php 
                    if($orders==' ') 
                    {
                      echo 'No Orders';
                    }else{
                      $id=1;
                        foreach ($orders as $order) {
                          echo 
                              '<tr id="orderinstance">
                                <td>'.$id.'</td>
                                <td>'.$order->site_title.'</td>
                                <td>'.$order->order_date.'</td>
                                <td>'.$order->status.'</td>
                                <td>'.$order->amount.'</td>
                                <td><button class="btn btn-success orderID" value="'.$order->order_id.'"  >View Detail</button></td>
                                </tr>';
                                        
                                ++$id;
                            }
                    }
                    ?>
                  
                  </tbody>
                </table>
              </div>
              
</div>
<div id="viewOrder" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">
      <img class="modal-title" src="<?php echo base_url()?>/assets/img/logo-small.png" alt="person">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" id="userOrder">
         <div class="col-md-12 row">
              <div class="col-md-6">
                    <div id="picbox">
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="row">
                      <h6><span>Site Name :   </span></h6>
                      <span id="siteName"></span>
                    </div>
                    <div class="dropdown-divider"></div>
              </div>
              <div class="col-md-6">
                    <div class="row">
                      <h6><span>Name :  </span></h6>
                      <span id="orderName"></span>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="row">
                      <h6><span>Contact No :  </span></h6>
                      <span id="ordertContact"></span>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="row">
                      <h6><span>Address :  </span></h6>
                      <span id="orderAddress"></span>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="row">
                      <h6><span>Order Date :  </span></h6>
                      <span id="orderDate"></span>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="row">
                      <h6><span>Status :  </span></h6>
                      <span id="orderstatus"></span>
                    </div>
                    <div class="row" >
                    
                      <div id="print">
                        
                      </div>
                      &nbsp &nbsp
                      <div id="track" >

                      </div>
                      
                    </div>
                    
                      
              </div>
         </div>
         <div>
            <table class="table responsive text-center">
                <thead>
                      <tr>
                        <th>Stock ID</th>
                        <th>Stock Name</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                      </tr>
                </thead>
                <tbody id="rowItems">
                      
                </tbody>
                
            </table>
         </div>
      </div>
    </div>  

  </div>
</div>
<script>
     
</script>