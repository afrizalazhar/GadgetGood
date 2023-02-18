<?php
require('config/environtment.php');
include "db.php";
session_start();
$productID = $_GET["productID"];

$product_query = "SELECT * FROM products WHERE product_id = $productID";
$run_query = mysqli_query($con,$product_query) or die(mysqli_error($con));
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
    <?php include('header.php') ?>
    <main>
        
        <div class="container mt-5 vh-100">
            <div style="display: none;" id="product_msg"></div>
            <div class="row">
                <?php
                if(mysqli_num_rows($run_query) > 0){
                    while($row = mysqli_fetch_array($run_query)){
                ?>
                <div class="col-lg-6">
                    <img src="product_images/<?php echo $row['product_image']; ?>" class="img-fluid" alt="Product Image" />
                </div>
                <div class="col-lg-6">
                    <h1 class="mb-4"><?php echo $row['product_title']; ?></h1>
                    <p class="text-muted"><?php echo $row['product_desc']; ?></p>
                    <h2 class="mb-3"><?php echo "$".$row['product_price']; ?></h2>
                    <form>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="1"/>
                        </div>
                        <button type="submit" class="btn btn-primary" id="add_to_cart" pid="<?php echo $row['product_id'] ?>">
                            Add to Cart
                        </button>
                    </form>
                </div>
                <?php } } ?>
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