<div class="container-fliud " style="padding-left: 100px; font-size: 20px;">
	
	<form action="<?php echo base_url();?>shop/checkOut/cash" method="POST">
		<div class="row" >
				<div class="col-md-6" style="margin-left: 200px; ">	
					<h3>Billing Address</h3>
					<div class="col">
						<div class="form-group col-md-12">
						    <label for="exampleInputEmail1"></i>Full Name</label>
						    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adnan Khan">
						   
		 				</div>
		 				<div class="form-group col-md-12">
                         <input type="hidden" class="form-control" name="amount" value="<?php echo $amount ?>" >
						    <label for="exampleInputEmail1">Email address</label>
						    <input type="nuumber" class="form-control" name="contact" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
						   
		 				</div>
		 				<div class="form-group col-md-12">
						    <label for="exampleInputEmail1">Address</label>
						    <input type="text" class="form-control" name="address" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Attock City Pakistan">
						   
		 				</div>
		 				<div class="form-group col-md-12">
						    <label for="exampleInputEmail1">City</label>
						    <input type="text" class="form-control" name="city" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Attock">
						   
		 				</div>
		 				<div class="row">
					 				<div class="form-group col-md-5" style="margin-left:10px;">
									    <label for="exampleInputEmail1">Province/State</label>
									    <input type="text" class="form-control" name="state" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Punjab">
									   
					 				</div>
					 				<div class="form-group col-md-5">
									    <label for="exampleInputEmail1">Zip</label>
									    <input type="number" class="form-control" name="zip" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="4045">
									   
					 				</div>
		 		

		 
		 				</div>
		 			</div>
					 <?php
					 var_dump($this->session->flashdata());
					 if($this->session->flashdata('error')!=''){
						 echo '<div class="alert alert-danger>'.$this->session->flashdata('error').'</div>';
					 }elseif ($this->session->flashdata('success')!='') {
						echo '<div class="alert alert-danger>'.$this->session->flashdata('success').'</div>';
					 }
					 ?>
                     <div class="col-md-10">
		 				<input type="submit" class="btn btn-primary" value="Checkout" style="width: 50%;float: right; font-size: 15px;">
		 			</div>
		 		</div>	
                 
 		</div>

			</form>
	
</div>