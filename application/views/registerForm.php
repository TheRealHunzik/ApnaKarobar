<div id="siteRegister" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" style="height:500px; width:700px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <img class="modal-title" src="<?php echo base_url()?>/assets/img/logo-small.png" alt="person">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body ">
      <form action="<?php echo base_url()?>shop/site/create" method="POST" enctype="multipart/form-data">
                <div class="wizards">
                    <div class="progressbar">
                        <div class="progress-line" data-now-value="12.11" data-number-of-steps="5" style="width: 12.11%;"></div> <!-- 19.66% -->
                    </div>
                    <div class="form-wizard active">
                        <div class="wizard-icon"><i class="fa fa-file-text-o"></i></div>
                        <p>Identity</p>
                    </div>
                    <div class="form-wizard">
                        <div class="wizard-icon"><i class="fa fa-user"></i></div>
                        <p>Apperance</p>
                    </div>
                    <div class="form-wizard">
                        <div class="wizard-icon"><i class="fa fa-key"></i></div>
                        <p>Contact</p>
                    </div>
                    <div class="form-wizard">
                        <div class="wizard-icon"><i class="fa fa-file-text-o"></i></div>
                        <p>license</p>
                    </div>
                    <div class="form-wizard">
                        <div class="wizard-icon"><i class="fa fa-check-circle"></i></div>
                        <p>Finish</p>
                    </div>
                </div>
                <fieldset class="registerform">
                <div class="container-fluid" style="Display:inline-flex;">
                    
                    <div class="col-md-6">
                    <br/><br/>
                             <div class="form-group">
                                    <div class="input-group pb-modalreglog-input-group">
                                        <span class="input-group-addon"><span class="fa fa-globe"></span></span>
                                        <input type="text" name="name" class="form-control" id="inputEmail" placeholder="Site Name">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <div class="input-group pb-modalreglog-input-group">
                                        <span class="input-group-addon"><span class="fa fa-bullhorn"></span></span>
                                        <input type="text" name="slogan" class="form-control" id="inputEmail" placeholder="Site Slogan">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group pb-modalreglog-input-group">
                                        <span class="input-group-addon"><span class="fa fa-list-alt"></span></span>
                                        <select class="form-control" name="catagory" >
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
                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label"></label>
                                <div class="input-field col s6">
                              <div class="form-group" >
                                    <img  id="blah" src="<?php echo base_url()?>uploads/logos/mock.jpg" height="160" width="200" alt="">
                                    <input type="file" onchange="readURL(this);" name="userfile"  /> 
                              </div>
                            </div>
                        </div>

                    </div>
                </div>
                    <div class="wizard-buttons">
                        <button type="button" class="btn btn-next">Next</button>
                    </div>
                </fieldset>
                <fieldset class="registerform">
                    <br/> <br/>
                    <div class="row" style="margim: 20 0 0 40">
                    <?php
                            foreach($theme as $the)
                            {
                                echo '
                                <label style="margin : 15px;">
                                <input " type="radio" name="theme" value="'.$the->theme_id.'" >
                                <img height="150" width="200"  src="'.base_url().'uploads/theme/'.$the->theme_pic.'">
                                
                                </label>
                                ';
                            }
                            ?>
                            </div>
                        <div class="wizard-buttons">
                        <button type="button" class="btn btn-previous">Previous</button>
                        <button type="button" class="btn btn-next">Next</button>
                        </div>
                </fieldset>
                <fieldset class="registerform">
                    <br/> <br/>
                    <div class="form-group">
                                    <div class="input-group pb-modalreglog-input-group">
                                        <span class="input-group-addon"><span class="fa fa-mobile"></span></span>
                                        <input type="number" name="mobile" class="form-control" id="inputEmail" placeholder="Mobile">
                                    </div>
                    </div>
                    <div class="form-group"> 
                                    <div class="input-group pb-modalreglog-input-group">
                                        <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                    </div>
                    <div class="row" style="margin-left:0px;">
                                <div class="form-group">
                                    <div class="input-group pb-modalreglog-input-group">
                                        <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                        <textarea type="text" name="latitude" rows="1" class="form-control" id="latitude" placeholder="Latitude"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group pb-modalreglog-input-group">
                                        <span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
                                        <textarea type="text" name="longitude" rows="1" class="form-control" id="longitude" placeholder="Longitude"></textarea>
                                        <button onclick="getLocation()" class="btn btn-primary">Find Me</button>
                                    </div>
                                </div>
                       
                    </div>
                    <div class="wizard-buttons">
                        <button type="button" class="btn btn-previous">Previous</button>
                        <button type="button" class="btn btn-next">Next</button>
                    </div>
                </fieldset>
                <fieldset class="registerform">
                    <iframe src="license.txt" readonly style=" height:170px; width:100%; "></iframe>
                    <div class="form-group">
                        <input type="checkbox" id="ch" name="chs">
                        I agree with <a href="#">terms and conditions.</a>
                        </div>
                                
                        
                            <!-- <label class="checkbox" class="">
                                <input type="checkbox"> Check me out
                            </label> -->
                        
                    <span>
                    
                        <div class="wizard-buttons">
                            <button type="button" class="btn btn-previous">Previous</button>
                            <button type="button" class="btn btn-next">Next</button>
                        </div>
                    </span>
                
                    
                </fieldset>
                <fieldset class="registerform">
                    <br/>
                    <h1>CONG0!! </h1>
                    <p>Please!! go to  to verify your email </p>
                    <br/>
                    <br/><br/>
                    <br/><br/>
                    <div class="wizard-buttons">
                        <button type="button" class="btn btn-previous">Previous</button>
                        <button type="submit"  class="btn btn-primary btn-submit">Submit</button>
                    </div>
                </fieldset>
                </form>               
      </div>


  </div>
</div>
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