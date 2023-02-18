<?php
include "../db.php";
$categories_xml = new DOMDocument();
$categories_xml->load('../xmls/categories.xml', LIBXML_DTDLOAD);
$categories = $categories_xml->getElementsByTagName('categories');
$category_query = "SELECT * FROM categories";
$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
if(mysqli_num_rows($run_query) > 0){
    while($row = mysqli_fetch_array($run_query)){
        $category = $categories_xml->createElement('category');
        $id = $categories_xml->createElement('id', $row["cat_id"]);
        $category->appendChild($id);
        $cat = $categories_xml->createElement('name', $row["cat_title"]);
        $category->appendChild($cat);
        $categories_xml->getElementsByTagName('categories')->item(0)->appendChild($category);
    }
}
// $categories_xml->saveXML();
if(!$categories_xml->validate()) {
    echo "not valid";
}
header("Content-type: text/xml");
echo $categories_xml->saveXML();
?>
