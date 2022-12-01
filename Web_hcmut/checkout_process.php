<?php
include "db.php";
$full_name = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$cart = $_POST['cart'];
$pay_type = $_POST['pay-type'];
$cart = json_decode($cart);

$card_name = "";
$card_number = "";
$exp_date = "";
$cvv = "";

foreach ($cart as $item) {
    $id = $item->id;
    $quantity = $item->quantity;
}
