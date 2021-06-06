<br>
<div class="col-md-8">
  <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              
            <form class="col s12" action = "<?php echo base_url()?>admin/catagory/add" enctype="multipart/form-data" id="reg-form" method="POST">
                  <div class="row">
                            <div class="input-field col s6">
                              <div class="pic-container pic-medium pic-circle">
                                <img class="pic" id="blah" src="https://poncianodiego.github.io/portfolio/assets/img/JuanDi.jpg" alt="">
                                <input type="file" id="imginp" name="userfile" size="20" /> 
                              </div>
                            </div>
                        <div class="row">
                            <div class="input-field col s6">
                            <input type="text" name="catagory" required>
                            <label for="catagory">Catagory Name</label>
                            </div>
                            <div class="input-field col s6">
                              <input type="text" name="catdesc" required>
                              <label for="catdesc">Catagory Description</label>
                            </div>
                        </div>
                    </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
</div>


      
  <script type="" src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
<script type = "" src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js'></script>
<br><br>
    


    