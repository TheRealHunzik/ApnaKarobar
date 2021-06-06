
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
            </li>
            <li class="breadcrumb-item active">Add Stock</li>
          </ol>

          <!-- Icon Cards-->
            
          <div class="col-md-12" >
            <?php
            if($this->session->flashdata('error')!='')
            {
                echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>';
            }elseif ($this->session->flashdata('success')!='') {
                echo '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>';
            }
            ?> 
            <form action="<?php echo base_url()?>seller/addStock"  enctype="multipart/form-data" method="POST">
            
            <div class="row">
                <div class="col-md-6">
                        <div class="form-group">
                            <img class="pic" id="blah" src="<?php echo base_url();?>uploads/product/laptop.jpg" height="200" width="200" src="" alt="Your image here">
                            <input type="file" onchange="readURL(this);" name="userfile" size="20" /> 
                        </div>
                        <div>
                        <textarea name="stockDes" id="" cols="50" rows="3">Add Some Desciption</textarea>
                        </div>
                       <div class="row">
                        <div class="form-group col-md-3">
                                <label for="id">price</label>
                                <input type="text" class="form-control" name="price"  >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="id">Discount</label>
                                <input type="text" class="form-control" name="discount"   >
                            </div>
                       </div>
                        
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $product_id;?>" readonly >
                    </div>
                      <?php
                      foreach($product as $attr)
                      {
                          echo '<div class="form-group">';
                          echo '<label for="'.$attr->productmeta_id.'">'.$attr->name.'</label>';
                          echo '<input type="'.$attr->datatype.'" class="form-control"  name="'.$attr->productmeta_id.'" max_size="'.$attr->max_size.'" required="'.$attr->required.'" placeholder="'.$attr->placedolder.'"/>';    
                          echo '</div>';
                        }
                      ?>
                </div>
                
            </div>
               <button type="submit" style="float:right; margin-bottom:10px;" class="btn btn-primary">Add New</button>
              
               </form>
          </div>
          <!-- Area Chart Example-->
<script>
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

</script>
