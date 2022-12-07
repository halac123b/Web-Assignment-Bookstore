<?php
require './includes/db.php';

$order_id = $_GET['order_id'];
$action = $_GET['action'];

if (!empty($order_id) &&  !empty($action)) {
    if ($action == 'complete') {
        $query = "UPDATE orders SET p_status = 'Complete' WHERE order_id = '$order_id'";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<script>alert('Order Completed Successfully')</script>";
        }
        header("Location: ./orders.php");
    } else if ($action == 'cancel') {
        $query = "UPDATE orders SET p_status = 'Cancelled' WHERE order_id = '$order_id'";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<script>alert('Order Confirmed Successfully')</script>";
        }
        header("Location: ./orders.php");
    }
}