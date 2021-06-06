<div class="container-fliud " style="padding-left: 100px; font-size: 20px;">
	
	<form action="<?php echo base_url();?>shop/checkOut" method="POST">
		<div class="row" >
				<div class="col-md-4" style="margin-left: 100px; ">	
					<h3>Billing Address</h3>
					<div class="col">
						<div class="form-group col-md-12">
						    <label for="exampleInputEmail1"><i class="fa fa-user"></i>Full Name</label>
						    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adnan Khan">
						   
		 				</div>
		 				<div class="form-group col-md-12">
						    <label for="exampleInputEmail1"><i class="fa fa-envelope"></i>Email address</label>
						    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
						   
		 				</div>
		 				<div class="form-group col-md-12">
						    <label for="exampleInputEmail1"><i class="fa fa-address-card"></i>Address</label>
						    <input type="text" class="form-control" name="address" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Attock City Pakistan">
						   
		 				</div>
		 				<div class="form-group col-md-12">
						    <label for="exampleInputEmail1"><i class="fa fa-city"></i>City</label>
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

		 		</div>	
		 		<div class="col-md-5" style="margin-right: 100px; ">	
					<h3>Payment</h3>
					<div class="col">
						<div class="form-group col-md-10">
							<label>Card Accepted</label>
						    <div class="icon-container">
				              <i class="fa fa-cc-visa" style="color:navy;"></i>
				              <i class="fa fa-cc-amex" style="color:blue;"></i>
				              <i class="fa fa-cc-mastercard" style="color:red;"></i>
				              <i class="fa fa-cc-discover" style="color:orange;"></i>
				            </div>
						   
						   
		 				</div>
		 				<div class="form-group col-md-10">
						    <label for="exampleInputEmail1">Name on Card</label>
						    <input type="text" class="form-control" name="card_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ADNAN KHAN">
						   
		 				</div>
		 				<div class="form-group col-md-10">
						    <label for="exampleInputEmail1">Card Number</label>
						    <input type="number" class="form-control" min="0" name="card_number" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="1111-2222-3333-4444">
						   
		 				</div>
		 				<div class="form-group col-md-10">
		 					<label for="exampleInputEmail1">Exp Month</label>
						    <div>
							    <select class="form-control" name="card_exp_month" id='gMonth2'>
							    <option value=''>--Select Month--</option>
							    <option value='1'>Janaury</option>
							    <option value='2'>February</option>
							    <option value='3'>March</option>
							    <option value='4'>April</option>
							    <option value='5'>May</option>
							    <option value='6'>June</option>
							    <option value='7'>July</option>
							    <option value='8'>August</option>
							    <option value='9'>September</option>
							    <option value='10'>October</option>
							    <option value='11'>November</option>
							    <option value='12'>December</option>
							    </select> 
							    </div>

							<div/>
						   
		 				</div>
		 				<div class="row col-md-10" style="margin-top: 30px;">
					 				<div class="form-group col-md-6">
									    <label for="exampleInputEmail1">Exp Year</label>
									    <input type="number" name="car_exp_year" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  min="2018" max="2025" value="2018">
									   
					 				</div>
					 				<div class="form-group col-md-5"">
									    <label for="exampleInputEmail1">CVV</label>
									    <input type="number" name="card_cvv" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="404">
									   
					 				</div>
		 		

		 
		 				</div>
		 			</div>
		 			<div class="col-md-10">
		 			<input type="submit" class="btn btn-primary" value="Checkout" style="width: 50%;float: right; font-size: 15px;">
		 			</div>

		 		</div>

 		</div>

			</form>
	
</div>