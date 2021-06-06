<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary" >
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
            <div class="col-md-7">
              <div class="row">
              <form class="col s12" action = "<?php echo base_url()?>admin/site/add" id="reg-form" enctype="multipart/form-data" method="POST">
                  <div class="row">
                              <div class="input-field col s6">
                                <div class="pic-container pic-medium pic-circle">
                                  <img class="pic" id="blah" src="https://poncianodiego.github.io/portfolio/assets/img/JuanDi.jpg" alt="">
                                  <input type="file"  id="imginp" name="userfile" size="20" /> 
                                </div>
                              </div>
                          <div class="row">
                              <div class="input-field col s6">
                                <input type="text" name="name" required>
                                <label for="name">Site Title</label>
                              </div>
                              <div class="input-field col s6">
                                <input type="text" name="slogan" required>
                                <label for="slogan">Site Slogan</label>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                              <div class="input-field col s6">
                                <select class="form-control select2" name="user_id" style="width: 100%;">
                                        <option selected disabled>Select a User</option>
                                        <?php
                                          foreach($users as $user)
                                          {
                                            echo '<option value="'.$user->user_id.'">'.$user->user_name.'</option>';
                                          } ?>
                                        
                                </select>
                            </div>
                            <div class="input-field col s6">
                                <select class="form-control select2" name="catagory" style="width: 100%;">
                                    <option selected disabled>Select a Catagory</option>
                                    <?php
                                    foreach($catagory as $cat)
                                    {
                                      var_dump($theme);

                                      echo '<option value="'.$cat->catagory_id.'">'.$cat->catagory_name.'</option>';
                                    } ?>
                                </select>
                            </div>
                            
                      </div>
                      <div class="row">
                            <div class="input-field col s6">
                                <select class="form-control select2" name="theme" style="width: 100%;">
                                        <option selected disabled>Select a Theme</option>
                                        <?php
                                          foreach($theme as $themes)
                                          {
                                            echo '<option value="'.$themes->theme_id.'">'.$themes->theme_name.'</option>';
                                          } ?>
                                        
                                </select>
                            </div>
                        <div class="input-field col s6">
                          <input type="number" name="mobile" required>
                          <label for="mobile">Mobile No</label>
                        </div>
                        
                      </div>
                      <div class="row">
                      <div class="input-field col s6">
                          <input type="email" name="email" required>
                          <label for="email">Email</label>
                        </div>               
                        <div class="input-field col s3">
                        <input type="number" name="latitude" required>
                        <label for="latitude">Latituder</label>
                        </div>
                        <div class="input-field col s3">
                        <input type="number" name="longitude" required>
                        <label for="longitude">Longitude</label>
                        </div>
                        
                      </div>
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
              </form>
            </div>
          </div>
          </div>
        </div>
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
   

<script type="" src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
<script type = "" src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js'></script>
<br><br>
    
      


    