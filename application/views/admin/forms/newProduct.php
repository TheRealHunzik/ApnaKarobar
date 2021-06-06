<section class="content">
      <div class="">
        <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                    <?php 
                    if($this->session->flashdata('error')!='')
                    {
                        echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>';
                    }elseif($this->session->flashdata('success')!=''){
                        
                        echo '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>';
                    }
                    ?> 
                    <!-- /.box-header -->
                    <!-- form start -->
                <form action="<?php echo base_url()?>admin/product/add"  id="reg-form" enctype="multipart/form-data" method="POST">
                    <div class="row" >
                        <div class="row">
                                    <div class="input-field col s6">
                                    <div class="pic-container pic-medium pic-circle">
                                        <img class="pic" id="blah" src="https://poncianodiego.github.io/portfolio/assets/img/JuanDi.jpg" alt="">
                                        <input type="file" id="imginp" name="userfile" size="20" /> 
                                    </div>
                                    </div> 
                                <div class="row">
                                    <div class="input-field col s4">
                                        <input type="text" name="productName" required>
                                        <label for="productName">Product Name</label>
                                    </div>
                                    <div class="input-field col s4">
                                        <select class="form-control select2" name="catagory_id" style="width: 100%;">
                                            <option selected disabled>Select a Catagory</option>
                                            <?php
                                                foreach($catagory as $cat)
                                                {
                                                    echo '<option value="'.$cat->catagory_id.'">'.$cat->catagory_name.'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            
                        
                        
                        
                       </div>
                        <div class="" id="repeat">
                            <div class="row" id="myrow" >
                                <div >
            
                                    <div class="input-field col s2">
                                        <input type="text" name="name[]" required>
                                        <label for="name[]">Name</label>
                                    </div>
                                    <div class="input-field col s2">
                                            <select class="form-control select2" name="datatype[]" style="width: 100%;">
                                                <option selected disabled>Data Type</option>
                                                <option value="number">Integer</option>
                                                <option value="text">varchar</option> 
                                            </select>
                                    </div>
                                    <div class="input-field col s2">
                                        <input type="number" name="length[]" required>
                                        <label for="length">length</label>
                                    </div>
                                    <div class="input-field col s2">
                                        <input type="number" name="max_size[]" required>
                                        <label for="max_size">Max Size</label>
                                    </div>
                                    <div class="input-field col s2">
                                        <input type="text" name="placeholder[]" required>
                                        <label for="placeholder">PlaceHolder</label>
                                    </div>
                                    <div class="input-field col s2">
                                            <select class="form-control select2" name="required[]" style="width: 100%;">
                                                        <option selected disabled>Required</option>
                                                        <option>True</option>
                                                        <option>False</option> 
                                            </select>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                       
                    </div>
                <div class="" style="float:right">
                            <a class="btn icon-btn btn-success" id="add" href="#">
                                <span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-success"></span>
                                Add
                            </a>
                            <a class="btn icon-btn btn-danger" id="remove" href="#">
                                <span class="glyphicon btn-glyphicon glyphicon-minus img-circle text-danger"></span>
                                Remove
                            </a>              
                </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
 
          <!-- /.box -->



<script type="" src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
<script type = "" src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js'></script>
<script>
$(".dj").click(function(){
  $(function(){
    var $row = $('.myrow').clone();
    $('#repeat').html($row);
  });
});
</script>
<br><br>
    
      

