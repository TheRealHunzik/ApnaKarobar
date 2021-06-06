<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="<?php echo  base_url()?>assets/compare/css/costum.css"> <!-- CSS costum -->
	<link rel="stylesheet" href="<?php echo  base_url()?>assets/compare/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/compare/css/style.css"> <!-- Resource style -->
  	
	<title>Products Comparison Table | CodyHouse</title>
</head>
<body>
	<section class="cd-products-comparison-table" >
		<div class="cd-products-table">
			<div class="features">
				<div class="top-info" id="propic" align="center">
					<button type="button" class="btn btn-info btn-sm" id="prod_detail" ><img src="<?php echo base_url();?>assets/compare/img/add.png" alt=""></button>
				</div>
				<ul class="cd-features-list" id="attrlist">
				</ul>
			</div> <!-- .features -->
			
				<div class="cd-products-wrapper" >
					<ul class="cd-products-columns"  >
						
							<li class="product" id="NewForm">
								<div class="top-info" id="picbox1">
									<button type="button" class="btn btn-info btn-sm" id="item_detail1" ><img src="<?php echo base_url();?>assets/compare/img/add1.png" alt=""></button>
								</div> <!-- .top-info -->

								<ul class="cd-features-list" id="valuelist1">
									
								</ul>
							</li>
							<li class="product" id="NewForm">
								<div class="top-info" id="picbox2">
									<button type="button" class="btn btn-info btn-sm" id="item_detail2" ><img src="<?php echo base_url();?>assets/compare/img/add1.png" alt=""></button>
								</div> <!-- .top-info -->

								<ul class="cd-features-list" id="valuelist2">
									
								</ul>
							</li>
							<li class="product" id="NewForm">
								<div class="top-info" id="picbox3">
									<button type="button" class="btn btn-info btn-sm" id="item_detail3" ><img src="<?php echo base_url();?>assets/compare/img/add1.png" alt=""></button>
								</div> <!-- .top-info -->

								<ul class="cd-features-list" id="valuelist3">
									
								</ul>
							</li>
						 <!-- .product -->
						<!-- <li class="product" >
							<div class="top-info">
								<input type="button" class="btn btn-success btn-lg" id="additem" value="MORE ITEMS" >
							</div>
							<div class="top-info">
								<input type="button" class="btn btn-danger btn-lg" id="removeitem" value="REMOVE" >
							</div> 
						</li>  -->

						
					</ul> <!-- .cd-products-columns -->
					
				</div> <!-- .cd-products-wrapper -->
			
			
			<!-- <ul class="cd-table-navigation">
				<li><a href="#0" class="prev inactive">Prev</a></li>
				<li><a href="#0" class="next">Next</a></li>
			</ul> -->
		</div> <!-- .cd-products-table -->
	</section> <!-- .cd-products-comparison-table -->
	<?php include 'compareModal.php'; ?>
	<script src="<?php echo  base_url()?>assets/compare/js/jquery-2.1.4.js"></script>
	<script src="<?php echo  base_url()?>assets/compare/js/main.js"></script> <!-- Resource jQuery -->

	<script src="<?php echo  base_url()?>assets/compare/js/costum.js"></script> <!-- Resource jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
</html>