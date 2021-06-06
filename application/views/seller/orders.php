 <!-- DataTables Example -->
 <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Orders</div>
            <div class="card-body" >
              <div class="table-responsive" id="sellerTable"  >
                <table class="table table-bordered"  id="dataTable"  width="100%" cellspacing="0">
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
                        foreach ($orders as $order) {
                          echo 
                              '<tr>
                              <td>'.$order->order_id.'</td>
                              <td>'.$order->user_name.'</td>
                              <td>'.$order->order_date.'</td>
                              <td>'.$order->status.'</td>
                              <td>'.$order->amount.'</td>
                              <td><button onclick="myFunction('.$order->order_id.');" class="btn btn-success sellerView"  value="'.$order->order_id.'"  >View Detail</button></td>
                              </tr>';
                            }
                    }
                    ?>       
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
        </div>
<!-- Modal -->
<div id="viewOrder" class="modal fade" data-backdrop="false" role="dialog" >
  <div class="modal-dialog modal-lg" style="
    margin-top: 0px;">

    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">
      <img class="modal-title" src="<?php echo base_url()?>/assets/img/logo-small.png" style="padding-right: 17px;
    display: block;
    padding-top: 0px;" alt="person">
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
                    <div class="row" id="deliver">
                      
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
<div id="deliveryDetail" class="modal fade" data-backdrop="false" role="dialog" >
  <div class="modal-dialog modal-lg" style="
    margin-top: 0px;">

    <div class="modal-content" >
      <div class="modal-header">
      <img class="modal-title" src="<?php echo base_url()?>/assets/img/logo-small.png" style="padding-right: 17px;
    display: block;
    padding-top: 0px;" alt="person">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" id="userOrder">
         <div class="col-md-12">
           <div class="form-group">
              <label for="cname">Name</label>
              <input type="text" class="form-control" id="cname" >
           </div>
           <div class="form-group">
              <label for="disDate">Dispatched Date</label>
              <input type="date" class="form-control"  id="disDate" >
           </div>
           <div class="form-group">
              <label for="delDate">Delivery Date</label>
              <input type="date" class="form-control" id="delDate" >
           </div>
           <div class="form-group">
              <label for="conNo">Consitment ID</label>
              <input type="text" class="form-control" id="conNo" >
           </div>
           <div id="deliveryError">
           </div>
           <div class="form-group">
             <input type="hidden" id="deliveryButton">
              <button onclick="savedelivery();" style="float:right;"  class="btn btn-primary">Add Detaiis</button>
           </div>
          </div>
      </div>
    </div>  

  </div>
</div>
<script>

function myFunction(id) {
        $('#viewOrder').modal('show');
        $('#picbox').html('');
        $('#siteName').html('');
        $('#orderName').html('');
        $('#ordertContact').html('');
        $('#orderAddress').html('');
        $('#orderDate').html('');
        $('#orderstatus').html('');
        $("#rowItems").html('');
        
        $.ajax({
            url: '<?php echo base_url(); ?>shop/getOrderByID',
            type: 'POST',
            data: {
                orderID: id
            },
            dataType: 'json', 
            success: function(data) {
            var details=data['orderDetails'];
            var items=data['orderItems'];
            console.log(items);
            details.forEach(element => {
                $('#picbox').prepend('<img height="200" width="200" src="http://localhost/fyp/uploads/logos/'+element.site_logo+'" />');
                $('#siteName').html(element.site_title);
                $('#orderName').html(element.user_name);
                $('#ordertContact').html(element.user_phone);
                $('#orderAddress').html(element.order_addtress);
                $('#orderDate').html(element.order_date);
                $('#orderstatus').html(element.status);
                $('#deliveryButton').val(element.order_id);
                if(element.status=='pending')
                {
                  $('#deliver').html('<button onclick="delivery();" class="btn btn-primary">Deliver Order</button>');
                }else if(element.status=='dispatched'){
                  $('#deliver').html('<button onclick="" class="btn btn-success">Track Order</button>');
                
                }
            });

            var id=1;
            items.forEach(element => {
                
                var name=element.stock_des;
                var price=element.stock_price;
                var amount=element.amount;
                var quantity=element.quantity;
                var row= [
                '<tr>',
                    '<td>'+id+'</td>',
                    '<td>'+name+'</td>',
                    '<td>'+price+'</td>',
                    '<td>'+quantity+'</td>',
                    '<td>'+amount+'</td>',
                '</tr>'
                ].join(' ');
                $("#rowItems").append(row);
                id=parseInt(id)+1;
            });
            
            
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(errorThrown);
            }

        }); 
}
function delivery() {
    $('#viewOrder').modal('hide');
    $('#deliveryDetail').modal('show');
  
}
function savedelivery() {
  var cname=$('#cname').val();
  var disDate=$('#disDate').val();
  var delDate=$('#delDate').val();
  var conNo=$('#conNo').val();
  var orderID=$('#deliveryButton').val();
  $('#deliveryError').html('');
  $.ajax({
            url: '<?php echo base_url(); ?>shop/delivery',
            type: 'POST',
            data: {
                orderID:orderID,
                cname:cname,
                disDate:disDate,
                delDate:delDate,
                conNo:conNo
            },
            dataType: 'json', 
            success: function(data) {
              if(data.status==false)
              {
                $('#deliveryError').html(' <div class="alert alert-danger">'+data.message+'</div> ');
              }else{
                $('#deliveryDetail').modal('hide');
                location.reload();
              }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(errorThrown);
            }

        });
}
</script>