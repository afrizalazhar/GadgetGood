<?php
session_start();
include "../db.php";

$dom_product = new DOMDocument();
$dom_product->load('../xmls/cart.xml', LIBXML_DTDLOAD);
$cart = $dom_product->getElementsByTagName('cart')->item(0);
$products = $dom_product->createElement('products');
$cart->appendChild($products);

$cart_query = "SELECT p_id, qty FROM cart WHERE user_id = ".$_SESSION['uid'];
$run_cart_query = mysqli_query($con, $cart_query) or die(mysqli_error($con));
$product_list = array();
if (mysqli_num_rows($run_cart_query) > 0) {
    while($row = mysqli_fetch_array($run_cart_query)) {
        $cart_item = array();
        $cart_item["product_id"] = $row["p_id"];
        $cart_item["qty"] = $row["qty"];
        array_push($product_list, $cart_item);
    }
}
$product_list_string = implode(', ', array_column($product_list, 'product_id'));
$product_query = "SELECT * FROM products JOIN cart ON products.product_id = cart.p_id WHERE product_id IN (".$product_list_string.")";

$run_query = mysqli_query($con,$product_query) or die(mysqli_error($con));
if(mysqli_num_rows($run_query) > 0){
    while($row = mysqli_fetch_array($run_query)){
        $product = $dom_product->createElement('product');
        $products->appendChild($product);
        
        $qty = $dom_product->createElement('qty');
        $qty_val = $dom_product->createTextNode($row['qty']);
        $qty->appendChild($qty_val);
        $product->appendChild($qty);

        $productId = $dom_product->createElement('product-id');
        $productIdText = $dom_product->createTextNode($row["product_id"]);
        $productId->appendChild($productIdText);
        $product->appendChild($productId);

        $productCategory = $dom_product->createElement('product-category');
        $productCategoryText = $dom_product->createTextNode($row["product_cat"]);
        $productCategory->appendChild($productCategoryText);
        $product->appendChild($productCategory);

        $productBrand = $dom_product->createElement('product-brand');
        $productBrandText = $dom_product->createTextNode($row["product_brand"]);
        $productBrand->appendChild($productBrandText);
        $product->appendChild($productBrand);

        $productTitle = $dom_product->createElement('product-title');
        $productTitleText = $dom_product->createTextNode($row["product_title"]);
        $productTitle->appendChild($productTitleText);
        $product->appendChild($productTitle);

        $productPrice = $dom_product->createElement('product-price');
        $productPriceText = $dom_product->createTextNode($row["product_price"]);
        $productPrice->appendChild($productPriceText);
        $product->appendChild($productPrice);

        $productQty = $dom_product->createElement('product-qty');
        $productQtyText = $dom_product->createTextNode($row["product_qty"]);
        $productQty->appendChild($productQtyText);
        $product->appendChild($productQty);

        $productDesc = $dom_product->createElement('product-desc');
        $productDescText = $dom_product->createTextNode($row["product_desc"]);
        $productDesc->appendChild($productDescText);
        $product->appendChild($productDesc);

        $productImage = $dom_product->createElement('product-image');
        $productImageText = $dom_product->createTextNode($row["product_image"]);
        $productImage->appendChild($productImageText);
        $product->appendChild($productImage);

        $productKeywords = $dom_product->createElement('product-keywords');
        $productKeywordsText = $dom_product->createTextNode($row["product_keywords"]);
        $productKeywords->appendChild($productKeywordsText);
        $product->appendChild($productKeywords);
        
    }
}
if(!$dom_product->validate()) {
    echo "not valid";
}
header("Content-type: text/xml");
echo $dom_product->saveXML();