<br>
<div class="col-md-8">
  <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <?php 
                echo form_open('');
                foreach($product as $attr)
                {
                     echo form_label($attr->name); 
                    echo form_input($attr->name); 
                }
             ?> 
          </div>
          <!-- /.box -->
</div>
