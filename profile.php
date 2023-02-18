<?php
require "config/environtment.php";
include 'db.php';
session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Gadget Good | Profile</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		@media screen and (max-width:480px) {
			#search {
				width: 80%;
			}

			#search_btn {
				width: 30%;
				float: right;
				margin-top: -32px;
				margin-right: 10px;
			}
		}
	</style>
</head>

<body>
	<?php include 'header.php'?>
	<main>
		<div class="container my-5 min-vh-100">
			<div class="row">
				<div class="col-lg-3 mb-3">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">My Account</h5>
							<hr>
							<div class="list-group list-group-flush">
								<a href="cart.php" class="list-group-item list-group-item-action">Cart</a>
								<a href="customer_order.php" class="list-group-item list-group-item-action">Orders</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Profile Information</h5>
							<hr>
							<form>
								<?php
									$product_query = "SELECT * FROM user_info WHERE user_id = ".$_SESSION['uid'];
									$run_query = mysqli_query($con,$product_query) or die(mysqli_error($con));
									if(mysqli_num_rows($run_query) > 0){
										while($row = mysqli_fetch_array($run_query)){
								?>
								<div class="mb-3">
									<label for="name" class="form-label">Name</label>
									<input type="text" class="form-control" id="name" value="<?php echo $row['first_name'].' '.$row['last_name'];?>">
								</div>
								<div class="mb-3">
									<label for="email" class="form-label">Email</label>
									<input type="email" class="form-control" id="email" value="<?php echo $row['email'];?>">
								</div>
								<div class="mb-3">
									<label for="phone" class="form-label">Phone</label>
									<input type="tel" class="form-control" id="phone" value="<?php echo $row['mobile'];?>">
								</div>
								<div class="mb-3">
									<label for="address" class="form-label">Address</label>
									<textarea class="form-control" id="address"
										rows="3"><?php echo $row['address1'];?></textarea>
								</div>
								<div class="mb-3">
									<label for="address" class="form-label">Address 2</label>
									<textarea class="form-control" id="address"
										rows="3"><?php echo $row['address2'];?></textarea>
								</div>
								<?php
										}
									}
								?>
								
								<button type="submit" class="btn btn-success">Save Changes</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-9" style="display: none;">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Profile Information</h5>
							<hr>
							<form>
								<?php
									$product_query = "SELECT * FROM user_info WHERE user_id = ".$_SESSION['uid'];
									$run_query = mysqli_query($con,$product_query) or die(mysqli_error($con));
									if(mysqli_num_rows($run_query) > 0){
										while($row = mysqli_fetch_array($run_query)){
								?>
								<div class="mb-3">
									<label for="name" class="form-label">Name</label>
									<input type="text" class="form-control" id="name" value="<?php echo $row['first_name'].' '.$row['last_name'];?>">
								</div>
								<div class="mb-3">
									<label for="email" class="form-label">Email</label>
									<input type="email" class="form-control" id="email" value="<?php echo $row['email'];?>">
								</div>
								<div class="mb-3">
									<label for="phone" class="form-label">Phone</label>
									<input type="tel" class="form-control" id="phone" value="<?php echo $row['mobile'];?>">
								</div>
								<div class="mb-3">
									<label for="address" class="form-label">Address</label>
									<textarea class="form-control" id="address"
										rows="3"><?php echo $row['address1'];?></textarea>
								</div>
								<div class="mb-3">
									<label for="address" class="form-label">Address 2</label>
									<textarea class="form-control" id="address"
										rows="3"><?php echo $row['address2'];?></textarea>
								</div>
								<?php
										}
									}
								?>
								
								<button type="submit" class="btn btn-success">Save Changes</button>
							</form>
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
</body>

</html>