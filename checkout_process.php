<?php
session_start();
include 'db.php';
$user_id = $_SESSION['uid'];
$country = $_POST["country"];
$state = $_POST["state"];
$zip = $_POST["zip"];
$payment_method = $_POST["paymentMethod"];
$payment_name = $_POST["name"];
$payment_card = $_POST["card_number"];
$payment_exp = $_POST["exp"];
$payment_CCV = $_POST["ccv"];
$payment_total = $_POST["total_payment"];
$date_now = date('Y-m-d H:i:s');

function guidv4($data = null) {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

$trx_id = guidv4();
$sql = "SELECT p_id,qty FROM cart WHERE user_id = '$user_id'";
$query = mysqli_query($con,$sql);
if (mysqli_num_rows($query) > 0) {
    # code...
    while ($row=mysqli_fetch_array($query)) {
        $sql = "INSERT INTO orders (user_id,product_id,qty,trx_id,p_status) VALUES ('$user_id','".$row['p_id']."','".$row['qty']."','$trx_id','process')";
        mysqli_query($con,$sql);
        $sql = "DELETE FROM cart WHERE user_id = '$user_id'";
        mysqli_query($con,$sql);
    }
}

$sql = "INSERT INTO shipping (id_user, country, state, zip) VALUES ('$user_id','$country','$state','$zip')";
$query = mysqli_query($con,$sql);
if (!$query) {
    die('Error insert shipping');
}

$sql = "INSERT INTO payment (id_trx, method, name, card_number, expiration, CVV, total, created_date) VALUES ('$trx_id','$payment_method','$payment_name','$payment_card', '$payment_exp', '$payment_CCV', '$payment_total', '$date_now')";
$query = mysqli_query($con,$sql);
if (!$query) {
    die('Error insert payment');
}

header('Location: payment_success.php?trx_id='.$trx_id);