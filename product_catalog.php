<?php
require "config/environtment.php";
session_start();
// if(isset($_SESSION["uid"])){
// 	header("location:profile.php");
// }
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gadget Good</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
        .sidebar .nav-link.active {
            background-color: #198754;
            color: #FFFFFF;
        }
        .sidebar .nav-link {
            color: #198754;
        }
    </style>
</head>
<body>
    <?php include 'header.php'?>
    <main>
        <div class="container-fluid m-5 min-vh-100">
            <div class="row">
                <nav class="col-md-2 d-md-block bg-light sidebar border border-success rounded-3">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column my-3" id="dropdown-categories-catalog">
                            
                        </ul>
                    </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    <div class="container">
                        <span class="fs-4">Catalog</span>
                        <div class="row mt-3" id="product-list">
                        
                        </div>
                    </div>
                </main>
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

    function getParameterByName(name) {
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(window.location.search);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }

    var category_selected = getParameterByName('category');

	$.ajax({
		url: '<?php echo BASE_URL ?>/data/get_categories.php',
		method: 'POST',
		dataType: 'xml',
		success: function(data) {
            $dropdownCategories = $('#dropdown-categories-catalog');
            $(data).find('category').each(function() {
                var is_active = (category_selected === $(this).find('id').text()) ? 'active' : '';
                $category_content = $('<li class="nav-item m-2"><a class="nav-link '+is_active+' rounded" href="<?php echo BASE_URL ?>/product_catalog.php?category='+$(this).find('id').text()+'">'+$(this).find('name').text()+'</a></i>');
                $dropdownCategories.append($category_content);
            })
        },
        error: function() {
            alert('Error loading XML data');
        }
	});

    $.ajax({
		url: '<?php echo BASE_URL ?>/data/get_products.php',
		method: 'POST',
		dataType: 'xml',
		data: {
			page: 'index',
            category: category_selected,
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