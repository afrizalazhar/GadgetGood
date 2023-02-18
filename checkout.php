<?php
require('config/environtment.php');
session_start();
?>
<!DOCTYPE html>
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
	<style></style>
</head>

<body>
    <?php include 'header.php'?>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Your cart</span>
                    <span class="badge bg-primary rounded-pill">3</span>
                </h4>
                <ul class="list-group mb-3" id="product-list">

                </ul>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form class="needs-validation" action="checkout_process.php" method="POST">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">First name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Valid email is required.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="phone" class="form-control" id="phone" placeholder="08xxxx">
                            <div class="invalid-feedback">
                                Valid phone is required.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="address2" class="form-label">Address 2 <span
                                    class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                        </div>
                        <div class="col-md-5">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" id="country" name="country" required>
                                <option value="">Choose...</option>
                                <option value="United States">United States</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <select class="form-select" id="state" name="state" required>
                                <option value="">Choose...</option>
                                <option value="California">California</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="zip" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">

                    <h4 class="mb-3">Payment</h4>

                    <div class="my-3">
                        <div class="form-check">
                            <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked
                                required>
                            <label class="form-check-label" for="credit">Credit card</label>
                        </div>
                        <div class="form-check">
                            <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                            <label class="form-check-label" for="debit">Debit card</label>
                        </div>
                    </div>

                    <div class="row gy-3">
                        <div class="col-md-6">
                            <label for="cc-name" class="form-label">Name on card</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="" name="name" required>
                            <small class="text-muted">Full name as displayed on card</small>
                            <div class="invalid-feedback">
                                Name on card is required
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="cc-number" class="form-label">Credit card number</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="" name="card_number" required>
                            <div class="invalid-feedback">
                                Credit card number is required
                            </div>
                        </div>


                        <div class="col-md-3">
                            <label for="cc-expiration" class="form-label">Expiration</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="" name="exp" required>
                            <div class="invalid-feedback">
                                Expiration date required
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cc-cvv" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="" name="ccv" required>
                            <div class="invalid-feedback">
                                Security code required
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <input type="hidden" name="total_payment">
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                </form>
            </div>
        </div>
    </div>
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
		url: '<?php echo BASE_URL ?>/data/get_cart.php',
		method: 'POST',
		dataType: 'xml',
		data: {
			page: 'index'
		},
		success: function(data) {
            $product_list = $('#product-list');
			var max_length = 30;
            var total_price = 0;
            $(data).find('product').each(function() {
				var product_desc = $(this).find('product-desc').text();
				if (product_desc.length > max_length) {
					product_desc = product_desc.substr(0, max_length) + "...";
					product_desc = product_desc;
				}
                $product_content = $('<li class="list-group-item d-flex justify-content-between lh-sm">\
                        <div>\
                            <h6 class="my-0">'+$(this).find('product-title').text()+'</h6>\
                            <small class="text-muted">'+product_desc+'</small>\
                        </div>\
                        <span class="text-muted"><?php echo CURRENCY ?>'+$(this).find('product-price').text()+'</span>\
                    </li>')
                $product_list.append($product_content);
                total_price += parseInt($(this).find('product-price').text());
            });
            $content_total = $('<li class="list-group-item d-flex justify-content-between">\
                                    <span>Total (USD)</span>\
                                    <strong>$'+total_price+'</strong>\
                                </li>')
            $product_list.append($content_total);
            $('input[name="total_payment"]').val(total_price)
        },
        error: function() {
            alert('Error loading XML data');
        }
	});

    $.ajax({
		url: '<?php echo BASE_URL ?>/data/get_user.php',
		method: 'POST',
		dataType: 'xml',
		data: {
			page: 'index'
		},
		success: function(data) {
            var user = $(data).find('user');
            $('#firstName').val(user.find('first_name').text())
            $('#lastName').val(user.find('last_name').text())
            $('#email').val(user.find('email').text())
            $('#phone').val(user.find('mobile').text())
            $('#address').val(user.find('address1').text())
            $('#address2').val(user.find('address2').text())
        },
        error: function() {
            alert('Error loading XML data');
        }
	})
</script>
</html>