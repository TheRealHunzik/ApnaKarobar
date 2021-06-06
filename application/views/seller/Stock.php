
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
            </li>
            <li class="breadcrumb-item active">Stock</li>
          </ol>

          <!-- Icon Cards-->
          <a href="<?php echo base_url();?>seller/allproducts/" class="btn btn-primary">ADD STOCK</a>
          <br/> <br/>
          <?php
          if($this->session->flashdata('error')!='')
          {
              echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>';
          }elseif ($this->session->flashdata('success')!='') {
            echo '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>';
          }
          ?> <br/>
          <div class="box-body">
                
              <div class="row">
               
                <?php
                            foreach($product as $products){
                                if($products->quantity==0)
                                {
                                    $quantity='Out Of Stock';
                                }
                                else{
                                    $quantity=$products->quantity;
                                }
                                echo '
                                <div class="col-md-3">
                                    <div class="card rounded" style="margin-bottom:20px;">
                                        <div class="card-image text-center">
                                            <img height="200" width="200" src="'.base_url().'uploads/stock/'.$products->stock_pic.'" alt="'.$products->stock_des.'" />
                                        </div>
                                        <div class="card-image-overlay m-auto">
                                            <span class="card-detail-badge"></span>
                                            <span class="card-detail-badge"></span>
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="ad-title m-auto">
                                                <h6>'.substr($products->stock_des, 0, 25).'.</h6>
                                                <p>Abailable Stock : '.$quantity.'.</p>
                                            </div>
                                            <button onclick="getdata('.$products->stock_id.');" class="btn btn-primary" >UPDATE</button>
                                            <a class="btn btn-danger" href="'.base_url().'/seller/addproduct/?product_id='.$products->stock_id.'">DELETE</a>
                                        </div>
                                    </div>
                                </div>
        
                        ';
                            }
                        
                    
                ?>
              </div>
              
          </div>
          
        <!-- Modal -->
        <div id="updateStock" class="modal fade" data-backdrop="false" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                <img class="modal-title" src="<?php echo base_url()?>/assets/img/logo-small.png" >
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body row">
                    <div class="col-md-6">
                        <div class="form-group" id="pic">
                            
                        </div>
                        <div class="form-group">
                            <label for="stock_des">Stock Description</label>
                            <textarea name="stock_des" id="stock_des" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="stock_discount">Stock Price</label>
                            <input type="number" class="form-control" name="stock_price" id="stock_price">
                        </div>
                        <div class="form-group">
                            <label for="stock_discount">Stock Discount</label>
                            <input type="number" class="form-control" name="stock_discount" id="stock_discount">
                        </div>
                        <div class="form-group">
                            <label for="stock_price">Stock Quantity</label>
                            <input type="number" class="form-control" name="stock_quantity" id="stock_quantity">
                        </div>

                    </div>
                    <div class="col-md-12" id="updateerror">
                            
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="updateButton" onclick="update()" class="btn btn-primary" >update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>

            </div>
        </div>
<script>
function getdata(id) {
        $('#updateStock').modal('show');
        $.ajax({
          url: '<?php echo base_url();?>shop/getStockDetail',
          type: 'POST',
          data: {
            stock_id: id
          },
          dataType: 'json', 
          success: function(data) {
            data.forEach(element => {
                $('#pic').html('<img src="http://localhost/fyp/uploads/stock/'+element.stock_pic+'" height="150" width="150">');
                $('#stock_des').val(element.stock_des);
                $('#stock_price').val(element.stock_price);
                $('#stock_discount').val(element.stock_dis);
                $('#stock_quantity').val(element.quantity);
                $('#updateButton').val(element.stock_id);
                
            });
            
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
              console.log(errorThrown);
          }

      }); 
      
}
function update()
{
    
    stock_id=$('#updateButton').val();
    stock_des=$('#stock_des').val();
    $('#updateerror').html('');
    stock_price=$('#stock_price').val();
    stock_discount=$('#stock_discount').val();
    stock_quantity=$('#stock_quantity').val();
    $.ajax({
          url: '<?php echo base_url();?>shop/updateStock',
          type: 'POST',
          data: {
            stock_id:stock_id,
            stock_des: stock_des,
            stock_price:stock_price,
            stock_discount:stock_discount,
            stock_quantity:stock_quantity
          },
          dataType: 'json', 
          success: function(data) {
            if(data.status==false){
                $('#updateerror').html('<div class="alert alert-danger">'+data.message+'</div>');
            }else{
                $('#updateStock').modal('hide');
                location.reload();
            }
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
              console.log(errorThrown);
          }

      }); 
}
</script>
         