<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <img class="modal-title" src="<?php echo base_url()?>/assets/img/logo-small.png" alt="person">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
                                <div class="form-group">
                                    <div id="pb-modalreglog-progressbar"></div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group pb-modalreglog-input-group">
                                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                        <input type="text" id="fname"  class="form-control"  pattern="^[[A-Z]+[a-z]]+" title="Alphabets allowed only"   placeholder="Full Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group pb-modalreglog-input-group">
                                        <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                        <input type="email" id="email" class="form-control"  placeholder="Email">
                                    </div>
                                </div>
                        
                                <div class="form-group">
                                    <div class="input-group pb-modalreglog-input-group">
                                        <span class="input-group-addon"><span class="fa fa-lock"></span></span>
                                        <input type="password" id="password" class="form-control"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group pb-modalreglog-input-group">
                                        <span class="input-group-addon"><span class="fa fa-lock"></span></span>
                                        <input type="password" id="cpassword" class="form-control"  placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="accept_terms" value="yes">
                                    I agree with <a href="#">terms and conditions.</a>
                                </div>
                                
                               <div id="signuperror">

                               </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button  onclick="signup();"   class="btn btn-primary">Sign up</button>
                        </div>
                    </div>
      

  </div>
</div>
<!-- Modal -->
<div id="login" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <img class="modal-title" src="<?php echo base_url()?>/assets/img/logo-small.png" alt="person">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body ">
                <div class="text-center social-btn">
                    <button  class="btn btn-primary btn-block" onclick="window.location.href='<?php echo base_url()?>Auth/web_login' "><i class="fa fa-facebook"></i> Sign in with <b>Facebook</b></button>
                    <button onclick="window.location.href='<?=$google_login_url?>' " class="btn btn-danger btn-block"><i class="fa fa-google"></i> Sign in with <b>Google</b></button>
                </div>
                <div class="or-seperator"><i>or</i></div>	
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" id="loginName" name="email" placeholder="Username" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" id="loginPass" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div id="loginerror">

                </div>
                       
                   
                <div class="form-group">
                    <button  onclick="save();" class="btn btn-success btn-block login-btn">Sign in</button>
                </div>
                <div class="clearfix">
                    <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
                    <a href="#" class="pull-right text-success">Forgot Password?</a>
                </div>  
                
            <div class="hint-text small">Don't have an account? <a href="#" class="text-success">Register Now!</a></div>
        </div>


  </div>
</div>
</div>
<script>
function save(){

    var email=$('#loginName').val();
    var password=$('#loginPass').val();
    $('#loginerror').html('');
    
    $.ajax({
        url: '<?php echo base_url();?>Auth/userlogin',
        type: 'POST',
        data: {
            email: email,
            password:password
        },
        dataType: 'json', 
        success: function(data) {
            console.log(data['status']);
            if(data.status==false){
                $('#loginerror').html('<div class="alert alert-danger">'+data.message+'</div>');
            }else{
                $('#login').modal('hide');
                location.reload();
            }
            
            
           
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(errorThrown);
        }

    }); 

    
}
function signup(){
    
    var name=$('#fname').val();
    var email=$('#email').val();
    var password=$('#password').val();
    var cpassword=$('#cpassword').val();
    $('#signuperror').html(' ');
    var terms=$('#accept_terms').val();
    $.ajax({
        url: 'Auth/singUp',
        type: 'POST',
        data: {
            fname:name,
            email: email,
            password:password,
            cpassword:cpassword,
            accept_terms:terms
        },
        dataType: 'json',
        success: function(data) {
            if(data.status==false){
                $('#signuperror').html('<div class="alert alert-danger">'+data.message+'</div>');
            }else{
                $('#myModal').modal('hide');
                location.reload();
            }
                
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert("some error");
        }

    }); 


}
</script>
<?php
print str_pad('',4096)."\n";
ob_flush();
flush();
set_time_limit(45);
?>