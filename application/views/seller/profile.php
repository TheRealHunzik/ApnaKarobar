
<div class="card-header">
              <i class="fas fa-user"></i>
              Profile</div>
          

<form action="<?php echo base_url()?>Seller/updateProfile" method="POST" > 
	<div class="row container">
        <div class="container col-md-4 ">
            <div class="form-group col-md-6">
                <img heigth="200" width="200" id="blah" src="<?php echo base_url().'uploads/logos/'.$site[0]->site_logo;?>" alt="">
                <input  type="file" onchange="readURL(this);"  value="CHANGE logo" >
            </div>
           
            
        </div>
        <div class="row container col-md-8 ">
            <div class="form-group col-md-6">
                <label>Site Id</label>
                <input name="site_id" type="Number" value="<?php echo $site[0]->site_id; ?>" readonly class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Site Name</label>
                <input name="name" type="text" value="<?php echo $site[0]->site_title; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>	
            <div class="form-group col-md-6">
                <label>Catagory Name</label>
                <input type="text" readonly value="<?php echo $site[0]->catagory_name; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Contact Number</label>
                <input name="mobile" type="Number" value="<?php echo $site[0]->site_mobile; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>	
            <div class="form-group col-md-6">
                <label>Slogan</label>
                <input name="slogan" type="text" value="<?php echo $site[0]->site_slogan; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" type="email" value="<?php echo $site[0]->site_email; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>	
            <div class="form-group col-md-6">
                <label>User Name</label>
                <input type="text" value="<?php echo $site[0]->user_name; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group col-md-6">
                    <label>Theme Name</label>
                    <select name="theme" id="" class="form-control">
                        <?php
                            foreach($theme as $themes)
                            {
                                if($themes->theme_id==$site[0]->theme_id)
                                {
                                    echo '<option selected value="'.$themes->theme_id.'">'.$themes->theme_name.'</option>';
                                }else{
                                    echo '<option value="'.$themes->theme_id.'">'.$themes->theme_name.'</option>';
                                }
                            }
                        ?>
                    </select>
                        
            </div>
        </div>
        <div class="form-group col-md-6">
                  <?php
                    if($this->session->flashdata('error')!='')
                    {
                        echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>';
                    }elseif($this->session->flashdata('success')!=''){
                        echo '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>';
                    }
                  ?>  
        </div>
        <div class="col-md-12 " >
            <button style="float:right;" type="submit" class="btn btn-success">UPDATE</button>
        </div>
        <br> <br>
        
    </div>
</form>
<script type="text/javascript">
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