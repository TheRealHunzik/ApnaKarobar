<br>
<div class="col-xs-10 col-md-offset-0 col-md-12">
    
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
              <form class="col s12" action = "<?php echo base_url()?>admin/user/add" id="reg-form" method="POST">
            <div class="row">
                    <div class="input-field col s6">
                      <div class="pic-container pic-medium pic-circle">
              <img class="pic" src="https://poncianodiego.github.io/portfolio/assets/img/JuanDi.jpg" alt="">
            <input type="file"> 
            </div>
            </div>
                <div class="row">
                    <div class="input-field col s6">
                      <input type="text" name="fname" required>
                      <label for="fname">First Name</label>
                    </div>
                    <div class="input-field col s6">
                      <input type="text" name="lname" required>
                      <label for="lname">Last Name</label>
                    </div>
                  </div> 
                  <div class="row">
                    <div class="input-field col s6">
                      <input type="email" name="email" required>
                      <label for="email">Email</label>
                    </div>
                    <div class="input-field col s6">
                    <input type="password" name="password" required>
                    <label for="pass">Password</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                      <input type="number" name="contact" required>
                      <label for="pno">Phone Number</label>
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
<br><br>
    
      


    