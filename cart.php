<?php
require('config/environtment.php');
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Gadget Good | CART</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<?php include 'header.php' ?>
	<main class="vh-100">
		<div class="container my-5">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8" id="cart_msg">
					<!--Cart Message--> 
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row">
				<div class="col-md-8 mx-auto">
					<div class="panel panel-primary">
						<div class="panel-heading">Cart Checkout</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-2 col-xs-2"><b>Action</b></div>
								<div class="col-md-2 col-xs-2"><b>Product Image</b></div>
								<div class="col-md-2 col-xs-2"><b>Product Name</b></div>
								<div class="col-md-2 col-xs-2"><b>Quantity</b></div>
								<div class="col-md-2 col-xs-2"><b>Product Price</b></div>
								<div class="col-md-2 col-xs-2"><b>Price in <?php echo CURRENCY; ?></b></div>
							</div>
							<div id="cart_checkout"></div>
						</div> 
					</div>
				</div>
			</div>
		</div>
	</main>
	<footer class="bg-light py-3">
		<div class="container">
			<p class="text-center">
				&copy; Gadget Good 2023. All rights reserved.
			</p>
		</div>
	</footer>
<script>var CURRENCY = '<?php echo CURRENCY; ?>';</script>
</body>	
</html>
















		