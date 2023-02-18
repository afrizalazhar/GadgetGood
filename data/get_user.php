<?php
session_start();
include "../db.php";
$user_xml = new DOMDocument();
$user_xml->load('../xmls/user.xml', LIBXML_DTDLOAD);
$user = $user_xml->getElementsByTagName('user')->item(0);
$user_query = "SELECT * FROM user_info WHERE user_id = ".$_SESSION["uid"];
$run_query = mysqli_query($con,$user_query) or die(mysqli_error($con));
if(mysqli_num_rows($run_query) > 0){
    while($row = mysqli_fetch_array($run_query)){
        $first_name = $user_xml->createElement('first_name', $row["first_name"]);
        $user->appendChild($first_name);
        $last_name = $user_xml->createElement('last_name', $row["last_name"]);
        $user->appendChild($last_name);
        $email = $user_xml->createElement('email', $row["email"]);
        $user->appendChild($email);
        $mobile = $user_xml->createElement('mobile', $row["mobile"]);
        $user->appendChild($mobile);
        $address1 = $user_xml->createElement('address1', $row["address1"]);
        $user->appendChild($address1);
        $address2 = $user_xml->createElement('address2', $row["address2"]);
        $user->appendChild($address2);
    }
}
// $categories_xml->saveXML();
if(!$user_xml->validate()) {
    echo "not valid";
}
header("Content-type: text/xml");
echo $user_xml->saveXML();
?>
