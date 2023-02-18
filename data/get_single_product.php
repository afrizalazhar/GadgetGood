<?php
include "../db.php";

$dom_product = new DOMDocument();
$dom_product->load('../xmls/products.xml', LIBXML_DTDLOAD);
$products = $dom_product->getElementsByTagName('products')->item(0);
$limit = ($page == "index") ? " LIMIT 4" : " LIMIT 20";
$product_query = "SELECT * FROM products WHERE product_id = ".$_POST["productID"];

$run_query = mysqli_query($con,$product_query) or die(mysqli_error($con));
if(mysqli_num_rows($run_query) > 0){
    while($row = mysqli_fetch_array($run_query)){
        $product = $dom_product->createElement('product');
        $products->appendChild($product);

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