<?php
require "config/environtment.php";
session_start();
// if(isset($_SESSION["uid"])){
// 	header("location:profile.php");
// }
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Gadget Good</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style></style>
</head>

<body>
	<?php include 'header.php'?>
	<main>
        <div class="container my-5">
            <h1 class="text-center">Welcome to Gadget Good</h1>
            <p class="text-center">
                Browse our collection of products and find what you're looking for!
            </p>
            <div class="row" id="product-list">
			<div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
				<h2 class="h3 mb-0 pt-3 me-2">Trending products</h2>
				<div class="pt-3"><a class="btn btn-outline-accent btn-sm" href="product_catalog.php">More products<i class="ci-arrow-right ms-1 me-n1"></i></a></div>
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
<script type="text/javascript">
	$.ajax({
		url: '<?php echo BASE_URL ?>/data/get_products.php',
		method: 'POST',
		dataType: 'xml',
		data: {
			page: 'index'
		},
		success: function(data) {
            $product_list = $('#product-list');
			var max_length = 30;
            $(data).find('product').each(function() {
				var product_desc = $(this).find('product-desc').text();
				if (product_desc.length > max_length) {
					product_desc = product_desc.substr(0, max_length) + "...";
					product_desc = product_desc;
				}
                $product_content = $('<div class="col-md-3 mb-3">\
						<div class="card">\
							<img src="product_images/'+$(this).find('product-image').text()+'" class="img-fluid img-thumbnail" style="object-fit: cover; height: 18rem;" alt="product1"/>\
							<div class="card-body">\
								<h5 class="card-title">'+$(this).find('product-title').text()+'</h5>\
								<p class="card-text">'+product_desc+'</p>\
								<a href="detail_product.php?productID='+$(this).find('product-id').text()+'" class="btn btn-primary">Detail</a>\
							</div>\
						</div>\
					</div>');
                $product_list.append($product_content);
            })
        },
        error: function() {
            alert('Error loading XML data');
        }
	})
</script>
</html>