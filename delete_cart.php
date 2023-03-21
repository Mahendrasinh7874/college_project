<?php

include './admin/config.php';


$product_cart_id = $_GET['cart_id'];


$sql = "delete from cart where cart_id='{$product_cart_id}'";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if ($result) {
    header("location:http://localhost/college_project/cart_view.php");
}
